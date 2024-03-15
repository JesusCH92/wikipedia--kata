<?php

declare(strict_types=1);

namespace App\Common\Infrastructure;

use Exception;
use PDO;
use PDOException;

abstract class DbConnector
{
    private PDO $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:dbname=database;host=mysql', 'user', 'password');
        } catch (PDOException $e) {
            throw new Exception('Error al conectar la app.');
        }
    }

    public function pdo()
    {
        return $this->pdo;
    }
}
