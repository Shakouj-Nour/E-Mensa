/**
- Praktikum DBWT. Autoren:
- Nour, Shakouj,3531635
- Andreas Welly Octavianus, 3541951
*/
<!DOCTYPE html>
<html lang="de">
<body>
<form method="GET"  >
    <label for="toTranslate">Translate:</label>
    <input id="toTranslate" type="text" name="toTranslate" value="
    <?php echo $_GET['toTranslate'] ?? NULL?>">
    <input type="submit" value="suche" name="suche">
</form>
<?php
const GET_PARAM_SEARCH_TEXT = 'toTranslate';
$translation = NULL;
$file = fopen("en.txt", "r");
$gefunden=false;
if (!empty($_GET[GET_PARAM_SEARCH_TEXT])) {
    $searchTerm = $_GET[GET_PARAM_SEARCH_TEXT];

    while (!feof($file)) {

        $zeilweise = fgets($file);
        $worte = explode(';', $zeilweise);

        if ($worte[0] == $searchTerm) {
            $gefunden= true;
            $translation = $worte[1];
            break;
        }

    }
}
if(isset($_GET['suche'])) {
    if ($gefunden) {
        echo "Das Wort ".$searchTerm." ist enthalten,  Die Übersetzung lautet: $translation";
    } else {
        echo "Das gesuchte Wort ".$searchTerm." ist nicht enthalten." . '<br>';
    }
}
fclose($file);
?>

</body>
</html>



