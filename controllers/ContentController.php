<?php
require_once 'models/Content.php';

class ContentController {
    private $model;

    public function __construct() {
        $this->model = new Content();
    }

    public function index() {
        require_once 'views/content/form.php';
    }

    public function create() {
        require_once 'views/content/form.php';
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'] ?? '';
            $content = $_POST['content'] ?? '';
            
            // Formatage du contenu
            $formatted_content = "<h1>" . htmlspecialchars($title) . "</h1>\n<p>" . htmlspecialchars($content) . "</p>";
            
            $id = $this->model->insert([
                'title' => $title,
                'content' => $content,
                'url' => 'article-' . $this->model->getNextId() . '.html',
                'formatted_content' => $formatted_content
            ]);

            // Redirection vers l'article créé
            if ($id) {
                header('Location: /S6Web/REFERENCEMENT%20NATUREL/Test/pages/article-' . $id . '.html');
                exit;
            }
        }
    }

    private function createSlug($text) {
        // Convertit en minuscules
        $text = strtolower($text);
        
        // Remplace les caractères spéciaux et les accents
        $text = str_replace(
            array('à','á','â','ã','ä', 'ç', 'è','é','ê','ë', 'ì','í','î','ï', 'ñ', 'ò','ó','ô','õ','ö', 'ù','ú','û','ü', 'ý','ÿ'),
            array('a','a','a','a','a', 'c', 'e','e','e','e', 'i','i','i','i', 'n', 'o','o','o','o','o', 'u','u','u','u', 'y','y'),
            $text
        );
        
        // Remplace tout ce qui n'est pas lettre ou chiffre par un tiret
        $text = preg_replace('/[^a-z0-9_]+/', '-', $text);
        
        // Supprime les tirets en début et fin
        return trim($text, '-');
    }
}
