<?php

namespace Jamshid\ExamProject;

class Send_massage {
    private Bot $bot;

    public function __construct() {
        $this->bot = new Bot();
    }

    public function sendPostToAllUsers($postText): void
    {
        $pdo = DB::getConnection();
        $users = $pdo->query("SELECT chat_id FROM users WHERE is_active = 1")->fetchAll();

        foreach ($users as $user) {
            $this->bot->sendMessage($user['chat_id'], $postText);
        }
    }
}
