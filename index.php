<?php
$data = file_get_contents("php://input");

if (!$data) {
    // Якщо запит відкрили вручну через браузер
    echo '<a href="https://api.telegram.org/bot7811128248:AAGkbhIOIjMA1RE2Zie8YkJX1rQ_kJ40mss/setWebhook?url=https://b3c1-93-95-253-238.ngrok-free.app">запустити хук</a>';
    exit("👋 Привіт! Цей скрипт працює тільки з Telegram Webhook.");

}



$json = json_decode($data, true);

if (!isset($json['message']['chat']['id']) || !isset($json['message']['text'])) {
    exit("❌ Некоректний формат запиту");
}

$chat_id = $json['message']['chat']['id'];
$text = $json['message']['text'];

const TOKEN = "7811128248:AAGkbhIOIjMA1RE2Zie8YkJX1rQ_kJ40mss";
$sendMessage = "https://api.telegram.org/bot" . TOKEN . "/sendMessage";

$params = [
    'chat_id' => $chat_id,
    'text' => "Ти написав: $text"
];

// Надсилаємо відповідь
file_get_contents($sendMessage . '?' . http_build_query($params));
?>
