<?php
include 'conn.php';

$idBalon = $_GET['idBalon'];


$sql = "DELETE FROM `balon` WHERE `idBalon` = :idBalon";

$stmt = $pdo->prepare($sql);

$stmt->bindParam(':idBalon', $idBalon);


$stmt->execute();


header("Location:administrator.php");