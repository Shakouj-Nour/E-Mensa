<?php
//verbindung bauen
$link = mysqli_connect(
    "localhost",
    "root",
    "root",
    "emensawerbeseite",
    "3306"
);
$checkIfErstellerExist = false;
if (!$link) {
    echo "Verbindung fehlgeschlagen: ", mysqli_connect_error();
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $e_name = (!isSet( $_POST['e_name'] ) )? $e_name= "empty" : $_POST['e_name'];
    $e_name =htmlspecialchars(mysqli_real_escape_string($link,$_POST['e_name']));
    $e_mail = mysqli_real_escape_string($link,htmlspecialchars( $_POST['e_mail'])) ;
    $w_name = mysqli_real_escape_string($link,htmlspecialchars($_POST['w_name']))  ;
    $w_beschreibung = mysqli_real_escape_string($link,htmlspecialchars($_POST['w_beschreibung']))  ;

    $sqlErstellerCheck = "SELECT e_id FROM tbl_ersteller WHERE e_mail ='$e_mail'and e_name = '$e_name'";
    $result = mysqli_query($link, $sqlErstellerCheck);
    $data = mysqli_fetch_assoc($result);
    if (is_null($data)) {
        $sql_InsertErsteller = "INSERT INTO emensawerbeseite.tbl_ersteller(e_name, e_mail) VALUES ('$e_name','$e_mail')";
        $result = mysqli_query($link, $sql_InsertErsteller);
    }
    $sqlInsertWunschgericht = "INSERT INTO emensawerbeseite.tbl_wunschgerichte(w_name, w_beschreibung, e_id) VALUES ('$w_name','$w_beschreibung',
        (SELECT e_id FROM tbl_ersteller WHERE tbl_ersteller.e_mail ='$e_mail'and tbl_ersteller.e_name='$e_name'))";
    $result2 = mysqli_query($link, $sqlInsertWunschgericht);

}