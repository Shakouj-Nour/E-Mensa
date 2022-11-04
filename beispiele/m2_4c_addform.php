<?php
/**
- Praktikum DBWT. Autoren:
- Nour, Shakouj,3531635
- Andreas Welly Octavianus, 3541951
 */
include 'm2_4a_standardparameter.php';
function multiply($var1, $var2){
    return $var1*$var2;
}
?>
<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8"/>
        <title>4C</title>
    </head>
    <body>
    <form method="post">
        <label for="a">first</label>
        <input id="a" type="text" name="var1">
        <label for="b">second</label>
        <input id="b" type="text" name="var2">
        <br>
        <input type="submit" value="addieren" name="button">
        <input type="submit" name="button" value="multiplieren">
        <?php
        $var1 = $_POST['var1'] ?? NULL;
        $var2 = $_POST['var2'] ?? NULL;
        if(($_POST['button']) == "addieren"){
            $result =  addieren($var1, $var2);
            echo $result;
        }
        elseif (($_POST['button']) == "multiplieren"){
            $result =  multiply($var1, $var2);
            echo $result;
        }
        elseif(empty($_POST['button'])){
            echo 'nicht gultig';
        }
        ?>
    </form>

    </body>
</html>
