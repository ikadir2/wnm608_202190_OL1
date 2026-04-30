<?php

include_once "lib/php/functions.php";
include_once "parts/templates.php";

$product = makeQuery(makeConn(), "SELECT * FROM `products` WHERE `id` =".$_GET['id'])[0];

$cart_product = cartItemById($_GET['id']);

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
	
	<!-- NAVBAR-->
	<?php include "parts/navbar.php"; ?>

	<br>

	<!-- CONTENT -->
	<div class="page-cart-content">
		<div class="container" style="padding-top: 25px; margin-bottom: 30px;">
			<div class="align-items">
				<div class="card soft" style="padding-left: 30px; padding-right: 30px;">
					<h2 style="margin-top: 10px;"><?= $product->name ?> Added to Your Cart</h2>
					<p style="color: #7B8684; padding-bottom: 20px;">There are now <?= $cart_product->amount ?> of <?= $product->name ?> in your cart. You can continue shopping or proceed to checkout when you’re ready.</p>

					<div class="card flat" style="background-color: #FFF0E4; padding: 30px;">
						<div style="display: flex; justify-content: space-between; align-items: center; padding-bottom: 30px">
							<h5 style="font-weight: 600; color: #FF7506; margin: 0;">Trending snacks</h5>
						</div>

						<?php

						include_once "lib/php/functions.php";
						include_once "parts/templates.php";

						recommendedCategory("Snack");

						?>
					</div>

					<div class="form-control" style="padding-top: 50px; padding-bottom: 10px">
						<a href="cart.php">
							<button type="button" class="button-dark form-button">Review Cart</button>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- FOOTER -->
	<?php include "parts/footer.php"; ?>

</body>
</html>