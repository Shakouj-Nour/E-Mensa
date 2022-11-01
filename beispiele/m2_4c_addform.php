<?php
/**
- Praktikum DBWT. Autoren:
- Nour, Shakouj,3531635
- Andreas Welly Octavianus, 3541951
 */
include 'm2_4a_standardparameter.php';
if(isset($_POST['calculate'])){
    $var1 = $_POST['var1'];
    $var2 = $_POST['var2'];
    $result = $var1+$var2;
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
        <input type="button" value="calculate" name="calculate">
        <?php
        echo $result;
        ?>
    </form>

    </body>
</html>
