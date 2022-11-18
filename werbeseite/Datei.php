<?php
/**
- Praktikum DBWT. Autoren:
- Nour, Shakouj,3531635
- Andreas Welly Octavianus, 3541951
 */
include ("C:\Users\Shako\PhpstormProjects\E-Mensa\werbeseite\werbeseite.php");
    if($_SERVER["REQUEST_METHOD"]== "POST"){

        $name =trim($_POST['benutzer']??NULL);
        $email = strtolower($_POST['email'] ?? NULL);
        $language = $_POST['language']?? NULL;
        $datenschutz = $_POST['datenschutz'];


        function mail_pruefen($email){
            $notallowed=['rcpt.at', 'damnthespam.at', 'wegwerfmail.at', 'trashmail.at' ];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                return false;
            }
            else{
                if(in_array($email, $notallowed)){
                    return false;
                }
                else{
                    return true;
                }
            }
        }
        $fehler = NULL;
        if(!preg_match("/^([a-zA-Z' ]+)$/", $name)){
            $fehler = "Name ist nicht gultig!";
        }
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
            $sql = "INSERT INTO Newsletter VALUES ()";
            $result = mysqli_query($link, $sql);

            header("Location: http://localhost:63342/E-Mensa/werbeseite/werbeseite.php?status=erfolgreich%22");
        }
    }

?>
