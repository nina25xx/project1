<?php include 'session.php'; ?>
<?php include 'conn.php'; ?>

<?php
$idKorisnik=$_SESSION['idKorisnik'];

$sql ="SELECT balon.model, balon.cena, balon.idBalon,
s_tip.tip,
s_proizvodjac.proizvodjac
FROM balon
LEFT JOIN s_tip on balon.idtip = s_tip.idTip  
LEFT JOIN s_proizvodjac on balon.idProizvodjac = s_proizvodjac.id";

$stmt= $pdo->prepare($sql);

$stmt->execute();

$baloni =$stmt->fetchAll();

$sql= "SELECT idBalon
FROM korpa
WHERE idKorisnik= :idKorisnik";
$stmt=$pdo->prepare($sql);
$stmt->bindParam(':idKorisnik', $idKorisnik);
$stmt->execute();

$mojakorpa=$stmt->fetchAll();

$stavkeUkorpi=count($mojakorpa);

$poruka = "";
if (isset($_GET['msg'])) {
    if ($_GET['msg']== "uspesno") {
        $poruka="Uspesno ste rezervisali Vas balon!";
    }
}
?>


<!DOCTYPE html>
<html lang ="en">
    <head>
    <link rel="stylesheet" href="style4.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        Ulogovali ste se kao korisnik sistema.
        <span style="position: absolute;top: 0;right: 0;">
            <a href="logOut.php">Log out</a>
        </span>

        <div> 

        <div style="display: flex;">
        <span><a style="border: 3px solid black; border-radius: 10px;" href="korpa.php">Moja korpa</a><span style="border: 3px solid black; border-radius: 10px;""><?php echo $stavkeUkorpi; ?> </span></span>
        </div>
        <h2>Dostupni baloni</h2>
        <h2><?php echo $poruka; ?></h2>

        <table style="table-layout: fixed;
        width: 100%;
        border-collapse: collapse;
        border: 3px solid grey;
        border-radius: 10px;
        background: rgba(0, 0.45, 0, 0.255);">
            <thead>
            <tr>
                <th>Model</th>
                <th>Tip</th>
                <th>Proizvodjac</th>
                <th>Cena po satu</th>
            </tr>
            </thead>

            <tbody>

        <?php foreach ($baloni as $balon) { ?>
            <?php $ukorpi = 0; ?>
            <?php foreach($mojakorpa as $stavka) { ?> 
                <?php if ($balon['idBalon'] === $stavka['idBalon']) { 
                    $ukorpi = true; 
                    break;
                 } ?>

                 <?php } ?>

                 <?php if ($ukorpi == 0) { ?>

            <tr>
                <td ><?php echo $balon['model'] ?></td>
                <td><?php echo $balon['tip'] ?></td>
                <td><?php echo $balon['proizvodjac'] ?></td>
                <td><?php echo $balon['cena'] ?></td>
                <td>
                    <form action="ins_korpa.php" method="post">
                    <input class="label" type="text" hidden name="idKorisnik" value="<?php echo $idKorisnik ?>">
                    <input class="label" type="text" hidden name= "idBalon" value="<?php echo $balon['idBalon'] ?>">
                    <input class="label" type="number" placeholder="Period" name="period">
                        <input class="label" type="submit" value="Dodaj u korpu">
                    </form>
                </td>
            </tr>
            <?php } ?>

        <?php } ?>
            </tbody>
        </table>
        </div>


    </body>
</html>