<?php

use Jamshid\ExamProject\Router;

$router = new Router();
if ($router->isTelegram()) {
    require 'routes/telegram.php';
    return;
}

require_once 'routes/web.php';