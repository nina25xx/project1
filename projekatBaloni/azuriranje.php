<?php include 'session.php'; ?>
<?php include 'conn.php'; ?>
<?php

$idBalon = $_GET['idBalon'];

$sql = "SELECT *
        FROM balon
        WHERE idBalon= :idBalon";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':idBalon', $idBalon);
$stmt->execute();

$baloniZaAzuriranje = $stmt->fetch(PDO::FETCH_ASSOC);

$upit = $pdo->prepare("SELECT * FROM s_tip");
$upit->execute();
$tipovi = $upit->fetchAll(PDO::FETCH_ASSOC);


$upit = $pdo->prepare("SELECT * FROM s_proizvodjac");
$upit->execute();
$proizvodjaci = $upit->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="style5.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documentt</title>
</head>

<body>
    <h1>Azuriraj balone</h1>
    <form action="updt_balon.php" method="POST">
        <div class="styled-table">
            <label class="label" for="model">Model</label>
            <input class="label" type="text" name="idBalon" hidden value="<?php echo $idBalon ?>">
            <input class="label"id="model" type="text" name="model" value="<?php echo $baloniZaAzuriranje['model'] ?>">
        </div>

        <div class="styled-table">
            <label class="label" for="tip">Tip</label>
            <select class="label" name="tip" id="tip">
                <?php foreach ($tipovi as $row) {
                    $selected = "";
                    if ($row['idTip'] == $baloniZaAzuriranje['idtip']) {
                        $selected = "selected";
                    }
                ?>
                    <option <?php echo $selected ?> value="<?php echo $row['idTip'] ?>"><?php echo $row['tip'] ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="styled-table">
            <label class="label" for="proizvodjac">Proizvodjac</label>
            <select class="label" name="proizvodjac" id="proizvodjac">
                <?php foreach ($proizvodjaci as $row) {
                    $selected = "";
                    if ($row['id'] == $baloniZaAzuriranje['idProizvodjac']) {
                        $selected = "selected";
                    }
                ?>
                    <option <?php echo $selected ?> value="<?php echo $row['id'] ?>"><?php echo $row['proizvodjac'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="styled-table">
            <label class="label" for="cena">Cena</label>
            <input class="label" id="cena" type="text" name="cena" value="<?php echo $baloniZaAzuriranje['cena'] ?>">
        </div>
        <div>
            <input class="label" type="submit" value="Sacuvaj">
        </div>
    </form>
</body>

</html>