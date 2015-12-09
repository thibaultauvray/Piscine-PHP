#!/usr/bin/php
<?php
while(1)
{
	echo "Entrez un nombre: ";
	$line = trim(fgets(STDIN));
	if (feof(STDIN) == TRUE)
		exit();
	if (!is_numeric($line))
	{
		echo  $line. ' n\'est pas un chiffre';
		echo "\n";
	}
	else
	{
		echo 'Le nombre '.$line.' est ';
		if (substr($line, -1) % 2 == 0)
		{
			echo  "Pair\n";
		}
		else
		{
			echo "Impair\n";
		}
	}
}
?>