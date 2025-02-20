<?php
require_once '../models/Content.php';

$id = $_GET['id'];
$content = new Content();
$article = $content->getContent($id);

if ($article) {
    echo $article['formatted_content'];
} else {
    echo "<p>Article non trouvé</p>";
}
