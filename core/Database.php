<?php

namespace app\core;

/**
 * Class Database
 *
 * @author Hachidaime
 * @package app\core
 */
class Database
{
    public \PDO $pdo;

    /**
     * __constructor
     *
     * @return void
     */
    public function __construct(array $config)
    {
        $dsn = $config['dsn'] ?? '';
        $user = $config['user'] ?? '';
        $password = $config['password'] ?? '';
        $this->pdo = new \PDO($dsn, $user, $password);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \pdo::ERRMODE_EXCEPTION);
    }
}
?>
