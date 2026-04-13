<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Savey</title>

	<!-- META-->
	<?php include "parts/meta.php"; ?>
</head>
<body>
	<!-- NAVBAR -->
	<?php include "parts/navbar.php"; ?>

	<!-- CONTENT -->
	<div class="header">
		<div class="container" id="header">
			<h2>All Products</h2>

			<?php

			include_once "lib/php/functions.php";
			include_once "parts/templates.php";

			$result = makeQuery(
				makeConn(), 
				"
				SELECT *
				FROM `products`
				ORDER BY `price` ASC
				LIMIT 20
				"
			);

			echo "<div class='productlist grid gap'>", array_reduce($result, 'productlistTemplate'), "</div>";

			?>
		</div>
	</div>

	<br>
	<br>

	<!-- FOOTER -->
	<?php include "parts/footer.php"; ?>
</body>
</html>