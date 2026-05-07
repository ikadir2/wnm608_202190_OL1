<?php

include_once "lib/php/functions.php";

?>

<input type="checkbox" id="menu" class="hidden">
<header class="navbar sticky-nav">
	<div class="container display-flex">
		<div class="flex-none logo">
    		<a href="index.php">
        		<img src="img/savey-logo-navbar.png" alt="Savey Logo">
    		</a>
		</div>

		<div class="flex-stretch"></div>
		<div class="flex-none menu-button">
			<label for="menu">&equiv;</label>
		</div>
		<nav class="flex-none nav">
			<ul class="container display-flex">
				<?php $page = basename($_SERVER['PHP_SELF']); ?>
				<li class="<?= $page=='product_list.php' ? 'active' : '' ?>" style="padding: 0 1em"><a href="product_list.php">Shop</a></li>
				<li class="<?= $page=='cart.php' ? 'active' : '' ?>" style="padding: 0 1em"><a href="cart.php">
					<span>Cart</span>
					<span class="badge"><?= makeCartBadge(); ?></span>

					</a></li>
				<li class="<?= $page=='about.php' ? 'active' : '' ?>" style="padding: 0 1em"><a href="about.php">About</a></li>
				<li class="<?= $page=='faq.php' ? 'active' : '' ?>" style="padding: 0 1em"><a href="faq.php">FAQ</a></li>
			</ul>
		</nav>
	</div>
</header>