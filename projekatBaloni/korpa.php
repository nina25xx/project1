<?php include 'session.php' ?> 
<?php include 'conn.php' ?> 
<?php
$idKorisnik = $_SESSION['idKorisnik'];

$sql = "SELECT korpa.idkorp,
             korpa.period,
             balon.model,
             balon.cena,
             s_tip.tip,
             s_proizvodjac.proizvodjac 
FROM korpa
INNER JOIN balon on korpa.idBalon = balon.idBalon
INNER JOIN s_tip on balon.idtip = s_tip.idTip 
INNER JOIN s_proizvodjac on balon.idProizvodjac = s_proizvodjac.id
WHERE idKorisnik = :idKorisnik";

$stmt= $pdo->prepare($sql);
 $stmt->bindParam(':idKorisnik', $idKorisnik);
 $stmt->execute();

 $result=$stmt->fetchAll(PDO::FETCH_ASSOC);


?>

 <!DOCTYPE html> 
 <html lang="en"> 

 <head> 
 <link rel="stylesheet" href="style4.css">
     <meta charset="UTF-8"> 
     <meta name="viewport" content="width=device-widt, initial-scale=1.0"> 
    <title>dokument</title> 
 </head> 

 <body style="background-color:#34a832;"> 
     <a href ="korisnik.php">Nazad</a>
     <div> 
    <header> 
        <h1 style="text-align:center color:#ffffff; font-size: 50px; font-weight: bold" >Dobro dosli u Vasu korpu, ovo su trenutno vasi proizvodi</h1>
			 <p>Lista proizvoda...</p> 
	</header> 
<table class="styled-table" style="border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);">
    <thead>        
     <tr style="padding: 12px 15px;">
             <th style="padding: 12px 15px;">Naziv</th>
             <th>Model</th>
             <th>Tip</th>
             <th>Proizvodjac</th>
             <th>Cena</th>
             <th>Racun</th>
             <th>Period</th>
             <th></th>
             <th></th>
         </tr>
</thead>

<?php

 $suma=0;

    
foreach($result as $stavka){ ?>
         <?php $racun = $stavka['period'] * $stavka['cena']?>
          <?php $suma += $racun; ?> 
<tbody >
        <tr style="border-bottom: 1px solid #dddddd;"> 
             <form action="upd_korpa.php" method="POST">
                <input type="text" hidden name="idkorp" value="<?php echo $stavka ['idkorp'] ?>">
                <td><?php echo $stavka['model'] ?></td>
                <td><?php echo $stavka['tip'] ?></td>
                <td><?php echo $stavka['proizvodjac'] ?></td>
                <td><input type="number" name="period" value="<?php echo $stavka['period'] ?>"></td>
                <td><?php echo $stavka['cena'] ?>eur</td>
                <td><?php echo $racun ?> eur</td>
                <td><input type="submit" value="Izmeni period"></td>
                <td><a href ="obrisi_iz_korpe.php?idKorpa=<?php echo $stavka['idkorp'] ?> ">Obrisi</a>
            </td>
            </form>
        <tr>


 <?php } ?>

        <tr>
        <td><?php echo $suma ?> EUR</td>
        </tr>

        <tbody>


</table>
</div>
 </body>
    </html> 