<?php

namespace App\MyProject\Controllers;

use App\MyProject\Models\Articles\Article;
use App\MyProject\View\View;


class MainController
{
    private $view;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../../templates');
    }

    public function main()
    {
        $articles = Article::findAll();
        $this->view->renderHtml('main/main.php', ['articles' => $articles]);
    }

}