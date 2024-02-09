<?php
return [
    '~^/articles/(\d+)$~' => [App\MyProject\Controllers\ArticlesController::class, 'view'],
    '~^/hello/(.*)$~' => [App\MyProject\Controllers\MainController::class, 'sayHello'],
    '~^/$~' => [App\MyProject\Controllers\MainController::class, 'main'],
];