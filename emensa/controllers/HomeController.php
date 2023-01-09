<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/gericht.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/../models/werbeseite_model.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/../models/benutzer.php');



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

        logger()->info('Werbeseite reached');

        return view('werbeseite', [
            'allergens' => $allergens,
            'gerichte' => $gerichte,
            'username' => $_SESSION['username'] ?? '',

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

    public function bewerten(RequestData $rd)
    {
        if(isLoggedIn()) {
            $gerichte = werbeseite_gericht();
            return view('bewerten', [
                'gerichte' => $gerichte,

                'rd' => $rd
            ]);
        }else{
            header('Location: /anmeldung');
        }
    }

    public function bewertungen(RequestData $rd){
        $review = werbeseite_review();
        return view('bewertungen', [
            'review' => $review
        ]);
    }
}
