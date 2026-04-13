<?php

function print_p($v){
	echo "<pre>", print_r($v),"</pre>";
}

include_once "auth.php";

function makeConn(){
	$conn = new mysqli(...MYSQLIAuth());
	if($conn->connect_errno) die($conn->connect_error);
	$conn->set_charset('utf8');
	return $conn;
}

function makeQuery($conn,$qry) {
	$result = $conn->query($qry);
	if($conn->errno) die($conn->error);
	$a = [];
	while($row = $result->fetch_object()) {
		$a[] = $row;
	}
	return $a;
}

?>