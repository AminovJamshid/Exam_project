<?php

namespace Jamshid\ExamProject;
class Bot {
    private mixed $token;
    private string $apiUrl;

    public function __construct() {
        $this->token = $_ENV['TELEGRAM_BOT_TOKEN'];
        $this->apiUrl = "https://api.telegram.org/bot{$this->token}/";
    }

    public function sendMessage($chatId, $text): void
    {
        $url = $this->apiUrl . "sendMessage?chat_id={$chatId}&text=" . urlencode($text);
        file_get_contents($url);
    }

    public function handleWebhook(): void
    {
        $content = file_get_contents("php://input");
        $update = json_decode($content, true);

        if (isset($update['message'])) {
            $message = $update['message'];
            $chatId = $message['chat']['id'];
            $text = $message['text'];

            if ($text == "/start") {
                $this->registerUser($chatId);
                $this->sendMessage($chatId, "Welcome to the best Bot in every Universe!");
            }
        }
    }

    public function handleStartCommand($chatId): void
    {
        $pdo = DB::getConnection();

        $stmt = $pdo->prepare("INSERT INTO users (chat_id, is_active) VALUES (:chat_id, 1) ON DUPLICATE KEY UPDATE is_active = 1");
        $stmt->execute(['chat_id' => $chatId]);

        $this->sendMessage($chatId, "Welcome to the best Bot in every Universe!");
    }

    private function registerUser($chatId): void
    {
        $pdo = DB::getConnection();
        $stmt = $pdo->prepare("INSERT INTO users (chat_id, is_active) VALUES (:chat_id, 1) ON DUPLICATE KEY UPDATE is_active = 1");
        $stmt->execute(['chat_id' => $chatId]);
    }
}
