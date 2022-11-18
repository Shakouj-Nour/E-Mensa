<?php
/**
- Praktikum DBWT. Autoren:
- Nour, Shakouj,3531635
- Andreas Welly Octavianus, 3541951
 */
    if($_SERVER["REQUEST_METHOD"]== "POST"){
        //Unnötige Leerzeichen aus dem eingegebenen Namen entfernen
        $name =trim($_POST['benutzer']??NULL);
        //Alle Buchstaben in Kleinbuchstaben setzen
        $email = strtolower($_POST['email'] ?? NULL);
        $language = $_POST['language']?? NULL;
        $datenschutz = $_POST['datenschutz'];


        function mail_pruefen($email){
            $notallowed=['rcpt.at', 'damnthespam.at', 'wegwerfmail.at', 'trashmail.at' ];
            //prüft, ob die Eingabe in email-form ist
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                return false;
            }
            else{
                //wenn $notallowed in email gefunden wird, wird false zurückgegeben
                if(in_array($email, $notallowed)){
                    return false;
                }
                //sonst True
                else{
                    return true;
                }
            }
        }
        $fehler = NULL;
        //wenn eingegebene Name ein Element enthält, das nicht in Pattern enthalten ist, es wird ein Fehler gesetzt
        if(!preg_match("/^([a-zA-Z' ]+)$/", $name)){
            $fehler = "Name ist nicht gultig!";
        }
        //wenn email nicht gultig ist
        elseif(mail_pruefen($email)==false){
            $fehler = "E-Mail ist nicht gultig";
        }

        if(isset($fehler)){
            header("Location: http://localhost:63342/werbeseite/E-Mensa/werbeseite/werbeseite.php?status=". $fehler);
        }
        else{
            $file= fopen("newsletter.txt", "a") or die("Fehler aufgetreten");
            $data = "Name: ".$name. "\nE-Mail: ".$email. "\nSprache: ".$language."\n";
            fwrite($file, $data);
            fclose($file);
            header("Location: http://localhost:63342/werbeseite/E-Mensa/werbeseite/werbeseite.php?status=erfolgreich%22");
        }
    }

?>
