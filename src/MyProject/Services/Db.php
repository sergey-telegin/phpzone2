<?php

namespace App\MyProject\Services;

use PDO;

class Db
{
    private static $instance;
    private $pdo;

    private function __construct()
    {
        $dbParam = (require __DIR__ . '/../../settings.php')['db'];

        $this->pdo = new \PDO(
            'mysql:host=' . $dbParam['host'] . ';dbname=' . $dbParam['dbname'],
            $dbParam['user'],
            $dbParam['password']
        );
        $this->pdo->exec('SET NAMES UTF8');
    }

    public function query(string $sql, array $params = [], string $className = 'stdClass')
    {
        $stm = $this->pdo->prepare($sql);
        $result = $stm->execute($params);

        if (false === $result) {
            return null;
        }

        return $stm->fetchAll(\PDO::FETCH_CLASS, $className);
    }


    public static function getInstance(): self
    {

        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}