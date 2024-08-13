<?php
require_once 'bootstrap.php';

use Jamshid\ExamProject\Router;

$router = new Router();
require_once 'routes/web.php';

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$router->dispatch($url);
