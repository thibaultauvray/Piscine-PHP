#!/usr/bin/php
<?php
if ($argc > 1)
{
$regex = preg_replace('/[ \t]{2,}/', ' ', trim($argv[1]));
echo $regex;
echo "\n";
}
?>