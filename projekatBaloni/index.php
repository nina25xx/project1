<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="style2.css">

    </head>

    <body>
    
        <?php 
        $poruka="";
        if(isset($_GET['registracija'])){
            if($_GET['registracija']==1){
                $poruka="vas nalog je registrovan.. sacekajte potvrdu administratora";
            }
        }

        $greska="";
        if(isset($_GET['error'])){
        if ($_GET['error']== 1){
            $greska="niste uneli parametre";
        }
        if ($_GET['error']==2){
            $greska="pogresna sifra ili nepostojeci korisnik";
        }
        }
?>

<h1><?php echo $greska ?></h1>
        <h1><?php echo $poruka ?></h1>
        <div class="box">

         <div class="container">   
        <span>Forma za prijavu</span>
        <header>Dobro dosli!</header>
    </div>

        <form id="Forma" action="check_user.php" method="post">
            <div class="input-field">
                <label for ="username">Username:</label>
                <input type="username" class="input" id="username" name="username">
            </div>
            <div class="input-field">
                <label for ="password">Lozinka:</label>
                <input type="password" class="input" id="password" name="password">
            </div>
            <div class="input-field">
                <input type="submit" class="submit"></input>
            </div>
            <div class="bottom">
            <div class="right">
                <label><a href="regiss.php">Registruj se</a></label>
            </div>
           </div>


        </form>
    </div>

