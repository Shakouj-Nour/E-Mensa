<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/gericht.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/../models/werbeseite_model.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/../models/benutzer.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/../models/bewertung.php');



/* Datei: controllers/HomeController.php */
class HomeController
{
    public function index(RequestData $request)
    {
        return view('home', ['rd' => $request]);
    }

    public function debug(RequestData $request)
    {
        return view('debug');
    }

    public function werbeseite(RequestData $request)
    {
        $gerichte = werbeseite_gericht();
        $allergens = werbeseite_allergen();
        $review = db_get_hervorgehobene_benutzer_bewertung();
        $_SESSION['gerichtId'] = '';

        logger()->info('Werbeseite reached');

        return view('werbeseite', [
            'allergens' => $allergens,
            'gerichte' => $gerichte,
            'username' => $_SESSION['username'] ?? '',
            'admin' => $_SESSION['admin'] ?? false,
            'review' => $review,
            'rd' => $request
        ]);
    }

    public function anmeldung(RequestData $rd)
    {
        return view('anmeldung', [
            'check_password' => $_SESSION['check_passwort'] ?? true
        ]);
    }

    public function anmeldung_verfizieren(RequestData $rd)
    {
        $success = login_controller($rd);
        if ($success) {
            $_SESSION['username'] = $_POST['b_email'];
            if(isset($_SESSION['gerichtId']) && $_SESSION['gerichtId'] >= 0 ){
                $gerichtId = $_SESSION['gerichtId'];
                header("Location: /bewertung?gerichtId=$gerichtId");
                exit();
            }
            header('Location: /werbeseite');
            logger()->info('Benutzer ist angemeldet');
        } else {
            header('Location: /anmeldung');
            logger()->warning('Fehler bei Anmeldung');
        }
    }

    public function abmeldung(RequestData $rd)
    {
        $_SESSION['username'] = '';
        $_SESSION['check_passwort'] = true;
        unset($_SESSION['logged_in']);//end session
        header('Location: /werbeseite');
        logger()->info('Benutzer ist abgemeldet');
    }

    public function benutzer_verifizieren(RequestData $rd){
        $_SESSION['gerichtId'] = $rd->query['gerichtId'];

        if(isset($_SESSION['username']) && $_SESSION['username'] !== ''){
            $gerichtId = $_SESSION['gerichtId'];
            header("Location: /bewertung?gerichtId=$gerichtId");
        }else{
            header('Location: /anmeldung');
        }
    }

    public function bewertung(RequestData $rd)
    {
        $res = db_get_gericht_bildname_name($_SESSION['gerichtId']);
        $gericht_img = $res['bildname'] ?? '00_image_missing.jpg';
        $gericht_img = "img/gerichte/$gericht_img";
        $gericht_name = $res['name'];
        if(isLoggedIn()) {
            $gerichte = werbeseite_gericht();
            return view('bewertung', [
                'check_bemerkung' => $_SESSION['check_bemerkung'] ?? true,
                'gerichte' => $gerichte,

                'gericht_img' => $gericht_img,
                'gericht_name' => $gericht_name
            ]);
        }else{
            header('Location: /anmeldung');
        }
    }

    public function bewerten_verifizieren(RequestData $rd){
        $success = bewertung_controller($rd);
        if($success){
            header('Location: /werbeseite');
        }else{
            $gerichtId = $_SESSION['gerichtId'];
            header('Location: /bewertung?gerichtId=$gerichtId');
        }
    }


    public function bewertungen(RequestData $rd){
        $review = werbeseite_review();
        $gericht = werbeseite_gericht();
        return view('bewertungen', [
            'review' => $review,
            'gericht' => $gericht,
            'admin' => $_SESSION['admin'] ?? false
        ]);
    }

    public function meinebewertungen(RequestData $rd){
        $bewertungen = db_get_benutzer_bewertung();
        return view('meinebewertungen', [
            'bewertungen' => $bewertungen
        ]);
    }

    public function delete_bewertung(RequestData $rd){
        db_delete_bewertung($rd->query['bewertung_id']);
        header("Location: /meinebewertungen");
    }

    public function hervorheben_bewertung(RequestData $rd){
        db_hervorheben_bewertung($rd->query['bewertung_id']);
        header("Location: /bewertungen");
    }

    public function remove_hervorgehobene_bewertung(RequestData $rd){
        db_hervorheben_bewertung($rd->query['bewertung_id']);
        header("Location: /werbeseite");
    }
}

