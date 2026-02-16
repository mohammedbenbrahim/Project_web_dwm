<?php
require_once __DIR__ . '/../config/database.php';

$stmt = $pdo->prepare(
    "INSERT INTO avis (entreprise_id, auteur, note, commentaire) VALUES (?,?,?,?)"
);
$stmt->execute([
    $_POST['entreprise_id'],
    $_POST['auteur'],
    $_POST['note'],
    $_POST['commentaire']
]);

$pdo->prepare(
    "UPDATE entreprises SET note_moyenne = (SELECT AVG(note) FROM avis WHERE entreprise_id=?),
    nombre_avis = (SELECT COUNT(*) FROM avis WHERE entreprise_id=?) WHERE id=?"
)->execute([$_POST['entreprise_id'], $_POST['entreprise_id'], $_POST['entreprise_id']]);

header("Location: entreprise.php?id=" . $_POST['entreprise_id']);
