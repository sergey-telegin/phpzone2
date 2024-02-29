<?php

namespace App\MyProject\Controllers;

use App\MyProject\Models\Articles\Article;
use App\MyProject\View\View;
use App\MyProject\Models\Users\User;

class ArticlesController
{
    private $view;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../../templates');
    }

    public function view(int $articleId): void
    {
        $article = Article::getById($articleId);

        if ($article === null) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }

        $this->view->renderHtml('articles/view.php', [
            'article' => $article
        ]);
    }

    public function edit(int $articleId): void
    {
        $article = Article::getById($articleId);

        if ($article === null) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }

        $article->setName('NewName');
        $article->setText('NewText');

        $article->save();

    }

    public function add(): void
    {
        $author = User::getById(1);
        $article = new Article();
        $article->setAuthorId($author);
        $article->setName('Новое название статьи');
        $article->setText('Новый текст статьи');
        $article->save();

        var_dump($article);
    }

}