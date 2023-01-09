<html>
<head>
    <title>Bewerten</title>
</head>
<body>
<form action="/bewerten" method="post" id="bewerten">
    <div>
        <div class="form-head">Bewertung</div>
        <div class="field-column">
            <div>
                <label for="gericht">Gericht</label>
            </div>
            <div>
                <select class="form-control" name="gericht" required="required" aria-required="true">//Optionen soll von gericht sein
                    @foreach($gerichte as $g)
                        <option value="{{$g["Name"]}}" selected="true" id="select-1673265972337-0">{{$g["Name"]}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="bemerkung">bemerkung</label>
            </div>
            <div>
                <textarea type="textarea" class="form-control" name="bemerkung" access="false" id="bemerkung" required></textarea>
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
