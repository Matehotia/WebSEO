<?php
require_once 'config/database.php';
require_once 'controllers/ContentController.php';

$controller = new ContentController();

// Récupération de l'action depuis l'URL réécrite
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Routage des requêtes
switch($action) {
    case 'create':
        $controller->create();
        break;
    case 'store':
        $controller->store();
        break;
    case 'show':
        $controller->show();
        break;
    default:
        $controller->index();
        break;
}
