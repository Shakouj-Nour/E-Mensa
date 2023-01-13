<?php


$link = mysqli_connect("localhost", "root", "root", "emensawerbeseite");
if (!$link) {
    echo"Verbindung fehlschlagen: ", mysqli_connect_error();
    exit();
}

$sql = "INSERT INTO tbl_benutzeren(b_name,b_email,b_passwort,b_admin,b_anzahlfehler,b_anzahlAnmeldung,b_letzteanmeldung,b_letzterFehler)
VALUES ('Noone','123@emensa.example', ?, 0, 0,1,'13/12/22','13/12/22' )";

$b_passwort = crypt('Welly', 'dbwt');
$statement = $link->prepare($sql);
if ($statement == false) {
    echo('Error' . $link->error);
}
$statement->bind_param('s', $b_passwort);
$statement->execute();