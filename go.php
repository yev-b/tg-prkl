<?php
// Telegram інвайт-лінк
$tg_link = 'tg://resolve?domain=yev_bk';

// Заголовки для 302 редіректу
header("HTTP/1.1 302 Found");
header("Location: $tg_link");
exit;
