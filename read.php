<?php
    /**
     * Maak een verbinding met de mysql-server en database
     */

    // 1. Voeg een configuratiebestand toe
    require('config.php');

    // 2. Maak een data source name string
    $dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

    try {
        // 3. Maak een pdo-object aan voor het maken van de verbinding
        $pdo = new PDO($dsn, $dbUser, $dbPass);
        if ($pdo) {
            // echo "Er is verbinding met de mysql-server en database";
        } else {
            echo "Interne server-error. Probeer het later nog eens";
        }
    } catch(PDOException $e) {
        echo $e->getMessage();
    }

    // 4. Maak een select query voor het opvragen van de gegevens.
    $sql = "SELECT Id
                  ,achtbaan
                  ,pretpark
                  ,land
                  ,topsnelheid
                  ,hoogte
                  ,datum
                  ,cijfer
            FROM achtbaandetails
            ORDER BY Id";

    // 5. We bereiden de query voor met de method prepare()
    $statement = $pdo->prepare($sql);

    // 6. We vuren de query af op de mysql-database
    $statement->execute();

    // 7. We stoppen het resultaat van de query in de variabele $result
    $result = $statement->fetchAll(PDO::FETCH_OBJ);

    $rows = "";
    foreach ($result as $info) {
        $rows .= "<tr>
                    <td>$info->Id</td>
                    <td>$info->achtbaan</td>
                    <td>$info->pretpark</td>
                    <td>$info->land</td>
                    <td>$info->topsnelheid</td>
                    <td>$info->hoogte</td>
                    <td>$info->datum</td>
                    <td>$info->cijfer</td>
                    <td>
                        <a href='delete.php?id={$info->Id}'>
                            <img src='img/b_drop.png' alt='kruis'>
                        </a>
                    </td>
                    <td> 
                        <a href='update.php?id={$info->Id}'>
                            <img src='img/b_edit.png' alt='potlood'>
                        </a>
                    </td>
                  </tr>";
    }
?>

<h3>tabel achtbanen</h3>
<a href="index.php"><input type="button" value="Add nieuw record"></a>
<br><br>
<table border="1">
    <thead>
        <th>Id</th>
        <th>achtbaan</th>
        <th>pretpark</th>
        <th>land</th>
        <th>topsnelheid</th>
        <th>hoogte</th>
        <th>datum</th>
        <th>cijfer</th>
        <th></th>
        <th></th>   
    </thead>
    <tbody>
        <?= $rows; ?>   
    </tbody>
</table>