<?php
$dir_base =  str_replace('apis', '', __DIR__);
require $dir_base . 'vendor/autoload.php';
use GeoIp2\Database\Reader;

function get_location($ip) {	
	try {
		$reader = new Reader($dir_base .'GeoLite2-Country.mmdb');
		return $reader->city($ip);
	} catch(Exception $e) {
		return $e;
	}
}


