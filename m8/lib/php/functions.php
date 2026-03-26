<?php

function print_p($value) {
		echo "<pre>",print_r($value),"</pre>";
}


function file_get_json($filename) {
	$file = file_get_contents($filename);
	return json_decode($file);
}
