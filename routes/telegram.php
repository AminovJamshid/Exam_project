<?php

use Jamshid\ExamProject\Bot;
use Jamshid\ExamProject\Router;

$token = $_ENV['TELEGRAM_BOT_TOKEN'];
$bot    = new Bot();
$router = new Router();

if (isset($router->getUpdates()->message)) {
    $message = $router->getUpdates()->message;
    $chatId  = $message->chat->id;
    $text    = $message->text;

    if ($text === "/start") {
        $bot->handleStartCommand($chatId);
    }
}
