<?php
	$var =$_GET;
	foreach ($var as $elem => $value) {
		echo $elem;
		echo " : ";
		echo $value;
		echo "\n";
	}
?>
