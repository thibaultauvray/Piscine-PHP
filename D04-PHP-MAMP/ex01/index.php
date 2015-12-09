<?php
session_start(); 
if (isset($_GET["submit"]))
{
	if ($_GET["submit"] == "OK")
	{
	 	$_SESSION['login'] = $_GET['login'];
	 	$_SESSION['passwd'] = $_GET['passwd'];
	}
}
?> 
<html><body>
	<form method="get" action=".">  
		Identifiant<input type="text" name="login" value ="<?php if (isset($_SESSION["login"])){ echo $_SESSION["login"];} ?>" />
		<br>
		Mot de passe: <input type="password" name="passwd" value = "<?php if (isset($_SESSION["passwd"])){echo $_SESSION["passwd"];} ?>" />
		<input type="submit" name="submit" value="OK">
	</form>
</html></body>