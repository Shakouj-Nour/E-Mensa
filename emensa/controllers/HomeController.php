<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/gericht.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/../models/werbeseite_model.php');

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
        $gerichte = werbeseite_gericht();
        $allergens = werbeseite_allergen();


        return view('werbeseite', [
            'allergens' => $allergens,
            'gerichte' => $gerichte,

            'rd' => $request
        ]);
    }
}