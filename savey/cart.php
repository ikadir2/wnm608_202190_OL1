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
		<div class="container" style="padding-top: 25px; margin-bottom: 90px;">
			<div class="grid gap">
				<div class="col-xs-12 col-md-7">
				    <div class="card soft">
				        <?php if (!empty($cart_items)): ?>
				            <h2 style="margin-top: 10px; padding-left: 15px;">My Cart</h2>
				        <?php endif; ?>

				        <?php if (empty($cart_items)): ?>
				            <div class="cart-empty-state">
				                <div class="cart-empty-icon">
				                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.5">
				                        <circle cx="26" cy="54" r="3"/>
				                        <circle cx="46" cy="54" r="3"/>
				                        <path d="M2 6h8l8 32h28l6-22H18"/>
				                        <path d="M30 20 L38 28 M38 20 L30 28" stroke-linecap="round"/>
				                    </svg>
				                </div>
				                <h3 class="cart-empty-title">Your cart is empty</h3>
				                <p class="cart-empty-sub">Looks like you haven't added anything yet.<br>Start browsing to find something you'll love.</p>
				            </div>
				        <?php else: ?>
				            <?= array_reduce($cart_items, 'cartlistTemplate') ?>
				        <?php endif; ?>
				    </div>
				</div>

				<div class="col-xs-12 col-md-5" style="color: #6D7473;">
	    			<div class="card soft flat">
	        			<?= cartTotals(!empty($cart_items)) ?>
	    			</div>
				</div>
			</div>
		</div>
	</div>

	<!-- FOOTER -->
	<?php include "parts/footer.php"; ?>
</body>
</html>