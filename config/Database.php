<?php 

    class Database
    {
        private static $host = 'localhost';
        private static $user_name = 'root';
        private static $password = '';
        private static $db_name = 'scandiweb_test';

        public static function connect()
        {
            try {
                $dsn = 'mysql:host=' . self::$host . ';dbname=' . self::$db_name;
                $pdo = new PDO($dsn, self::$user_name, self::$password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Connection failed ".$e->getMessage()."<br>";
            }
            return $pdo;
        }
    }
?>