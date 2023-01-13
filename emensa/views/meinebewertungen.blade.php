<html>
<head>
    <title>Meine Bewertungen</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div class="box" id="Speisen">
    <table>
        <thead>
        <tr>
            <th>Gerichte</th>
            <th>Sterne</th>
            <th>Bemerkung</th>
            <th>Erstellt am</th>
            <th>löschen</th>
        </tr>
        </thead>
        <tbody>
        @foreach($bewertungen as $r)
            <tr>
                <td>{{$r["gericht"]}}</td>
                <td>{{$r["sterne"]}} </td>
                <td>{{$r["bemerkung"]}}</td>
                <td>{{$r["zeit"]}}</td>
                <td><a href="/delete_bewertung?bewertung_id={{$r['bewertung_id']}}">löschen</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div>
    <a href="/werbeseite" class="go_back_container">main menu</a>
</div>
</body>