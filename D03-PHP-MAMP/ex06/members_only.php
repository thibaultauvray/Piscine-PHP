<?php

if (!isset($_SERVER['PHP_AUTH_USER']))
{
    header("WWW-Authenticate: Basic realm=''Espace membres'");
    header('HTTP/1.0 401 Unauthorized');
}
else{
	if ($_SERVER['PHP_AUTH_USER'] == "zaz" && $_SERVER['PHP_AUTH_PW'] == "jaimelespetitsponeys")
	{
		?>
<html><body>
Bonjour Zaz<br />
<?php
echo "<img src='data:image/png;base64,";
$file = base64_encode(file_get_contents("../img/42.png"));
echo $file;
echo "'";
?>
>
</body></html>
<?php
	}
	else
	{
		header("WWW-Authenticate: Basic realm=''Espace membres''");
	    header('HTTP/1.0 401 Unauthorized');
?>
<html><body>Cette zone est accessible uniquement aux membres du site</body></html>
<?php
}
}
?>