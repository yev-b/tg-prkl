<?php

$start = microtime(true);

// 🌐 CORS для дозволених сабдоменів
$allowed_origins = [
    'https://test.pragency.fun',
    'https://rb-channel.pragency.fun',
    'https://md-channel.pragency.fun',
    'https://ua-channel.pragency.fun',
    'https://pr-channel.pragency.fun',
    'https://rb-chat.pragency.fun',
    'https://at-chat.pragency.fun',
    'https://kz-chat.pragency.fun',
];

$origin = $_SERVER['HTTP_ORIGIN'] ?? '';
if (in_array($origin, $allowed_origins)) {
    header("Access-Control-Allow-Origin: $origin");
}
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

// ⚙️ Конфіг
$config = require __DIR__ . '/config.php';
$pixelId = $config['pixel_id'];
$accessToken = $config['access_token'];
$testEventCode = $config['test_event_code'] ?? null;

// ⚙️ Хеш-функція
function hashIfNeeded($key, $value, $skip = []) {
    if (in_array($key, $skip)) return trim($value);
    return hash('sha256', trim(strtolower($value)));
}

$doNotHash = ['client_ip_address', 'client_user_agent', 'fbp', 'fbc', 'click_id', 'browser_id'];

// 📥 Отримання JSON-запиту
$raw = file_get_contents("php://input");
$json = json_decode($raw, true) ?? [];

// 🧠 IP і user-agent
$ip = $_SERVER['HTTP_CF_CONNECTING_IP'] ?? $_SERVER['REMOTE_ADDR'];
$userAgent = $_SERVER['HTTP_USER_AGENT'] ?? '';
$host = $_SERVER['HTTP_HOST'] ?? 'unknown';

// 📌 Основні поля
$eventName = $json['event_name'] ?? 'Subscribe';
$eventId = $json['event_id'] ?? uniqid($eventName . '_', true);
$eventTime = $json['event_time'] ?? time();
$eventSourceUrl = $json['event_source_url'] ?? null;
$user_data_raw = $json['user_data'] ?? [];
$custom_data = $json['custom_data'] ?? [];

// 📌 Додати IP, UA, external_id якщо їх немає
$user_data_raw['client_ip_address'] = $user_data_raw['client_ip_address'] ?? $ip;
$user_data_raw['client_user_agent'] = $user_data_raw['client_user_agent'] ?? $userAgent;
$user_data_raw['external_id'] = $user_data_raw['external_id'] ?? hash('sha256', $ip . $userAgent . date('Y-m-d-H'));

// 🌍 Гео-дані, якщо не передані
if (empty($user_data_raw['country']) || empty($user_data_raw['zip'])) {
    $geo = @json_decode(file_get_contents("https://ipwho.is/{$ip}"), true);
    if (!isset($user_data_raw['zip']) && !empty($geo['postal'])) $user_data_raw['zip'] = $geo['postal'];
    if (!isset($user_data_raw['country']) && !empty($geo['country_code'])) $user_data_raw['country'] = $geo['country_code'];
    if (!isset($custom_data['city']) && !empty($geo['city'])) $custom_data['city'] = $geo['city'];
    if (!isset($custom_data['region']) && !empty($geo['region'])) $custom_data['region'] = $geo['region'];
}

// 🔐 Хешування user_data
$user_data = [];
$allowed_user_keys = [
    'em', 'ph', 'ge', 'db', 'ln', 'fn', 'fbc', 'fbp',
    'external_id', 'client_ip_address', 'client_user_agent',
    'zip', 'country', 'st', 'ct', 'subscription_id', 'lead_id'
];

$user_data = [];
foreach ($user_data_raw as $key => $value) {
    if (in_array($key, $allowed_user_keys)) {
        $user_data[$key] = hashIfNeeded($key, $value, $doNotHash);
    } else {
        // ❗ якщо ключ зайвий — можеш логувати
        file_put_contents(__DIR__.'/capi_log.txt', "[WARN] 🔴 Removed invalid user_data param: {$key}\n", FILE_APPEND);
    }
}

// 📦 Побудова події
$data = [
    'event_name' => $eventName,
    'event_time' => $eventTime,
    'event_id' => $eventId,
    'action_source' => 'website',
    'user_data' => $user_data
];

if (!empty($eventSourceUrl)) $data['event_source_url'] = $eventSourceUrl;
if (!empty($custom_data)) $data['custom_data'] = $custom_data;

$payload = ['data' => [$data]];
if (!empty($testEventCode)) $payload['test_event_code'] = $testEventCode;

// 📡 Запит до Meta API
$url = "https://graph.facebook.com/v18.0/{$pixelId}/events?access_token={$accessToken}";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// 📝 Лог
$log = [
    'timestamp' => date('Y-m-d H:i:s'),
    'event' => $eventName,
    'event_id' => $eventId,
    'http_code' => $httpCode,
    'payload' => $payload,
    'response_raw' => $response,
    'response_json' => json_decode($response, true),
    'subdomain' => $host
];

file_put_contents(__DIR__ . '/capi_log.txt', print_r($log, true) . "\n\n", FILE_APPEND);



// ❌ Якщо помилка
if ($httpCode !== 200) {
    error_log("CAPI ERROR [{$httpCode}]: {$response}");
}


$time = round((microtime(true) - $start) * 1000); // мілісекунди
file_put_contents(__DIR__.'/capi_timing.log', "[".date('H:i:s')."] $eventName ($eventId) took {$time}ms\n", FILE_APPEND);


// 🔙 Відповідь
header('Content-Type: application/json');
echo json_encode([
    'status' => $httpCode,
    'event' => $eventName,
    'event_id' => $eventId,
    'response' => json_decode($response, true)
]);
