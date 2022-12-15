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

<body class="bodyRahmen">
<header>
<?php echo "Test";
include ('./Gerichte.php');
//verbindung bauen
$link = mysqli_connect(
    "localhost",
    "root",
    "root",
    "emensawerbeseite",
    "3306"
);

if (!$link) {
    echo "Verbindung fehlgeschlagen: ", mysqli_connect_error();
    exit();
}
$sql = "INSERT INTO besucher VALUES ()";
$result = mysqli_query($link, $sql);
?>
    <div class="menu">
        <img src="logo.jpg"  alt="E-Mensa Logo" class="imgLogo"  >
        <div class="menuElemnte">
            <a href="#Ankündigung" class="link">Ankündigung</a>
            <a href="#Speisen">Speisen</a>
            <a href="#Zahlen">Zahlen</a>
            <a href="#Kontakt">Kontakt</a>
            <a href="#Wichtig">Wichtig für uns</a>
        </div>
    </div>
    <hr>
</header>
<div class="body-style">
    <img src="Bild-emensa.jpg" alt ="Salat"  width_max="40%" height_max="100%"> // was mit Hight ? warum können wir das nicht änderen
    <h1>Bald gibt es Essen auch online ;)</h1>
    <div class="box" id="Ankündigung">
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic inventore, nulla. Dignissimos dolorem doloribus eos, exercitationem facilis hic laboriosam repellat sapiente. Ad alias, autem consequuntur, corporis culpa dicta eius ex fugiat harum ipsa ipsum laboriosam minus officia officiis perspiciatis possimus quam, quas quo repellendus sunt suscipit temporibus voluptatem voluptates voluptatum?
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aliquid consectetur corporis cupiditate deleniti distinctio dolore dolorem eaque eligendi fuga id illo illum iste iure, laboriosam, libero mollitia nesciunt odio officiis perspiciatis possimus quae quaerat quas quasi sequi soluta unde voluptate. Blanditiis cumque dolore enim laborum nihil sint sit sunt!
        </p>
    </div>
    <h1> Köstlichkeiten, die Sie erwarten</h1>
    <div class="box" id="Speisen">
        <table>
            <thead>
            <tr>
                <th>Img</th>
            <th>Gerichte</th>
            <th>Preis intern</th>
            <th>Preis extern</th>
                <th>Allergien</th>
            </tr>
            </thead>
            <tbody>

            <?php
            $sql="SELECT gericht.name AS Name,gericht.preis_intern AS Preis_intern,gericht.preis_extern AS Preis_extern,GROUP_CONCAT(gha.code) As G_code FROM gericht
                    left join gericht_hat_allergen gha on gericht.id = gha.gericht_id
                    Group By Name
                    LIMIT 5;";
            $result = mysqli_query($link, $sql);
            $usedCod = [];

            if (!$result) {
                echo "Fehler während der Abfrage: ", mysqli_error($link);
                exit();
            }
            while ($row = mysqli_fetch_assoc($result)) { //nimmt eine row und packt jedes row in einem Array
                echo '<tr >';
                echo '<td >'.'</td>';
                echo '<td >', $row['Name'] ,'</td>';
                echo '<td>', $row['Preis_intern'] .'&euro; </td>';
                echo '<td>', $row['Preis_intern'] .'&euro; </td>';
                if ($row['G_code'] != null){$usedCod[] = explode(',',$row['G_code'],5);}

                 // weil es eine string
                echo '<td>', $row['G_code'] ,'</td>';
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
    <br>
    Allergien Namen :
    <br>
        <?php
        //Allergen und allergencode werden ausgegeben
        foreach ($usedCod as $key => $codes){
            foreach ($codes as $key =>$code){
                $sql3 = "SELECT allergen.code, allergen.name , allergen.typ FROM allergen WHERE allergen.code = '$code'";
                $result3 = mysqli_query($link, $sql3);

                echo'<tr>';
                while ($allerge = mysqli_fetch_assoc($result3)){

                    echo'<td>'. $code . '=>' .$allerge['name'].' </td>';
                    echo '<br>';
                }
                echo'</tr>';
            }
        }
        ?>
    <h1> E-Mensa in Zahlen</h1>
    <div class="box" id="Zahlen">
        <div class="numbers">
            <div class="zahl">
                <?php
                //Anzahl der Besucher zahlen
                $sql ="SELECT COUNT(*) AS b_count FROM besucher";
                $result = mysqli_query($link, $sql);
                foreach ($result as $key => $res ){
                    echo '<h4>'.$res['b_count'].'</h4>';
                }
                ?>
                <h4>Besuche</h4>
            </div>
            <div class="zahl">
                <?php
                //anzahl der Anmeldungen zahlen
                $sql ="SELECT count(*) AS count FROM Newsletter";
                $result = mysqli_query($link, $sql);
                foreach ($result as $key => $res ){
                    echo '<h4>'.$res['count'].'</h4>';
                }
                ?>
                <h4>Anmeldungen</h4>
            </div>
            <div class="zahl">
                <?php
                //anzahl der Gerichte zahlen
                $sql ="SELECT COUNT(*) AS Anzahl_Der_Gerichte FROM gericht";
                $result = mysqli_query($link, $sql);
                foreach ($result as $key => $res ){
                    echo '<h4>'.$res['Anzahl_Der_Gerichte'].'</h4>';
                }
                ?>
                <h4>Speisen</h4>
            </div>
        </div>
    </div>
    <h1>Interesse geweckt? wir informieren Sie!</h1>
    <form action="Datei.php" method="post">
    <div  class="box" id="Kontakt">
        <div class="newsletterform">
            <label for="name" >Name:</label>
            <input type="text" id="name" name="benutzer" placeholder="Name" style="width: 20%" required>
            <label for="absender">E-Mail Adresse:</label>
            <input type="email" id="absender"  name="email" placeholder="maxmustermann@something.com" style="width: 20%" required>
            <label for="language">Sprache:</label>
            <select name="language" id="language">
                <option value="de">Deutsch</option>
                <option value="en">English</option>
            </select>
            <br>
            <br>
            <input type="checkbox" id="datenschutz" name="datenschutz" required>
            <label for="datenschutz">Den Datenschutzbestimmungen stimme ich zu</label>
            <input type="submit" value="melden">
        </div>
    </div>
    </form>
    <h1>Das ist uns Wichtig</h1>
    <ul id="Wichtig">
        <li>Beste frische saisonale Zutaten</li>
        <li>Ausgewogene abwechslungsreiche Gerichte</li>
        <li>Sauberkeit</li>
    </ul>
    <h1 style="text-align: center">Wir freuen uns auf Ihren Besuch!</h1>
</div>
<hr>
<footer>
    <ul>
        <li>(c) E-Mensa GmbH</li>
        <li>Welly</li>
        <li><a href="Impressum">Impressum</a></li>
    </ul>
</footer>
</body>
</html>