<?php
	$array = array();
	$lines = file('list.csv');
	foreach ($lines as $lineNumber => $lineContent)
	{
		array_push($array, $lineContent);
	}
	echo json_encode($array);
?>