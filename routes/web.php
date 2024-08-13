<?php

$router = new Router();

$router->add('/post', function() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $text = $_POST['text'];
        if (strlen($text) <= 500) {
            $pdo = DB::getConnection();
            $stmt = $pdo->prepare("INSERT INTO posts (text, created_at) VALUES (:text, NOW())");
            $stmt->execute(['text' => $text]);

            // Postni barcha foydalanuvchilarga yuborish
            $sendMassage = new SendMassage();
            $sendMassage->sendPostToAllUsers($text);

            echo "Post yuborildi!";
        } else {
            echo "Post uzunligi 500 harfdan oshmasligi kerak!";
        }
    }
    include __DIR__ . '/../view/view.php';
});
