<?php
if (isset($_GET["action"]) && isset($_GET["name"]))
{
	if ($_GET["action"] == "del")
		setcookie($_GET["name"], NULL, -1);
	elseif ($_GET["action"] == "set") {
		setcookie($_GET["name"], $_GET["value"], time() + (7 * 24 * 60 * 60));
	}
	elseif ($_GET["action"] == "get") {
		if (isset($_COOKIE[$_GET["name"]]))
			echo $_COOKIE[$_GET["name"]];
		if (isset($_COOKIE[$_GET["name"]]))
			echo "\n";
	}
}
?>
