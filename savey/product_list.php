<?php

	include_once "lib/php/functions.php";
	include_once "parts/templates.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Savey</title>

	<!-- META-->
	<?php include "parts/meta.php"; ?>
</head>
<body class="page-cart">
	<!-- NAVBAR -->
	<?php include "parts/navbar.php"; ?>

	<!-- CONTENT -->
	<div class="page-cart-content">
		<div class="header">
			<div class="container align-items" id="header">
				<h2>All Products</h2>

				<?php

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
	</div>

	<br>

	<!-- FOOTER -->
	<?php include "parts/footer.php"; ?>
</body>
</html>