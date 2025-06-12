<?php
// Telegram інвайт-лінк
$tg_link = 'tg://join?invite=6B1_vm8h-Fo1Y2Fi';

// Заголовки для 302 редіректу
header("HTTP/1.1 302 Found");
header("Location: $tg_link");
exit;
