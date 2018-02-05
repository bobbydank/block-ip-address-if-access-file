<?php
//error_reporting(E_ALL);
$key = '# **access-flag - End script';
$newfile = 'filetemp.txt';
$date = date('Y-m-d H:i:s');

if (($handle = fopen('.htaccess', "r")) !== FALSE) {
	while (!feof ($handle)) {
		$buffer = fgets($handle, 4096);
		$lines[] = $buffer;
	}
	
	$f = fopen($newfile, "w") or die();

	foreach($lines as $line) {
		if (strpos($line, $key) !== false){ 
			$ip = getRealIpAddr();
			fwrite($f, "deny from ".$ip." # added ".$date."\n"); 
		} 
		fwrite($f, $line); 
	}
	
	fclose($f);
	copy($newfile, '.htaccess') or die();
}

function getRealIpAddr() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {  
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { 
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

?>
