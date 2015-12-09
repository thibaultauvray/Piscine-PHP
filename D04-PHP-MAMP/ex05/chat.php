<?php
date_default_timezone_set('Europe/Paris');
	if (file_exists("../private/chat") == TRUE)
	{
		$test = unserialize(file_get_contents("../private/chat"));
		foreach ($test as $value) 
		{
			echo "[";
			echo date("H:i", $value['time']);
			echo "] ";
			echo "<b>";
			echo $value['login'];
			echo "</b>: ";
			echo $value['msg'];
			echo "<br />";
		}
	}
?>