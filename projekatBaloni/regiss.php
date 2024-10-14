<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="style3.css">
    <title>Registracija korisnika</title>
</head>

<body>
    <div class="box">
    <div class="container">
    <h1>Forma za registraciju</h1>
    </div>

   
        <form action="s_registracija.php" method="POST">
            <div class="input-field">
                <label for="imePrezime">Ime i Prezime:</label>
                <input type="text" class="input" name="imePrezime" id="imePrezime">
            </div>

            <div class="input-field">
                <label for="username">Username:</label>
                <input type="text" class="input" name="username" id="username">
            </div>

            <div class="input-field">
                <label for="password">Password:</label>
                <input type="text" class="input" name="password" id="password">
            </div>

            <div class="input-field">
                <input type="submit" class="submit" value="ok!">
            </div>
        </form>
    </div>
</body>
</html>