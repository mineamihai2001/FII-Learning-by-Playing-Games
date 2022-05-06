<?php

class Database
{
    static $conn = null;
    static function get_connection()
    {
        if (is_null(Database::$conn)) {
            include("config.php");
            $host = $local_db['host'];
            $db = $local_db['db'];
            $charset = $local_db['charset'];
            $user = $local_db['user'];
            $password = $local_db['password'];

            $dns = "mysql:host=$host;dbname=$db;charset=$charset";

            $opt = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_PERSISTENT          => TRUE
            ];

            try {
                Database::$conn = new PDO($dns, $user, $password, $opt);
            } catch (PDOException $e) {
                echo "$dns - Error: " . $e->getMessage();
                exit(0);
            };
        }
        return Database::$conn;
    }
}
