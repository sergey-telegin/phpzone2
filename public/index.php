<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\MyProject\Controllers\MainController;

$route = $_ENV['REQUEST_URI'];
$routes = require __DIR__ . '/../src/routes.php';

$isRouteFound = false;

foreach ($routes as $pattern => $controllerAndAction) {
    preg_match($pattern, $route, $matches);
    if (!empty($matches)) {
        $isRouteFound = true;
        break;
    }
}

if (!$isRouteFound) {
    echo 'Страница не найдена!';
    return;
}

$controllerName = $controllerAndAction[0];
$actionName = $controllerAndAction[1];
unset($matches[0]);
$controller = new $controllerName();
$controller->$actionName(...$matches);
