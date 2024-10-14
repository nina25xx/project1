<?php
include 'conn.php';

$idkorp = $_POST['idkorp'];
$period= $_POST['period'];

$sql = "UPDATE korpa SET period = :period WHERE idkorp=:idkorp";

$stmt= $pdo->prepare($sql);

$stmt->bindParam(':period',$period);
$stmt->bindParam(':idkorp',$idkorp);

$stmt->execute();

header("Location:korpa.php");