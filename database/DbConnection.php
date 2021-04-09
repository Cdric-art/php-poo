<?php

namespace Database;

use PDO;

class DbConnection
{

    private string $dbname;
    private string $host;
    private string $username;
    private string $password;
    private PDO $pdo;

    public function __construct(string $dbname, string $host, string $username, string $password)
    {
        $this->dbname = $dbname;
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
    }

    public function getPDO(): PDO
    {
        return $this->pdo ?? $this->pdo = new PDO(
            "mysql:host={$this->host};dbname={$this->dbname};",
            $this->username,
            $this->password,
                [
                    // Option spécifique à MySQL pour l'encodage
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                    // Pour avoir des messages d'erreurs
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
                    // Résultat des requêtes en tableau associatif par défaut
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
    }

}
