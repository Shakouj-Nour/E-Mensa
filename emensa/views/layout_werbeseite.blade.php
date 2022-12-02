<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>E-Mensa</title>
    @yield('head')
</head>
<body class="bodyRahmen">
    <header>
        <?php
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
                @yield('logo')
                <div class="menuElemnte">
                    @yield('navigation')
                </div>
            </div>
    </header>
    <div class="body-style">
        @yield('mensa bild')
        @yield('ankündigung schrift')
        <div class="box" id="Ankündigung">
            <p>
            @yield('ankündigung')
            </p>
        </div>
        @yield('speisen schrift')
        <div class="box" id="Speisen">
            @yield('speisen')
        </div>
        @yield('allergien')
        @yield('wichtig')
    </div>
    <footer>
        @yield('footer')
    </footer>
</body>
