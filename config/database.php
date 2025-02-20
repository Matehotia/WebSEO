<?php
class Database {
    private $host = 'localhost';
    private $dbname = 'content_db';
    private $user = 'root';  // Utilisateur par défaut de XAMPP
    private $password = '';   // Mot de passe par défaut de XAMPP
    private $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->exec("SET NAMES utf8");
        } catch (PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
        }
    }

    public function getConnexion() {
        return $this->conn;
    }

    public function closeConnexion() {
        $this->conn = null;
    }
}
