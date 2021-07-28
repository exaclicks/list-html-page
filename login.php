<!DOCTYPE html>
<html>
<body>


<form action=“/giris" method="post">
<div class="row">
<div class="left”>Ticari</div>
<div class="left"><input name=“giris" type="text" /></div>
</div>
<div class="row">
<div class="left">Password</div>
<div class="right"><input name="password" type="password" /></div>
</div>
<input name="viewId" type="hidden" value="/index.xhtml" />
<div class="row submitButton"><input type="submit" value="Login" />
<input id="bypassButton" type="hidden" value="Bypass Layer" /></div>
<div id="loginFailed" class="row error invisible">Benutzername oder Passwort falsch</div>
<div id="loginDeactivated" class="row error invisible">Benutzerkonto deaktiviert</div>
</form>
</body>
</html>