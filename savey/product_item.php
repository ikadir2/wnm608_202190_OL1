<?php

include_once "lib/php/functions.php";
include_once "parts/templates.php";

$product = makeQuery(makeConn(), "SELECT * FROM `products` WHERE `id` =".$_GET['id'])[0];

$images = explode(",",$product->images);

$image_elements = array_reduce($images,function($r,$o){
	return $r."<img src='img/$o'>";
});

//print_p($_SESSION);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Savey</title>

	<!-- META-->
	<?php include "parts/meta.php"; ?>

	<!-- JAVASCRIPT -->
	<script src="js/product_thumbs.js"></script>
</head>
<body class="page-cart">

	<!-- NAVBAR -->
	<?php include "parts/navbar.php"; ?>

	<br>
	<br>

	<!-- CONTENT -->
	<div class="page-cart-content">
		<div class="container product-item" style="margin-bottom: 70px;">
			<div class="grid gap align-items">
				<div class="col-xs-12 col-md-6">
					<div class="card soft" style="height: 100%; align-content: center; padding-bottom: 10px;">
						<div class="images-main" style="margin:0">
							<img src="img/<?= $product->thumbnail ?>">
						</div>

						<br>

						<div class="images-thumbs">
							<?= $image_elements ?>
						</div>
					</div>
				</div>

				<div class="col-xs-12 col-md-6">
					<div class="checkout-card">	
						<form class="card soft flat product-card" method="post" action="cart_actions.php?action=add-to-cart" style="height: 100%; padding-bottom: 10px; padding-left: 30px; padding-right: 30px">
						  
						  <input type="hidden" name="product-id" value="<?= $product->id ?>">
						  
						  <div class="product-info">
						    <h2 class="product-name" style="margin-top: 10px;"><?= $product->name ?></h2>
						    <div style="font-weight: 600; font-size: 20pt; color: #FF7506; padding-bottom: 10px"><?= $product->price ?></div>
						    <p style="color: #7B8684; padding-bottom: 10px;"><?= $product->product_condition ?> Expiry date: <?= $product->expiry_date ?></p>
						    <p style="color: #7B8684; padding-bottom: 20px;"><?= $product->description ?></p>
						    <p style="color: #D0B7A9; font-size: 10pt;"><?= $product->ingredients ?></p>
						  </div>

						  <div class="product-actions">
						    <div class="form-select" style="margin-bottom: 20px;">
						      <select id="product-amount" name="product-amount">
						        <option>1</option>
						        <option>2</option>
						        <option>3</option>
						        <option>4</option>
						        <option>5</option>
						        <option>6</option>
						        <option>7</option>
						        <option>8</option>
						        <option>9</option>
						        <option>10</option>
						      </select>
						    </div>
						    <div class="card-section form-control checkout-button">
						      <input type="submit" class="button-dark form-button" value="Add To Cart" style="font-weight: 700">
						    </div>
						  </div>
						</form>
					</div>					
				</div>
			</div>

			<div class="card soft" style="padding:30px; margin-top: 30px;">
				<div class="card flat" style="background-color: #FFF0E4; padding: 30px;">
					<div style="display: flex; justify-content: space-between; align-items: center; padding-bottom: 30px">
						<h5 style="font-weight: 600; color: #FF7506; margin: 0;">Recommended products</h5>
					</div>
			
					<?php
						recommendedSimilar($product->category,$product->id);
					?>
				</div>
			</div>
		</div>
	</div>


	<!-- FOOTER -->
	<?php include "parts/footer.php"; ?>

</body>
</html>