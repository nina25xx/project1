<?php

include 'conn.php';

$idKorisnik= $_POST["idKorisnik"];
$idBalon = $_POST["idBalon"];
$period = $_POST["period"];

$sql ="INSERT INTO korpa (idBalon, idKorisnik, period)
            VALUES ( :idBalon, :idKorisnik, :period )";

//priprema za izvrsavanje upita
$stmt=$pdo->prepare($sql);

$stmt->bindParam(':idBalon', $idBalon);
$stmt->bindParam(':idKorisnik',$idKorisnik);
$stmt->bindParam(':period', $period);

$stmt->execute();


header("Location:korisnik.php?msg=uspesno");
