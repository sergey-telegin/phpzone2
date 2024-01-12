<?php

namespace App\MyProject\Models\Articles;

use App\MyProject\Models\ActiveRecordEntity;
use App\MyProject\Models\Users\User;
class Article extends ActiveRecordEntity
{

    protected $name;

    protected $text;

    protected $authorId;

    protected $createdAt;

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
    protected static function getTableName(): string
    {
        return 'articles';
    }

}