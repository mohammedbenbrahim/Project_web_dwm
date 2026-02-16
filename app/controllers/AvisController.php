<?php
require_once __DIR__ . '/../models/Avis.php';
class AvisController {
    private $model;
    public function __construct($pdo) { $this->model = new Avis($pdo); }
    public function getByEntreprise($id) { return $this->model->getByEntreprise($id); }
}
