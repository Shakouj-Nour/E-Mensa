<html>
<head>
    <title>User Login</title>

</head>
<body>
<div>
    <form action="/anmeldung_verfizieren" method="post" id="frmLogin">
        <div class="demo-table">

            <div class="form-head">Login</div>
            <div class="field-column">
                <div>
                    <label for="username">Username</label><span id="user_info" class="error-info"></span>
                </div>
                <div>
                    <input name="b_email" id="user_name" type="text"
                           class="demo-input-box">
                </div>
            </div>
            <div class="field-column">
                <div>
                    <label for="password">Password</label><span id="password_info" class="error-info"></span>
                </div>
                <div>
                    <input name="b_passwort" id="b_passwort" type="password"
                           class="demo-input-box">
                    @if(!$check_password)
                        <span class="fehler">Ihre Passwort war falsch</span>
                    @endif
                </div>
            </div>
            <div class=field-column>
                <div>
                    <input type="submit" name="login" value="Login"
                           class="btnLogin"></span>
                </div>
            </div>
        </div>
    </form>
</div>
</body>
</html>