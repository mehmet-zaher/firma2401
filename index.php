<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $host ="localhost";
    $dbase = "firma";
    $user ="root";
    $pwd="";
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbase","$user", "$pwd");
        print("Datenbank geöffnet");     
     }
    catch(PDOException $e) {
        print("DA hat etwas nicht geklappt<br/>");
    }
    //SQL Befehl generieren
    $sql = "SELECT * FROM abteilung;";
    // Abfrage vorbereiten
    $stm = $pdo->query($sql);

    //Abfrage an DBMS abschicken und Ergebnis speichern
    $rows = $stm->fetchall();
    $number = 1;
    foreach ($rows as $row) {
        $id = $row['AbteilungsID'];
        print("$number.Zeile: <br />");
        print("<a href='abteilung.php?abteilung=$id' target='_blank'>");
            print("inhalt: $row[0] - $row[1] - $row[2]");
        print("</a>");
        print("<br />");
        $number++;
    }
?>



    
</body>
</html>