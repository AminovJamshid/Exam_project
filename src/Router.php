<?php

namespace Jamshid\ExamProject;

class Router {
    private  $update;
    public function __construct()
    {
        $this->update = json_decode(file_get_contents('php://input'));
    }

    public function isTelegram(): bool
    {
        if (isset($this->update) && isset($this->update->update_id)) {
            return true;
        }
        return false;
    }
    public function post($path, $callback): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) === $path) {
            $callback();
        }
    }

    public function get($path, $callback): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_SERVER['REQUEST_URI'] === $path) {
            $callback();
        }
    }

    public function getUpdates()
    {
        return $this->update;
    }

}
