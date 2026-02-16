<?php
require_once '../vendor/phpqrcode/qrlib.php';

QRcode::png(
    "http://localhost/annuaire_entreprises/public/entreprise.php?id=" . $_GET['id']
);
