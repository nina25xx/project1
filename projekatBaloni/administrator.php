 <?php include 'session.php'; ?>
 <?php include 'conn.php'; ?>
 <?php

 $baza = $_SESSION['imePrezime'];
 $idKorisnik=$_SESSION['idKorisnik'];

 $sql= "SELECT * FROM korisnik WHERE idKorisnik !=:idKorisnik";

 $stmt=$pdo->prepare($sql);
 $stmt->bindParam(':idKorisnik',$idKorisnik);
 $stmt->execute();
 $korisnici=$stmt->fetchAll();

 $sql ="SELECT `balon`.model, `balon`.cena, `balon`.idBalon,
                s_tip.tip,
                s_proizvodjac.proizvodjac
            FROM balon
            LEFT JOIN s_tip on balon.idtip = s_tip.idTip
            LEFT JOIN s_proizvodjac on balon.idProizvodjac = s_proizvodjac.id";

 $stmt = $pdo ->prepare($sql);
$stmt->execute();
 $baloni = $stmt->fetchAll();
 
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body{ 
            background:url("slike/slika14.png");
            background-size: cover;
            background-attachment: fixed;
        }

        h1{
            font-size:30pt;
            color: #000;
        }
        </style>

</head>

<body>
    Ulogovali ste se kao administrator sistema!
    <span style="position: absolute; top: 0;right: 0;">
        <span><?php echo $baza ?></span>
        <a href="logout.php">Log out</a>
    </span>

    <div>
        <?php foreach($korisnici as $key => $korisnik){
            $key++;
            ?>

            <div>
                <?php echo $key ?>. 
            <table style="border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0.70, 0.15);">
                <td style="padding: 12px 15px;">
                <tr style="background-color: rgba(255,255,255,0.2); color: #fff;"
    >Ime i Prezime: <?php echo $korisnik['imePrezime'] ?> </tr>
               <tr style="background-color: rgba(255,255,255,0.2); color: #fff;"
    > Username:<?php echo $korisnik['username'] ?> </tr>
              <tr style="background-color: rgba(255,255,255,0.2); color: #fff;"
    >  <?php if ($korisnik['aktivan']==1 ) { ?> </tr>
                 <tr style="background-color: rgba(255,255,255,0.2); color: #fff;"
    >   <a href="aktivacijaa.php?status=0&idKorisnik=<?php echo $korisnik['idKorisnik'] ?>">deaktiviraj</a> </tr>
                <?php } ?>
              <tr style="background-color: rgba(255,255,255,0.2); color: #fff;">  <?php if($korisnik['aktivan']==0) { ?> </tr>
               <tr style="background-color: rgba(255,255,255,0.2); color: #fff;">     <a href="aktivacijaa.php?status=1&idkorisnik=<?php echo $korisnik['idKorisnik'] ?>">aktiviraj</a> </tr>
                <?php } ?>
              </td>
                </table>
            </div>


        <?php  }  ?>
    </div>

    <h1>Baloni</h1>
    <div><a style="color :hotpink;
    text-decoration: none;
    font-size:15pt;" href ="dodaj_balon.php">Dodaj balon</a></div>

    <table style="border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0.70, 0.15);
    width: 150%;">
    <thead>
        <td style="padding: 12px 15px;">
                <tr style=" background-color: #171f4a;;
    color: #ffffff;
    text-align: left;background-color: #f3f3f3;">Model</tr>
                
               
                <tr style="background-color: rgba(255,255,255,0.2);
	color: #fff;">Tip</tr>
                
                
                <tr style="background-color: rgba(255,255,255,0.2);
	color: #fff;">Proizvodjac</tr>
                
                
                <tr style="background-color: rgba(255,255,255,0.2);
	color: #fff;">Cena</tr>
         </thead>   

    <tbody>

    <?php foreach($baloni as $balon) { ?>
        <tr>
            <td><?php echo $balon['model'] ?></td>
            <td><?php echo $balon['tip'] ?></td>
            <td><?php echo $balon['proizvodjac'] ?></td>
            <td><?php echo $balon['cena'] ?>EUR</td>
            <td>
                <div>
                    <a href="azuriranje.php?idBalon=<?php echo $balon['idBalon']?>">Azuriraj</a>
                </div>
            <div>
                <a href="brisanje.php?idBalon=<?php echo $balon['idBalon']?>">Obrisi</a>
            </div>
            </td>
            </tr>
            <?php  }  ?>
        </tbody>
    </table>
</div>
</body>
</html>

</body>
</html>