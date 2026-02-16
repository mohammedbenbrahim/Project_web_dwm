<?php
class Avis {
    private $pdo;
    public function __construct($pdo) { $this->pdo = $pdo; }
    public function getByEntreprise($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM avis WHERE entreprise_id=? ORDER BY date_creation DESC");
        $stmt->execute([$id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
