<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php 
	echo "<div> Hello World </div>";
	echo "<div> Goodbye World </div>";



	// VARIABLE
	$a = 5;

	echo $a;



	// String Interpolation
	echo "<div> I have $a things </div>";
	echo '<div> I have $a things </div>';



	// NUMBER
	// INTEGER
	$b = 15;

	// Float
	$b = 0.576;

	$b = 10;

	// STRING
	$name = "Yerguy2";

	// Boolean
	$isOn = true;



	// MATH
	// PEMDAS
	echo (5 - 4) * 2;

	// CONCATENATION
	echo "<div> b + a" . " = c </div>";
	echo "<div> $b + $a = ".($a + $b)." </div>";
	?>

	<br>
	<hr>
	<br>

	<div> Test </div>
	<div> This is my name </div>
	<?php

	$firstname = "Hamilton";
	$lastname = "Cline";
	$fullname = "$firstname $lastname";

	echo $fullname;

	?>



	<br>
	<hr>
	<br>



	<?php
	// SUPERGLOBAL
	// ?name=Joey
	echo "<a href='?name=Joey'>visit</a><br>";
	echo "<div> My name is {$_GET['name']}</div>";

	// ?name=Joey&type=textarea
	echo "<a href='?name=Joey&type=textarea'>visit</a><br>";
	echo "<{$_GET['type']}> My name is {$_GET['name']}</{$_GET['type']}>";

	?>



	<br>
	<hr>
	<br>


	<?php
	// ARAY
	$colors = array("red","green","blue");

	echo $colors[2];

	echo "
		<br>$colors[0]
		<br>$colors[1]
		<br>$colors[2]
	";

	echo count($colors);

	?>

	<div style="color:<?= $colors[1] ?>">
		This text is green
	</div>



	<br>
	<hr>
	<br>



	<?php
	// ASSOCIATIVE ARAY
	$colorsAssociative = [
		"red" => "#f00",
		"green" => "#0F0",
		"blue" => "#00F"
	];

	echo $colorsAssociative['green'];
	?>



	<br>
	<hr>
	<br>



	<?php
	// CASTING
	$c = "$a";
	$d = $c*1;

	$colorsObject = (object)$colorsAssociative;

	// echo $colorsObject;

	echo "<hr>";

	// ARAY INDEX NOTATION
	echo $colors[0]."<br>";
	echo $colorsAssociative['red']."<br>";
	echo $colorsAssociative[$colors[0]]."<br>";

	//OBJECT PROPERTY NOTATION
	echo $colorsObject->red."<br>";
	echo $colorsObject->{$colors[0]}."<br>";
	?>



	<br>
	<hr>
	<br>



	<?php
	// PRINT OUT
	print_r($colors);
	echo "<hr>";
	print_r($colorsAssociative);
	echo "<hr>";
	echo "<pre>",print_r($colorsObject),"</pre>";

	// FUNCTION
	function print_p($value) {
		echo "<pre>",print_r($value),"</pre>";
	}

	print_p($_GET);

	?>



</body>
</html>