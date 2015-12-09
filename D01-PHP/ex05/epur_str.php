#!/usr/bin/php
<?php
if ($argc == 2)
{
	$eleme = trim($argv[1]);
	$tab = str_ireplace("  ", " ", $eleme);
	while (strstr($tab, "  "))
	{
		$tab = str_ireplace("  ", " ", $tab);
	}
	$my_tab = explode(" ", $tab);
	foreach ($my_tab as $elem) {
		echo $elem;
		if(end($my_tab) == $elem)
			echo"\n";
		else
		{
			echo " ";
		}
	}
}
?>