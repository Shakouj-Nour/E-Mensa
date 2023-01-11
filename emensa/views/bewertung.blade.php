<html>
<head>
    <title>Bewerten</title>
    <style>
        .gericht_container{
            display: flex;
            flex-direction: column;
            justify-content: left;
            align-items: normal;
        }
        .gericht_container > img {
            max-height: 5%;
            max-width: 15%;
        }
    </style>
</head>
<body>
<div class="welcome_container">
    <h1>Haben unsere Gerichte Ihnen gefallen?</h1>
</div>
<div class="gericht_container">
    <img alt="gerichte" src="{{$gericht_img}}">
    <h3>{{$gericht_name}}</h3>
</div>
<form action="/bewerten_verifizieren" method="post" id="bewerten">
    <div>
        <div class="form-head"></div>
        <div class="field-column">
            <div>
                <label for="bemerkung">bemerkung</label>
            </div>
            <div>
                <textarea type="textarea" class="form-control" name="bemerkung" access="false" id="bemerkung" minlength="5" required></textarea>
                @if(!$check_bemerkung)
                    <span class="fehler">Eingabe muss mindestens 5 Zeichen sein</span>
                @endif
            </div>
            <div>
                <label for="star">Stars</label>
            </div>
            <div>
                <input type="number" class="form-control" name="star" access="false" min="0.5" max="5" step="0.5" id="star" required>
            </div>
            <button type="submit" class="btn-default btn" name="submit" access="false" style="default" id="submit">submit</button>

        </div>
    </div>
</form>
</body>
