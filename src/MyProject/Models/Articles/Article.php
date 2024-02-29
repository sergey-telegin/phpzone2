<?php

namespace App\MyProject\Models\Articles;

use App\MyProject\Models\ActiveRecordEntity;
use App\MyProject\Models\Users\User;

class Article extends ActiveRecordEntity
{
    protected string $name;
    protected string $text;
    protected int $authorId;
    protected string $createdAt;

    public function getName(): string
    {
        return $this->name;
    }

    public function getText(): string
    {
        return $this->text;
    }
    public function getAuthor(): User
    {
        return User::getById($this->authorId);
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setAuthorId(User $author): void
    {
        $this->authorId = $author->getId();
    }

    public function setText(string $text): void
    {
        $this->text = $text;
    }



    protected static function getTableName(): string
    {
        return 'articles';
    }

}