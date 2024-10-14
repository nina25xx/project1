<?php

include 'conn.php';

$idkorp = $_GET['idkorp'];

$sql = "DELETE FROM korpa WHERE idkorp = :idkorp";

$stmt = $pdo->prepare($sql);

$stmt->bindParam(':idkorp', $idkorp);

$stmt->execute();


header("Location:korpa.php");