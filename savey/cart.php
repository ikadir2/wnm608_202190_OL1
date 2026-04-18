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
	            <div class="<?= empty($cart_items) ? 'col-xs-12' : 'col-xs-12 col-md-7' ?>">
	                <div class="card soft">
	                    <?php if (!empty($cart_items)): ?>
	                        <h2 style="margin-top: 10px; padding-left: 15px;">My Cart</h2>
	                        <?= array_reduce($cart_items, 'cartlistTemplate') ?>
	                    <?php else: ?>
	                        <div class="cart-empty-state" style="text-align: center; padding: 60px 20px;">
	                            <div style="display: flex; justify-content: center; margin-bottom: 20px;">
	                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.5" width="80" height="80">
	                                    <circle cx="26" cy="54" r="3"/>
	                                    <circle cx="46" cy="54" r="3"/>
	                                    <path d="M2 6h8l8 32h28l6-22H18"/>
	                                    <path d="M30 20 L38 28 M38 20 L30 28" stroke-linecap="round"/>
	                                </svg>
	                            </div>
	                            <h3 class="cart-empty-title">Your Cart is Empty</h3>
	                            <p class="cart-empty-sub">Looks like you haven’t added anything yet.<br>Let’s find something you need.</p>
	                            <a href="product_list.php" class="button-dark form-button" style="margin-top: 16px; display: inline-block; font-weight: 700; padding-left: 32px; padding-right: 32px; width: auto;">Browse Products</a>
	                        </div>
	                    <?php endif; ?>
	                </div>
	            </div>
	            <?php if (!empty($cart_items)): ?>
	                <div class="col-xs-12 col-md-5" style="color: #6D7473;">
	                    <div class="card soft flat">
	                        <?= cartTotals(true) ?>
	                    </div>
	                </div>
	            <?php endif; ?>
	        </div>
	    </div>
	</div>

	<!-- FOOTER -->
	<?php include "parts/footer.php"; ?>
</body>
</html>