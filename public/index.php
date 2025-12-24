<?php
require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\TaskController;

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

$controller = new TaskController();

match(true) {
    $uri === '/' && $method === 'GET' => $controller->index(),
    $uri === '/tasks' && $method === 'POST' => $controller->store(),
    preg_match('#^/tasks/(\d+)/complete$#', $uri, $m) && $method === 'POST' => $controller->complete((int)$m[1]),
    preg_match('#^/tasks/(\d+)/delete$#', $uri, $m) && $method === 'POST' => $controller->destroy((int)$m[1]),
    default => http_response_code(404) && die('404 Not Found')
};
