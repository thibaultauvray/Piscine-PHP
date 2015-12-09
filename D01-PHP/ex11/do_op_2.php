#!/usr/bin/php
<?php
if ($argc != 2)
{
	echo "Incorrect Parameters\n";
}
else
{
$op = explode(";", "+;-;*;/;%");
$test = sscanf($argv[1], "%d %c %d %s");
if ($test[0] && $test[1] && $test[2] && !$test[3])
{
	if($test[1] == '*')
		$result = $test[0] * $test[2];
	if($test[1] == '-')
		$result = $test[0] - $test[2];
	if($test[1] == '/')
		$result = $test[0] / $test[2];
	if($test[1] == '%')
		$result = $test[0] % $test[2];
	if($test[1] == '+')
		$result = $test[0] + $test[2];
	echo $result;
	echo "\n";
}
else
{
	echo "Syntax Error\n";
}
}
?>