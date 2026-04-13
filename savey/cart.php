<?php

include_once "lib/php/functions.php";
include_once "parts/templates.php";

$cart = makeQuery(makeConn(), "SELECT * FROM `products` WHERE `id` IN (4,7,10) ");

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Savey</title>

	<!-- META-->
	<?php include "parts/meta.php"; ?>
</head>
<body>

	<!-- NAVBAR-->
	<?php include "parts/navbar.php"; ?>

	<br>

	<!-- CONTENT -->
	<div class="container">
		<h2>My Cart</h2>

		<div class="grid gap">
			<div class="col-xs-12 col-md-7">
				<div class="card soft" style="height: 100%; align-content: center;">
					<?= array_reduce($cart,'cartlistTemplate') ?>
				</div>
			</div>

			<div class="col-xs-12 col-md-5">
				<div class="card soft flat" style="height: 100%; align-content: center;">
					<div class="card-section display-flex">
						<div class="flex-stretch"><strong>Subtotal</strong></div>
						<div class="flex-none">&dollar;2.50</div>
					</div>

					<div class="display-flex">
						<div class="flex-stretch"><strong>Delivery Fee</strong></div>
						<div class="flex-none">&dollar;0.20</div>
					</div>

					<div class="display-flex">
						<div class="flex-stretch"><strong>Taxes</strong></div>
						<div class="flex-none">&dollar;0.50</div>
					</div>

					<div class="card-section display-flex">
						<div class="flex-stretch"><strong>Total</strong></div>
						<div class="flex-none">&dollar;3.20</div>
					</div>

					<br>
					<br>
					<br>
					
					<div class="form-control">
						<a href="checkout.php">
							<button type="button" class="button-dark form-button">Checkout Now</button>
						</a>
					</div>
					
					<div class="form-control">
						<a href="product_list.php">
							<button type="button" class="button-light form-button">Continue Shopping</button>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>


	<!-- FOOTER -->
	<?php include "parts/footer.php"; ?>
</body>
</html>