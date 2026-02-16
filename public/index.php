<?php
ini_set('display_errors',1); error_reporting(E_ALL);
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../app/controllers/EntrepriseController.php';

$controller = new EntrepriseController($pdo);
$entreprises = $controller->getAll();

require __DIR__ . '/../views/layout/header.php';
require __DIR__ . '/../views/entreprises/liste.php';
require __DIR__ . '/../views/layout/footer.php';
