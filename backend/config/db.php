<?php
    class DBConnect {
        private $host = "localhost";
        private $dbname = "tasks";
        private $user = "root";
        private $password = "";
        public $pdo;

        public function __construct()
        {
            try {
               $this->pdo = new PDO(
                    "mysql:host={$this->host};dbname={$this->dbname};charset=utf8mb4",
                    $this->user,
                    $this->password,
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        PDO::ATTR_EMULATE_PREPARES=>false
                    ]
                );

            } catch (\PDOException $e) {
               die("Error de conexión ".$e->getMessage());
            }
        }
    }
?>