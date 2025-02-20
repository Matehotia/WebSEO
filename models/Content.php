<?php
require_once __DIR__ . '/../config/database.php';

class Content {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnexion();
    }

    public function insert($data) {
        try {
            $query = "INSERT INTO contents (title, content, url, formatted_content) 
                     VALUES (:title, :content, :url, :formatted_content)";
            
            $stmt = $this->db->prepare($query);
            $stmt->execute([
                ':title' => $data['title'],
                ':content' => $data['content'],
                ':url' => $data['url'],
                ':formatted_content' => $data['formatted_content']
            ]);
            
            return $this->db->lastInsertId(); // Retourne l'ID du dernier élément inséré
        } catch (PDOException $e) {
            echo "Erreur d'insertion : " . $e->getMessage();
            return false;
        }
    }

    public function getLastContent() {
        try {
            $query = "SELECT * FROM contents ORDER BY id DESC LIMIT 1";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur de lecture : " . $e->getMessage();
            return false;
        }
    }

    public function getContent($id) {
        try {
            $query = "SELECT * FROM contents WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur de lecture : " . $e->getMessage();
            return false;
        }
    }

    public function getAllContents() {
        try {
            $query = "SELECT * FROM contents ORDER BY id DESC";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur de lecture : " . $e->getMessage();
            return false;
        }
    }

    public function getNextId() {
        try {
            $query = "SELECT AUTO_INCREMENT FROM information_schema.TABLES 
                     WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'contents'";
            $stmt = $this->db->query($query);
            return $stmt->fetchColumn();
        } catch (PDOException $e) {
            return 1; // En cas d'erreur, retourne 1
        }
    }
}
