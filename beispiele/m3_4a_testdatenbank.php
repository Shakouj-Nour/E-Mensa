<?php
$link = mysqli_connect(
    "127.0.0.1", // Host der Datenbank
    "root", // Benutzername zur Anmeldung
    "root", // Passwort zur Anmeldung
    "emensawerbeseite", // Auswahl der Datenbank
    3306);

if (!$link) {
    echo "Verbindung fehlgeschlagen: ", mysqli_connect_error();
    exit();
}
$sql = "SELECT name FROM gericht";
$result = mysqli_query($link, $sql);
while ($row = mysqli_fetch_row($result)) {
    var_dump($row);
}

