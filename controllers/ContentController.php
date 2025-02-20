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
        // recupere les donnees du formulaire 
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'] ?? '';
            $content = $_POST['content'] ?? '';
            $url = $_POST['url'] ?? '';
            
            // Formatage du contenu
            $formatted_content = $this->formatContent($title, $content);
            
            //Sauvegarde dans la BD via le modèle
            $result = $this->model->insert([
                'title' => $title,
                'content' => $content,
                'url' => $url,
                'formatted_content' => $formatted_content
            ]);

            if ($result) {
                // Rediriger vers la page d'affichage
                header('Location: index.php?action=show');
                exit;
            } else {
                header('Location: index.php?error=1');
                exit;
            }
        }
    }

    public function show() {
        $content = $this->model->getLastContent();
        require_once 'views/content/show.php';
    }

    private function formatContent($title, $content) {
        return "<h1>" . htmlspecialchars($title) . "</h1>\n<p>" . htmlspecialchars($content) . "</p>";
    }
}
