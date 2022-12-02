@extends("layout_werbeseite")

@section('head')
    <link rel="stylesheet" href="/css/style.css">
@endsection

@section('logo')
    <img src="/img/logo.jpg"  alt="E-Mensa Logo" class="imgLogo"  >
@endsection

@section('navigation')
    <a href="#Ankündigung" class="link">Ankündigung</a>
    <a href="#Speisen">Speisen</a>
    <a href="#Zahlen">Zahlen</a>
    <a href="#Kontakt">Kontakt</a>
    <a href="#Wichtig">Wichtig für uns</a>
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
            </tr>
            </thead>
            <tbody>
            @foreach($gerichte as $g  )
                <tr>
                    <td>.</td>
                    <td>{{$g["Name"]}}"</td>
                    <td>{{$g["Preis_intern"]}} &euro;</td>
                    <td>{{$g["Preis_extern"]}} &euro;</td>
                    <td>{{$g["G_code"]}}</td>
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

