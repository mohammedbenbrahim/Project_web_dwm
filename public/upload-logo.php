<?php
require_once __DIR__ . '/../config/database.php';
$name = time() . '_' . $_FILES['logo']['name'];
move_uploaded_file($_FILES['logo']['tmp_name'], "../uploads/logos/" . $name);
$stmt = $pdo->prepare("UPDATE entreprises SET logo=? WHERE id=?");
$stmt->execute([$name, $_POST['id']]);
header("Location: entreprise.php?id=" . $_POST['id']);
