<?php
function bewertung_controller($rd){
    if($_SERVER['REQUEST_METHOD'] !== 'POST') return;
    $_SESSION['check_bemerkung'] = true;
    $link = connectdb();
    $gericht = $_POST['gericht'];
    $bemerkung = mysqli_real_escape_string($link, $_POST['bemerkung']);
    $sterne = $_POST['star'];
    // Start Transaction
    mysqli_begin_transaction($link, MYSQLI_TRANS_START_READ_WRITE);
    /* Eingabe pruefen */

    function checkWordCount($bemerkung) {
        $wordCount = str_word_count($bemerkung);
        return $wordCount >= 5;
    }
    /* */
    if (checkWordCount($bemerkung)) {
        $_SESSION['check_bemerkung'] = true;
    } else {
        $_SESSION['check_bemerkung'] = false;
        return false;
    }
    $query = "INSERT INTO `bewertung`(`gericht`, `bemerkung`, `sterne`) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($link, $query);
    $stmt->bind_param("ssi", $gericht, $bemerkung, $sterne);
    $stmt->execute();
    $link->commit();
    $stmt->close();
    return true;
}
