<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/gericht.php');

/* Datei: controllers/HomeController.php */
class HomeController
{
    public function index(RequestData $request) {
        return view('home', ['rd' => $request ]);
    }
    
    public function debug(RequestData $request) {
        return view('debug');
    }
    public function werbeseite(RequestData $request) {
        $link = connectdb();
        $sql_gerichte = "SELECT gericht.name AS Name,gericht.preis_intern AS Preis_intern,gericht.preis_extern AS Preis_extern,GROUP_CONCAT(gha.code) As G_code FROM gericht
                    left join gericht_hat_allergen gha on gericht.id = gha.gericht_id
                    Group By Name
                    LIMIT 5;";
        $gerichte = mysqli_query($link, $sql_gerichte);
        $sql_allergens = "SELECT name, code FROM allergen where code in
                                      (SELECT  gha.code
                                       FROM (SELECT id from gericht limit 5) as first
                                                join gericht_hat_allergen gha on first.id = gha.gericht_id)";
        $allergens = mysqli_query($link, $sql_allergens);


        return view('werbeseite', [
            'allergens' => $allergens,
            'gerichte' => $gerichte,
            'text' => 'this is a paragraph',

            'rd' => $request
        ]);
    }
}