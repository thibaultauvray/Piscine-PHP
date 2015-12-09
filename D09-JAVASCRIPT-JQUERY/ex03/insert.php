<?php

	echo "$_GET[id]-$_GET[task]";
	$handle = fopen("list.csv", "a+");
	$tab = array($_GET['id'], $_GET['task']);
	fputcsv($handle, $tab, ";");
?>