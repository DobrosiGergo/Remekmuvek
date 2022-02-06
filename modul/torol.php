<?php

include '../kapcsolodas.php';
//print_r($_GET);
$id = $_GET['id'];

try {
    $sql = "DELETE FROM remekmuvek WHERE id='$id'";
    $utasitas = $dbc->prepare($sql);
    $utasitas->execute();
    $sql2 ="DELETE FROM comments WHERE oldalszam='$id'";
    $utasitas2 = $dbc->prepare($sql2);
    $utasitas2->execute();
} catch (PDOException $exc) {
    echo "Lekérdezési hiba: " . $exc->getTraceAsString();
}

header('Location:szerkesztes.php');