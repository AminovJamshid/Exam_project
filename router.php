<?php
require_once 'bootstrap.php';

$router = new Router();
require_once 'routes/web.php';

// URL marshrutlash
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$router->dispatch($url);
