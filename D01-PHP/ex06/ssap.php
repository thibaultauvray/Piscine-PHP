#!/usr/bin/php
<?php
function ft_split($s1)
{
	$tab = explode(" ", $s1);
	sort($tab);
	return($tab);
}

$e = array();
foreach ($argv as $arg) {
	if ($arg != $argv[0])
	{
		$tab = ft_split($arg);
		$e = array_merge($e, $tab);
	}
}
sort($e);
foreach ($e as $ele) {
	echo $ele;
	echo "\n";
}

?>