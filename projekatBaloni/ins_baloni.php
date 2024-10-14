<?php
include 'conn.php';

$model = $_POST["model"];
$idTip = $_POST["tip"];
$idProizvodjac = $_POST["proizvodjac"];
$cena = $_POST["cena"];

$sql = "INSERT INTO balon ( idTip, idProizvodjac, model, cena) 
                    VALUES ( :idTip, :idProizvodjac, :model, :cena)";

$stmt=$pdo->prepare($sql);

$stmt->bindParam(':idTip', $idTip);
$stmt->bindParam(':idProizvodjac', $idProizvodjac);
$stmt->bindParam(':model', $model);
$stmt->bindParam(':cena', $cena);

$stmt->execute();

header("Location:administrator.php");