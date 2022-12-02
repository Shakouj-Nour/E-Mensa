<!DOCTYPE html>
<!--
- Praktikum DBWT. Autoren:
- Nour, Shakouj,3531635
- Andreas Welly Octavianus, 3541951
-->
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>E-Mensa</title>
    <link rel="stylesheet" href="style.css">
</head>


<body>
<FORM action="SQL-M4/M4_A1_3)_wunschreichtPHPregeln.php" method="POST">

    <fieldset>
        <legend>Wunschgericht</legend>
        <br>
        <h3>Ersteller:in Informationen : </h3>
        <label for="e_name">Name<sup>*</sup></label><br>
        <input type="text" id="e_name" name="e_name" placeholder="Name" ><br>

        <label for="e_mail">E-mail<sup>*</sup></label><br>
        <input type="text" id="e_mail" name="e_mail" placeholder="maxmustermann@something.com" required><br><br>

        <br><br>
        <h3>Wunschgericht Informationen : </h3>
        <label for="w_name">Name des Gerichtes</label>
        <input type="text" id="w_name" name="w_name">
        <br><br>
        <label for="w_beschreibung">Beschreibung</label>
        <input type="text" id="w_beschreibung" name="w_beschreibung">

        <input type="hidden" id="w_erstellungsDatum" name="w_erstellungsDatum"  value="<?php date("d/m/Y")?>">
        <br><br>
        <label for="wunscha_bschicken">Wunsch abschicken<sup>*</sup></label>
        <input type="checkbox" id="wunscha_bschicken" required>
        <br><br>
        <input type="submit" id="abschichen_button" name="abschiccken" value="Abschiccken">
        <br><br>
        <sup>*)</sup>Eingaben sind Pflicht
    </fieldset>
</FORM>
</body>

