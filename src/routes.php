<?php
return [
    '~^/articles/(\d+)$~' => [App\MyProject\Controllers\ArticlesController::class, 'view'],
    '~^/articles/(\d+)/edit$~' => [App\MyProject\Controllers\ArticlesController::class, 'edit'],
    '~^/hello/(.*)$~' => [App\MyProject\Controllers\MainController::class, 'sayHello'],
    '~^/$~' => [App\MyProject\Controllers\MainController::class, 'main'],
    '~^/articles/add$~' => [App\MyProject\Controllers\ArticlesController::class, 'add'],
];