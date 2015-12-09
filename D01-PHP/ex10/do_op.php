#!/usr/bin/php
<?php

if ($argc == 4)
{
	$op1 = trim($argv[1]);
	$operande = trim($argv[2]);
	$op2 = trim($argv[3]);

	if ($operande == "/")
		$result = $op1 / $op2;
	elseif ($operande == "*") {
		$result = $op1 * $op2;
	}
	elseif ($operande == '-') {
		$result = $op1 - $op2;
	}
	elseif ($operande == "%") {
		$result = $op1 % $op2;
	}
	elseif ($operande == '+') {
		$result = $op1 + $op2;
	}
	echo $result;
	echo "\n";
}
else
	echo "Incorrect Parameters\n";
?>