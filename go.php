<?php
// Вітальне повідомлення
$text = urlencode('Привіт! Пишу з сайту, хочу дізнатись більше 🙌');

// tg://-лінк із повідомленням
$tg_link = "https://t.me/yev_bk?text=$text";

// 302 редірект
header("HTTP/1.1 302 Found");
header("Location: $tg_link");
exit;
