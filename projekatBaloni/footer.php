<head>
<link rel="stylesheet" href="style.css">
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

<footer class="all-section">
        <div class="container footer-cnt">
            <div class="img-wrapper"><img src="public/slike/logo3 (2).png" alt=""></div>
            <div class="footer-menu">
                <a href="index.php" class="footer-link">HOME</a>
                <a href="kor.php" class="footer-link">PRODUCTS</a>
                <a href="onama.html" class="footer-link">ABOUT</a>
            </div>
            <div class="subscribe">
                <form>
                    <label class="footer-label" for="email">Prijavite se na nas blog za dodatne savete!</label>
                    <div class="form-input-div">
                        <input id="subscribe-mail" class="email-input" type="text" name="email" placeholder="Email Adress">
                        <form id="Forma" action="check_user.php" method="post">
                </form>
                <div style="flex-grow: 1;
    text-align: left;">
                    <a href="https://twitter.com/i/flow/login" class="soc-hold"><img style="margin: 5px;height: 30px;
    width: 30px;" src="img/twq.svg" alt="tw"></a>
                    <a href="https://www.facebook.com/" class="soc-hold"><img style="margin: 5px;
    height: 30px;
    width: 30px;" src="img/fcb.svg" alt="fb"></a>
                    <a href="https://www.instagram.com/" class="soc-hold"><img style="margin: 5px;
    height: 30px;
    width: 30px;" src="img/inst.svg" alt="ig"></a>
                </div>
        </div>
    </footer>
    <form id="Forma" action="check_user.php" method="post">
            <div>
                <label for ="username">Username:</label>
                <input type="username" id="username" name="username">
            </div>
            <div>
                <label for ="password">Lozinka:</label>
                <input type="password" id="password" name="password">
            </div>
            <div>
                <button a href= "project.html"type="submit">Prijavi se</button>
            </div>
            <div>
                <a href="regiss.php">Registruj se</a>
            </div>|
    </form>

    </body>
    