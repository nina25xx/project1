<?php
include 'conn.php';

$idBalon = $_POST["idBalon"];
$model = $_POST["model"];
$idtip = $_POST["tip"];
$idProizvodjac = $_POST["proizvodjac"];
$cena = $_POST["cena"];

$sql = "UPDATE `balon` SET `idtip` = :idtip, `idProizvodjac` = :idProizvodjac, `model`=:model, `cena`=:cena
                WHERE   `idBalon` = :idBalon";

$stmt = $pdo->prepare($sql);

$stmt->bindParam(':idtip', $idtip);
$stmt->bindParam(':idProizvodjac', $idProizvodjac);
$stmt->bindParam(':model', $model);
$stmt->bindParam(':cena', $cena);
$stmt->bindParam(':idBalon',$idBalon);


$stmt->execute();

header("Location:administrator.php");
