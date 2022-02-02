<?php

include '../kapcsolodas.php';
//print_r($_GET);
$id = $_GET['id'];

try {
    $sql = "DELETE FROM remekmuvek WHERE id='$id'";
    $utasitas = $dbc->prepare($sql);
    $utasitas->execute();
} catch (PDOException $exc) {
    echo "Lekérdezési hiba: " . $exc->getTraceAsString();
}

header('Location:szerkesztes.php');