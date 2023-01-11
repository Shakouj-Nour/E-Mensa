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
</body>