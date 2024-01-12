<?php

namespace App\MyProject\Services;

{
    class Db
    {
        private $db;

        private static $instancesCount = 0;


        public function __construct()
        {
            self::$instancesCount++;

            $dbParam = (require __DIR__ . '/../../settings.php')['db'];

            $this->db = new \PDO(
                'mysql:host=' . $dbParam['host'] . ';dbname=' . $dbParam['dbname'],
                $dbParam['user'],
                $dbParam['password']
            );
            $this->db->exec('SET NAMES UTF8');
        }

        public function queryFetchAll(string $sql, $params = [], string $className = 'stdClass'): ?array
        {
            $stmt = $this->db->prepare($sql);
            $result = $stmt->execute($params);

            if (false === $result) {
                return null;
            }

            return $stmt->fetchAll(\PDO::FETCH_CLASS, $className);
        }

        public static function getInstancesCount(): int
        {
            return self::$instancesCount;
        }
    }


}