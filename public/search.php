<?php
require_once '../config/database.php';

$q = $_GET['q'] ?? '';
$categorie = $_GET['categorie'] ?? '';

$sql = "SELECT * FROM entreprises WHERE 1";
$params = [];

if ($q) {
    $sql .= " AND nom LIKE ?";
    $params[] = "%$q%";
}

if ($categorie) {
    $sql .= " AND categorie = ?";
    $params[] = $categorie;
}

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$entreprises = $stmt->fetchAll(PDO::FETCH_ASSOC);

require '../views/layout/header.php';
require '../views/entreprises/liste.php';
require '../views/layout/footer.php';
