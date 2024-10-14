<?php include 'session.php'; ?>
<?php include 'conn.php'; ?>
<?php

$upit =$pdo->prepare("SELECT * FROM s_tip");
$upit->execute();
$tipovi=$upit->fetchAll(PDO::FETCH_ASSOC);

$upit =$pdo->prepare("SELECT * FROM s_proizvodjac");
$upit->execute();
$proizvodjaci = $upit->fetchAll(PDO::FETCH_ASSOC);
//za izlistavaje kao opcije

?>

<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="style5.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Dodaj novi balon</h1>
    <form action="ins_baloni.php" method="POST">
        <div>
            <label class="label" for="model">Model balona</label>
        <input class="label" id="model" type="text" name="model">
</div>
<div class="styled-table">
        
    <label class="label" for="tip">Tip balona</label>
    <select class="label" name="tip" id="tip">
                <?php foreach ($tipovi as $row) { ?>
                    <option value="<?php echo $row['idTip'] ?>"><?php echo $row['tip'] ?></option>
                <?php } ?>
            </select>
                
            
            <label class="label" for="proizvodjac">Proizvodjac:</label>
            <select class="label"name="proizvodjac" id="proizvodjac">
                <?php foreach ($proizvodjaci as $row) { ?>
                    <option value="<?php echo $row['id'] ?>"><?php echo $row['proizvodjac'] ?></option>
                <?php } ?>
            </select>
            
                
                
                    
            <label class="label" for="cena">Cena</label>
            <input class="label" id="cena" type="text" name="cena">
            

                </div>

                <div>
                    <input type="submit" class="submit-button" value="sacuvaj">
                </div>
                </form>
                </body>
                </html>