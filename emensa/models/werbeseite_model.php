<?php
function werbeseite_gericht(){
    try{
        $link = connectdb();
        $sql_gerichte = "SELECT gericht.bildname as bild,gericht.name AS Name,gericht.preis_intern AS Preis_intern,gericht.preis_extern 
                    AS Preis_extern,GROUP_CONCAT(gha.code) As G_code FROM gericht
                    left join gericht_hat_allergen gha on gericht.id = gha.gericht_id
                    Group By Name
                    LIMIT 5;";
        $gerichte = mysqli_query($link, $sql_gerichte);
        //$data = mysqli_fetch_assoc($gerichte);
    }catch (Exception $ex) {
        $gerichte = array(
            'id'=>'-1',
            'error'=>true,
            'name' => 'Datenbankfehler '.$ex->getCode());
    }
    finally {
        return $gerichte;
    }
}
function werbeseite_allergen(){
    try{
        $link = connectdb();
        $sql_allergens = "SELECT name, code FROM allergen where code in
                                      (SELECT  gha.code
                                       FROM (SELECT id from gericht limit 5) as first
                                                join gericht_hat_allergen gha on first.id = gha.gericht_id)";
        $allergens = mysqli_query($link, $sql_allergens);
        //$data = mysqli_fetch_assoc($allergens);
    }catch (Exception $ex) {
        $allergens = array(
            'id'=>'-1',
            'error'=>true,
            'name' => 'Datenbankfehler '.$ex->getCode());
    }
    finally {
        return $allergens;
    }
}
function werbeseite_review(){
    try{
        $link = connectdb();
        $sql_review = "SELECT * FROM bewertung";
        $review = mysqli_query($link, $sql_review);

    }catch (Exception $ex) {
        $review = array(
            'id'=>'-1',
            'error'=>true,
            'name' => 'Datenbankfehler '.$ex->getCode());
    }
    finally {
        return $review;
    }
}