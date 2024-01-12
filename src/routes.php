<?php

return [
    '~^/$~' => [\App\MyProject\Controllers\MainController::class, 'main'],
    '~^/articles/(\d+)$~' => [\App\MyProject\Controllers\ArticlesController::class, 'view'],
];