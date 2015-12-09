#!/usr/bin/php
<?php
	$result = NULL;
	foreach ($argv as $elem) {
		if ($elem == $argv[0] || $elem == $argv[1])
		{

		}
		else
		{
			$val = explode(':', $elem);
			if ($val[0] == $argv[1])
				$result = $val[1];
		}
	}
	echo $result;
	if (is_null($result) == FALSE)
		echo "\n";
?>