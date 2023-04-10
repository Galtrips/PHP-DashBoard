<?php
class Connection {
    
    private $connection;
    private static $instance;
    
    private function _construct() {

        try {
            $this->connection = new PDO('sqlite:'. __DIR__ .'/../database.db'); // Non finit
            $this->connection->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
            die();
        }
    }

    public static function getDb() : Connection {
        if (empty(self::$instance)) {
            self::$instance = new Connection();
        }
        return self::$instance;
    }

    public function pdo() : PDO {
        return $this->connection;
    }
}