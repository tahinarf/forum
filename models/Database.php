<?php
class Database {
    private static $instance = null;
    private $conn;

    private function __construct() {
        $this->conn = new PDO('mysql:host=localhost;dbname=forum_db', 'root', '');
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->conn;
    }
}
?>