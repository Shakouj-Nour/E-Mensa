@extends("layout_werbeseite")

@section('head')
    <link rel="stylesheet" href="/css/style.css">

@endsection

@section('logo')
    <img src="/img/logo.jpg"  alt="E-Mensa Logo" class="imgLogo" >
@endsection

@section('navigation')
    <a href="#Ankündigung" class="link">Ankündigung</a>
    <a href="#Speisen">Speisen</a>
    <a href="#Zahlen">Zahlen</a>
    <a href="#Wichtig">Wichtig für uns</a>
    <a href="/bewertungen">Bewertungen</a>


    @if($username !== '')
        <a class="melden" href="/abmeldung">Abmelden</a>
        <span>Angemeldet als {{ $username }}</span>
    @else
        <a class="melden" href="/anmeldung">Jetzt anmelden</a>
    @endif

@endsection

@section('mensa bild')
    <img src="/img/Bild-emensa.jpg" alt ="Salat"  width_max="40%" height_max="100%">
@endsection
@section('ankündigung schrift')
    <h1>Bald gibt es Essen auch online ;)</h1>
@endsection
@section('text')
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic inventore, nulla. Dignissimos dolorem doloribus eos, exercitationem facilis hic laboriosam repellat sapiente. Ad alias, autem consequuntur, corporis culpa dicta eius ex fugiat harum ipsa ipsum laboriosam minus officia officiis perspiciatis possimus quam, quas quo repellendus sunt suscipit temporibus voluptatem voluptates voluptatum?
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aliquid consectetur corporis cupiditate deleniti distinctio dolore dolorem eaque eligendi fuga id illo illum iste iure, laboriosam, libero mollitia nesciunt odio officiis perspiciatis possimus quae quaerat quas quasi sequi soluta unde voluptate. Blanditiis cumque dolore enim laborum nihil sint sit sunt!
@endsection
@section('speisen schrift')
    <h1> Köstlichkeiten, die Sie erwarten</h1>
@endsection
@section('speisen')

        <table>
            <thead>
            <tr>
                <th>Img</th>
                <th>Gerichte</th>
                <th>Preis intern</th>
                <th>Preis extern</th>
                <th>Allergien</th>
                @if($username != '')
                    <th>Link zur Bewertung</th>
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach($gerichte as $g  )
                <tr>
                    <td><img src="img/gerichte/{{ $g['bild'] ?? '00_image_missing.jpg' }}" class="gerichtbild"></td>
                    <td>{{$g["Name"]}}</td>
                    <td>{{$g["Preis_intern"]}} &euro;</td>
                    <td>{{$g["Preis_extern"]}} &euro;</td>
                    <td>{{$g["G_code"]}}</td>

                        <td><a href='/benutzer_verifizieren?gerichtId={{$g['gericht_id']}}'>bewerten</a></td>

                </tr>
            @endforeach


            </tbody>
        </table>
@endsection
@section('allergien')
    Allergien Namen :
    <br>
    @foreach($allergens as $a)
        <tr><td>{{$a['code']}} => {{$a['name']}}</td></tr><br>
    @endforeach

@endsection
@section('highlighted review')
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
                            <a href="/remove_hervorgehobene_bewertung?bewertung_id={{$r['bewertung_id']}}">
                                Abwählen
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
@endsection
@section('wichtig')
    <h1>Das ist uns Wichtig</h1>
    <ul id="Wichtig">
        <li>Beste frische saisonale Zutaten</li>
        <li>Ausgewogene abwechslungsreiche Gerichte</li>
        <li>Sauberkeit</li>
    </ul>
    <h1 style="text-align: center">Wir freuen uns auf Ihren Besuch!</h1>
@endsection

@section('footer')
    <ul>
        <li>(c) E-Mensa GmbH</li>
        <li>Welly</li>
        <li><a href="Impressum">Impressum</a></li>
    </ul>
@endsection

