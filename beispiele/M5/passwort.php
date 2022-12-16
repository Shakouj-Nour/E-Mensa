<?php


$link = mysqli_connect("localhost", "root", "root", "emensawerbeseite");
if (!$link) {
    echo"Verbindung fehlschlagen: ", mysqli_connect_error();
    exit();
}

$sql = "INSERT INTO tbl_benutzeren(b_name,b_email,b_passwort,b_admin,b_anzahlfehler,b_anzahlAnmeldung,b_letzteanmeldung,b_letzterFehler) VALUES ('Nour','admin@emensa.example', ?, 1, 0,1,'13/12/22','13/12/22' )";

$b_passwort = crypt('Nour', 'dbwt');
$statement = $link->prepare($sql);
if ($statement == false) {
    echo('Error' . $link->error);
}
$statement->bind_param('s', $b_passwort);
$statement->execute();