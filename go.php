<?php
// Вітальне повідомлення
$text = urlencode('Привіт! Пишу з сайту, хочу дізнатись більше 🙌');

// tg://-лінк із повідомленням
$tg_link = "tg://msg?text=$text&to=yev_bk";

// 302 редірект
header("HTTP/1.1 302 Found");
header("Location: $tg_link");
exit;
