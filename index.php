<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>Snelste Achtbaan Van Europa</title>
</head>
<body>
    <h3>Invoeren Achtbaan</h3>

    <form action="create.php" method="post">
        <label for="achtbaan">Naam Achtbaan:</label><br>
        <input type="text" id="achtbaan" name="achtbaan"><br>
        <br>
        <label for="pretpark">Naam Pretpark:</label><br>
        <input type="text" id="pretpark" name="pretpark"><br>
        <br>
        <label for="land">Naam Land:</label><br>
        <input type="text" id="land" name="land"><br>
        <br>
        <label for="topsnelheid">Topsnelheid:</label><br>
        <input type="number" id="topsnelheid" name="topsnelheid"><br>
        <br>
        <label for="hoogte">Hoogte:</label><br>
        <input type="number" id="hoogte" name="hoogte"><br>
        <br>
        <label for="datum">Datum eerste opening:</label><br>
        <input type="date" id="datum" name="datum"><br>
        <br>
        <label for="cijfer">Cijfer voor achtbaan:</label><br>
        <input type="range" id="cijfer" name="cijfer" min="0" max="10"><br>
        <br>
        <input type="submit" value="Sla op">

    </form>
    
</body>
</html>

<?php
?>