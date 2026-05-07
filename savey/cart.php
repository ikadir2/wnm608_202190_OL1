<?php

include_once "lib/php/functions.php";
include_once "parts/templates.php";

//$cart = makeQuery(makeConn(), "SELECT * FROM `products` WHERE `id` IN (4,7,10) ");

$cart_items = getCartItems();


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
	    <div class="container" style="padding-top: 25px; margin-bottom: 15px;">
	        <div class="grid gap" style="align-items: stretch;">
	            <div class="<?= empty($cart_items) ? 'col-xs-12' : 'col-xs-12 col-md-7' ?>" style="display: flex; flex-direction: column;">
	                <div class="card soft" style="flex: 1;">
	                    <?php if (!empty($cart_items)): ?>
	                        <h2 style="margin-top: 10px; padding-left: 15px;">My Cart</h2>
	                        <?= array_reduce($cart_items, 'cartlistTemplate') ?>
	                    <?php else: ?>
	                        <div class="cart-empty-state" style="text-align: center; padding: 60px 20px;">
	                            <div style="display: flex; justify-content: center; margin-bottom: 20px;">
	                                <img src="img/empty-cart.png" alt="Empty Cart" width="80" height="80" style="object-fit: contain;">
	                            </div>
	                            <h3 class="cart-empty-title">Your Cart is Empty</h3>
	                            <p class="cart-empty-sub">Looks like you haven't added anything yet.<br>Let's find something you need.</p>
	                            <a href="product_list.php" class="button-dark form-button" style="margin-top: 16px; display: inline-block; font-weight: 700; padding-left: 32px; padding-right: 32px; width: auto;">Browse Products</a>
	                        </div>
	                    <?php endif; ?>
	                </div>
	            </div>
	            <?php if (!empty($cart_items)): ?>
	                <div class="col-xs-12 col-md-5" style="display: flex; flex-direction: column; color: #6D7473;">
	                    <div class="card soft flat" style="flex: 1;">
	                        <?= cartTotals(true) ?>
	                    </div>
	                </div>
	            <?php endif; ?>
	        </div>
	    </div>
	</div>


	<div class="page-cart-content">
		<div class="container" style="padding-top: 15px; margin-bottom: 60px;">
			<div class="card soft" style="background-color: #FFF0E4; padding: 30px;">
				<div style="display: flex; justify-content: space-between; align-items: center; padding-bottom: 30px">
					<h5 style="font-weight: 600; color: #FF7506; margin: 0;">Trending for You</h5>
					<div class="form-control">
						<a href="product_list.php" style="text-decoration: none;">
							<div style="
								width: 32px;
								height: 32px;
								border: 2px solid #FF7506;
								border-radius: 50%;
								display: flex;
								align-items: center;
								justify-content: center;
								color: #FF7506;
									font-weight: 500;
								cursor: pointer;
								font-size: 30px;
							">
								&gt;
							</div>
						</a>
					</div>
				</div>
				<?php
				include_once "lib/php/functions.php";
				include_once "parts/templates.php";
				$result = makeQuery(
					makeConn(), 
					"
					SELECT *
					FROM `products`
					ORDER BY RAND()
					LIMIT 4
					"
				);

			echo "<div class='productlist grid gap'>", array_reduce($result, 'productlistTemplate'), "</div>";

			?>
			</div>
		</div>
	</div>

	<!-- FOOTER -->
	<?php include "parts/footer.php"; ?>
</body>
</html>