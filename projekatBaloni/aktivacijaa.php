<?php
include 'conn.php';

$idKorisnik = $_GET['idKorisnik'];
$status = $_GET['status'];

$upit="UPDATE korisnik SET aktivan = :aktivan WHERE idKorisnik= :idKorisnik";

$stmt=$pdo->prepare($upit);
// vezivanje novih promena

$stmt->bindParam(':idKorisnik',$idKorisnik);
$stmt ->bindParam(':aktivan',$status);

$stmt->execute();

header("Location:administrator.php");