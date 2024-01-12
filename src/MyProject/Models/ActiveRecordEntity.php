<?php

namespace App\MyProject\Models;

use App\MyProject\Services\Db;
abstract class ActiveRecordEntity
{
    protected $id;

    public function getId(): int
    {
        return $this->id;
    }

    public function __set($name, $value)
    {
        $camelCaseName = $this->underscoreToCamelCase($name);
        $this->$camelCaseName = $value;
    }

    private function underscoreToCamelCase(string $source): string
    {
        return lcfirst(str_replace('_', '', ucwords($source, '_')));
    }

    public static function findAll(): array
    {
        $db = new Db();
        return $db->queryFetchAll('SELECT * FROM `' . static::getTableName() . '`;', [], static::class);
    }
    abstract protected static function getTableName(): string;

    public static function getById(int $id): ?self
    {
        $db = new Db();
        $entities = $db->queryFetchAll(
            'SELECT * FROM `' . static::getTableName() . '` WHERE id=:id;',
            [':id' => $id],
            static::class
        );
        return $entities ? $entities[0] : null;
    }


}