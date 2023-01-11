<?php
function bewertung_controller($rd){
    if($_SERVER['REQUEST_METHOD'] !== 'POST') return;
    $_SESSION['check_bemerkung'] = true;

    $link = connectdb();

    $userId = $_SESSION['userId'];
    $gerichtId = $_SESSION['gerichtId'];
    $bemerkung = mysqli_real_escape_string($link, $_POST['bemerkung']);
    $sterne = $_POST['star'];
    // Start Transaction
    mysqli_begin_transaction($link, MYSQLI_TRANS_START_READ_WRITE);
    /* Eingabe pruefen */

    if(strlen($bemerkung) < 5){
        return false;
    }


    $stmt = $link->prepare("INSERT INTO bewertung (bemerkung, b_id, sterne, gericht_id)
    VALUES (?, ?, ?, ?)");
    $stmt->bind_param("siii",  $bemerkung, $userId, $sterne, $gerichtId);
    $stmt->execute();
    $link->commit();
    $stmt->close();
    return true;
}
function db_get_gericht_bildname_name($id){
    $link = connectdb();

    $gerichtId = $link->real_escape_string($id);

    $sql = "SELECT DISTINCT bildname, name FROM gericht WHERE id = $gerichtId";

    $res_bildname = mysqli_query($link, $sql)->fetch_assoc();

    if (!$res_bildname) {
        echo "Fehler während der Abfrage:  ", mysqli_error($link);
        exit();
    };

    mysqli_close($link);
    return $res_bildname;
}
function db_get_benutzer_bewertung(){
    $link = connectdb();
    $userId = $_SESSION['userId'];

    $sql = "SELECT b.id as bewertung_id , g.name as gericht, bemerkung, sterne, zeit FROM bewertung as b
            JOIN gericht as g on g.id = b.gericht_id AND b.b_id = $userId
            ORDER BY b.zeit DESC 
            LIMIT 30";

    $res = $link->query($sql);
    return $res;
}

function db_delete_bewertung($bewertung_id){
    $link = connectdb();
    $userId = $_SESSION['userId'];

    $sql = "DELETE FROM bewertung 
            WHERE bewertung.id = $bewertung_id AND bewertung.b_id = $userId";

    $link->query($sql);
}