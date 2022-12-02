<html>
<body>
    <h1>Daten aus der Datenbank der Tabelle: Kategorie</h1>
    <ul>
        @forelse($kategorie as $a)
            <li>{{$a['name']}}</li>
        @empty
            <li>Keine Daten vorhanden.</li>
        @endforelse
    </ul>
</body>
</html>
<style>
    li:nth-child(2n) {font-weight: bold;}
</style>