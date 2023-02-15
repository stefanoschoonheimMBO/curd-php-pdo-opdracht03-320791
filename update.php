<?php
require('config.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    if ($pdo) {
        // echo "Verbinding";
    } else {
        // echo "Interne error";
    }
} catch(PDOException $e) {
    $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "Er is op het formulier knopje gedrukt";
    var_dump($_POST);
    try {
        $sql = "UPDATE achtbaandetails
                SET achtbaan = :achtbaan,
                    pretpark = :pretpark,
                    land = :land,
                    topsnelheid = :topsnelheid,
                    hoogte = :hoogte,
                    datum = :datum,
                    cijfer = :cijfer

                WHERE Id = :Id";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(':Id', $_POST['id'], PDO::PARAM_INT);
        $statement->bindValue(':achtbaan', $_POST['achtbaan'], PDO::PARAM_STR);
        $statement->bindValue(':pretpark', $_POST['pretpark'], PDO::PARAM_STR);
        $statement->bindValue(':land', $_POST['land'], PDO::PARAM_STR);
        $statement->bindValue(':topsnelheid', $_POST['topsnelheid'], PDO::PARAM_STR);
        $statement->bindValue(':hoogte', $_POST['hoogte'], PDO::PARAM_STR);
        $statement->bindValue(':datum', $_POST['datum'], PDO::PARAM_STR);
        $statement->bindValue(':cijfer', $_POST['cijfer'], PDO::PARAM_STR);

        $statement->execute();

        header('Refresh:3; url=read.php');
    } catch(PDOException $e) {
        echo 'Het record is niet geupdate, probeer het opnieuw.'; 
        header('Refresh:3; url=read.php');
    }
    exit();
} 

$sql = "SELECT Id
              ,achtbaan as AB
              ,pretpark as PP
              ,land as LA
              ,topsnelheid as TS
              ,hoogte as HO
              ,datum as DA
              ,cijfer as CI
        FROM achtbaandetails
        WHERE Id = :Id";

$statement = $pdo->prepare($sql);

$statement->bindValue(':Id', $_GET['id'], PDO::PARAM_INT);

$statement->execute();

$result = $statement->fetch(PDO::FETCH_OBJ);

var_dump($result);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>PDO CRUD</title>
</head>
<body>
    <h3>Wijzig het record</h3>

    <form action="update.php" method="post">
        <label for="achtbaan">Naam Achtbaan:</label><br>
        <input type="text" id="achtbaan" name="achtbaan" value="<?= $result->AB ?>"><br>
        <br>
        <label for="pretpark">Naam Pretpark:</label><br>
        <input type="text" id="pretpark" name="pretpark" value="<?= $result->PP ?>"><br>
        <br>
        <label for="land">Naam Land:</label><br>
        <input type="text" id="land" name="land" value="<?= $result->LA ?>"><br>
        <br>
        <label for="topsnelheid">Topsnelheid:</label><br>
        <input type="number" id="topsnelheid" name="topsnelheid" value="<?= $result->TS?>"><br>
        <br>
        <label for="hoogte">Hoogte:</label><br>
        <input type="text" id="hoogte" name="hoogte" value="<?= $result->HO?>"><br>
        <br>
        <label for="datum">Huisnummer</label><br>
        <input type="date" id="datum" name="datum" value="<?= $result->DA?>"><br>
        <br>
        <label for="cijfer">Woonplaats</label><br>
        <input type="text" id="cijfer" name="cijfer" value="<?= $result->CI?>"><br>
        <br>
        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
        <input type="submit" value="Sla op">

    </form>    
</body>
</html>