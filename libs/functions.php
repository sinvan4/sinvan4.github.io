<?php
require "db.php";
function cleanInput ($input) {

	$search = array (
		'@<script[^>]*?>.*?</script>@si',
		'@<[\/\!]*?[^<>]*?>@si',
		'@style[^>]*?>.*?</style>@siU',
		'@<|[\s\S]*?--[ \t\n\r]*>@');

	$output = preg_replace($search, '', $input);
	return $output;
}

function sanitize ($input) {
	if (is_array($input))  {
		foreach ($input as $var => $val) {
			$output[$var] = sanitize($val);
			# code...
		}
	}
	else {
		if (get_magic_quotes_gpc()) {
			$input = stripcslashes($input);
		}
		$input = cleanInput($input);
		$output = mysql_real_escape_string($input);
	}
	return $output;
}

function  resetP(){
	
	
}


?>