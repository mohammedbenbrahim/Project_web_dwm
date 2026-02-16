<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$pdo = new PDO(
    "mysql:host=localhost;dbname=annuaire_entreprises;charset=utf8",
    "root",
    "",
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);
