<?php
namespace App\MyProject\Models\Users;

use App\MyProject\Models\ActiveRecordEntity;

class User extends ActiveRecordEntity
{
    protected string $nickname;

    protected string $email;

    protected string $isConfirmed;

    protected string $role;

    protected string $passwordHash;

    protected $authToken;
    protected $createdAt;

    public function getNickname(): string
    {
        return $this->nickname;
    }

    protected static function getTableName(): string
    {
        return 'users';
    }
}