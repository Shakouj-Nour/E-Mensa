<!DOCTYPE html>
<!--
- Praktikum DBWT. Autoren:
- Nour, Shakouj,3531635
- Andreas Welly Octavianus, 3541951
-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>E-Mensa</title>
    <link rel="stylesheet" href="style.css">
</head>


<body class="bodyRahmen">
<header>
<?php echo "Test";?>
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
            </tr>
            </thead>
            <tbody>
            <?php
            include ('./Gerichte.php');
            foreach ($meals as $key => $meal){
                echo "
                <tr>
                <th>".$meal['img']."</th>
                <th>".$meal['name']."</th>
                <th>".$meal['preisIntern']."</th>
                <th>".$meal['preisExtern']."</th>
                </tr>
                ";
            }
            ?>
            </tbody>
        </table>

    </div>
    <h1> E-Mensa in Zahlen</h1>
    <div class="box" id="Zahlen">
        <div class="numbers">
            <div class="zahl">
                <h4>X</h4>
                <h4>Besuche</h4>
            </div>
            <div class="zahl">
                <h4>Y</h4>
                <h4>Anmeldungen</h4>
            </div>
            <div class="zahl">
                <h4>Z</h4>
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