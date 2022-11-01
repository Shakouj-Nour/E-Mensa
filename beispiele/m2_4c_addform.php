<?php
/**
- Praktikum DBWT. Autoren:
- Nour, Shakouj,3531635
- Andreas Welly Octavianus, 3541951
 */
include 'm2_4a_standardparameter.php';
if(isset())
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
    </form>
    <?php
    echo $result = (int)$_GET['var1'] + (int)$_GET['var2'];
    ?>
    </body>
</html>
