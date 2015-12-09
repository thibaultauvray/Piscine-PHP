#!/usr/bin/php
<?php

function ft_strtoupper_t($m)
{
	$t = strstr($m, ">", 1);
	$t = strtoupper($t);
	$t = $t . strstr($m, ">");
	return($t);
}

function ft_struper($m)
{
	$t = strstr($m, ">");
	$t = strtoupper($t);
	$e = strstr($m, ">", 1) . $t;
	return ($e);
}
function upper($match)
{
	return strtoupper($match[0]);
}

if ($argc > 1)
{
	$file = file_get_contents($argv[1]);
	$fd = explode('title', $file);
	$i = count($fd) - 1;
	$f = 0;
	while ($f <= $i) {
		if (preg_match("/\s{0,}=/", $fd[$f]) >= 1)
			{
				$fd[$f] = ft_strtoupper_t($fd[$f]);
			}
		$f++;
	}
	$test = implode('title', $fd);
	$te = explode('<', $test);
	$i = count($te);
	$f = 0;
	while ($f != $i) {
		if (strstr($te[$f], "href") != FALSE)
			$te[$f] = ft_struper($te[$f]);
		$f++;
	}
	$test = implode('<', $te);
	echo $test;
}
?>

