<?php

use Jamshid\ExamProject\DB;
use Jamshid\ExamProject\Router;
use Jamshid\ExamProject\Send_massage;

$router = new Router();

$router->get('/', fn() => require_once 'view/view.php');
$router->post('/post', function() {
    $text = $_POST['text'];
    if (strlen($text) <= 500) {
        $pdo = DB::getConnection();
        $stmt = $pdo->prepare("INSERT INTO posts (text, created_at) VALUES (:text, NOW())");
        $stmt->execute(['text' => $text]);
        $sendMassage = new Send_massage();
        $sendMassage->sendPostToAllUsers($text);

        echo "Sending post!";
    } else {
        echo "Post length should not exceed 500 characters!";
    }
});
