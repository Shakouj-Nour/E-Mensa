<html>
<head>
    <title>Bewertungen</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div class="box" id="Speisen">
    <table>
        <thead>
        <tr>
            @if($admin)
                <th>Hervorheben</th>
            @endif
            <th>Gerichte</th>
            <th>Sterne</th>
            <th>Bemerkung</th>
            <th>Erstellt vom</th>
            <th>Erstellt am</th>
        </tr>
        </thead>
        <tbody>
        @foreach($review as $r)
            <tr>
                @if($admin)
                    <td>
                    <a href="/hervorheben_bewertung?bewertung_id={{$r['bewertung_id']}}">
                        @if($r['highlight'])
                            abwählen
                        @else
                            hervorheben
                        @endif
                    </a>
                    </td>
                @endif
                <td>{{$r["gericht"]}}</td>
                <td>{{$r["sterne"]}} </td>
                <td>{{$r["bemerkung"]}}</td>
                <td>{{$r["name"]}}</td>
                <td>{{$r["zeit"]}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div>
    <a href="/werbeseite" class="go_back_container">main menu</a>
</div>
<div>
    <a href="/meinebewertungen" class="go_back_container">meine Bewertungen</a>
</div>
</body>