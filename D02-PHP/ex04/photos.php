#!/usr/bin/php
<?php
function getimg($url) {         
    $headers[] = 'Accept: image/gif, image/x-bitmap, image/jpeg, image/pjpeg';              
    $headers[] = 'Connection: Keep-Alive';         
    $headers[] = 'Content-type: application/x-www-form-urlencoded;charset=UTF-8';         
    $user_agent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)';         
    $process = curl_init($url);         
    curl_setopt($process, CURLOPT_HTTPHEADER, $headers);         
    curl_setopt($process, CURLOPT_HEADER, 0);         
    curl_setopt($process, CURLOPT_USERAGENT, $user_agent);         
    curl_setopt($process, CURLOPT_TIMEOUT, 30);         
    curl_setopt($process, CURLOPT_RETURNTRANSFER, 1);         
    curl_setopt($process, CURLOPT_FOLLOWLOCATION, 1);         
    $return = curl_exec($process);         
    curl_close($process);         
    return $return;     
} 


$c = curl_init($argv[1]);
$str = file_get_contents($argv[1]);
preg_match_all('/<img.{0,}src=["|\/|h][[:graph:]]+/', $str, $match);
$i = count($match[0]) ;
$f = 0;
while ($i != $f) {
	$val = substr(strstr($match[0][$f], "src="), 5);
	$vl = str_replace('"', '', $val);
	$vl = str_replace('>', '', $vl);
	if ($vl[0][0] == "/")
		$match[0][$f] = $argv[1] . $vl;
	else
		$match[0][$f] = $vl;
	$f++;
}
$val = $argv[1];
if (substr($argv[1], 0, 7) == "http://")
	$val = substr($argv[1], 7);
if (file_exists($val) == FALSE)
	mkdir($val, 0777, true);
foreach ($match[0] as $key) {
	$imgurl = $key;
	$imagename= basename($imgurl);
	if(file_exists('./$val/'.$imagename)){continue;} 
	$image = getimg($imgurl); 
	file_put_contents($val.'/'.$imagename,$image);


}



//echo $str;

?>