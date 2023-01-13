<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>E-Mensa</title>
    @yield('head')
</head>
<body class="bodyRahmen">
    <header>

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
            @yield('text')
            </p>
        </div>
        @yield('speisen schrift')
        <div class="box" id="Speisen">
            @yield('speisen')
        </div>
        @yield('allergien')
        <h1>meinungen unserer Gäste</h1>
        <div class="box" id="Speisen">
            @yield('highlighted review')
        </div>
        @yield('wichtig')
    </div>
    <footer>
        @yield('footer')
    </footer>
</body>
