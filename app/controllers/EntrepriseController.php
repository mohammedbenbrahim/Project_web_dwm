<?php
class EntrepriseController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Get all companies, optionally filtered by search
    public function getAll() {
        $query = "SELECT * FROM entreprises WHERE 1=1";
        $params = [];

        // Filter by name
        if(!empty($_GET['nom'])) {
            $query .= " AND nom LIKE ?";
            $params[] = "%".$_GET['nom']."%";
        }

        // Filter by category
        if(!empty($_GET['categorie'])) {
            $query .= " AND categorie = ?";
            $params[] = $_GET['categorie'];
        }

        // Filter by proximity / city (in adresse)
        if(!empty($_GET['ville'])) {
            $query .= " AND adresse LIKE ?";
            $params[] = "%".$_GET['ville']."%";
        }

        // Order by rating descending (optional)
        $query .= " ORDER BY note_moyenne DESC";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Optional: get a single entreprise by ID
    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM entreprises WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
