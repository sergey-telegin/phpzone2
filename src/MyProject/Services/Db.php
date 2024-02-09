<?php

namespace App\MyProject\Services;

use PDO;

class db
{
    private $pdo;

    public function __construct()
    {
        $dbParam = (require __DIR__ . '/../../settings.php')['db'];

        $this->pdo = new \PDO(
            'mysql:host=' . $dbParam['host'] . ';dbname=' . $dbParam['dbname'],
            $dbParam['user'],
            $dbParam['password']
        );
        $this->pdo->exec('SET NAMES UTF8');
    }

    public function query(string $sql, $params = []): ?array
    {
        $stm = $this->pdo->prepare($sql);
        $result = $stm->execute($params);

        if (false === $result) {
            return null;
        }

        return $stm->fetchAll();
    }
}