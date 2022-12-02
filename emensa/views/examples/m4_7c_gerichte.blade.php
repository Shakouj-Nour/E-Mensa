<html>
<body>
<h1>Daten aus der Datenbank der Tabelle: Gericht</h1>
<ul>
    @forelse($gerichte as $a)
        <li>{{$a['name']}}, {{number_format($a['preis_intern'], 2)}} €</li>
    @empty
        <li>Es sind keine Gerichte vorhanden</li>
    @endforelse
</ul>
</body>
</html>