<?php

namespace App\Base;

use PDO;
use PDOException;

class Model
{
    protected $pdo;

    public function __construct()
    {
        $this->connectDb();
    }
    public function connectDb()
    {

        $servername = env('DB_SERVERNAME') ;
        $username = env('DB_USER_NAME') ;
        $password = env('DB_PASSWORD');
        $dbname = env('DB_NAME') ;
        $port = env('DB_PORT') ;

        if (!$dbname) {
            throw new PDOException('Database name is not set in .env file');        }
        if (!$port) {
            throw new PDOException('Database port is not set in .env file');
        }
        if (!$servername) {
            throw new PDOException('Database server name is not set in .env file');
        }
        if (!$username) {
            throw new PDOException('Database username is not set in .env file');
        }
        if (!$password) {
            throw new PDOException('Database password is not set in .env file');
        }
        

        try {
            return new PDO("mysql:host=$servername;dbname=$dbname;port=$port", $username, $password);

            //     // set the PDO error mode to exception
            //     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //    $stmt = $pdo->query('SELECT * FROM test');
            //    $stmt->execute();
            //    $portfolios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            //    echo "<pre>";
            //    var_dump($portfolios);    
            //     echo "Connected successfully";
        } catch ( PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            throw $e;
        }
    }

    public function execute(string $sqlQuery, array $bindParams = []): \PDOStatement|false
    {
        $pdo = $this->connectDb();

        $stmt = $pdo->prepare($sqlQuery);
        $stmt->execute($bindParams);

        return $stmt;
    }

    public function fetchAll(string $sqlQuery,array $bindParams = []): array|false
    {
        $stmt = $this->execute($sqlQuery, $bindParams);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function fetchObj(string $sqlQuery,array $bindParams = []): mixed
    {
        $stmt = $this->execute($sqlQuery, $bindParams);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}
