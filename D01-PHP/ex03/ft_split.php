#!/usr/bin/php
<?PHP
function ft_split($s1)
{
	$tab = explode(" ", $s1);
	if ($s1 != NULL)
		sort($tab);
	return($tab);
}
?>