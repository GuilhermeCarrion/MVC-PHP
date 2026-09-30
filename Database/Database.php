<?php

class Database
{
    private static ?PDO $instance = null;

    public static function getInstance(): PDO
    {
        if (self::$instance === null) {
            $host = getenv('DB_HOST') ?: 'localhost';
            $port = getenv('DB_PORT') ?: "3306";
            $dbname = getenv('DB_NAME') ?: "mvc";
            $user = getenv('DB_USER') ?: "root";
            $pass = getenv('DB_PASS') ?: "";

            $dsn = "mysql:host={$host};port={$port};dbname={$dbname};charset=utf8mb4";

            self::$instance = new PDO($dsn, $user, $pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]);
        }

        return self::$instance;
    }
}
















// ---------------------------------------------- SQLite ----------------------------------------------

// class Database
// {
//     private static ?PDO $instance = null;

//     public static function getInstance(): PDO
//     {
//         if (self::$instance === null) {
//             $dbPath = __DIR__ . '/database.sql';

//             self::$instance = new PDO('sqlite:' . $dbPath);
//             self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//             self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
//         }

//         return self::$instance;
//     }
// }
