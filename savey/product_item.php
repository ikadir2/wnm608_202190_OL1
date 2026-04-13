<?php

include_once "lib/php/functions.php";

$product = makeQuery(makeConn(), "SELECT * FROM `products` WHERE `id` =".$_GET['id'])[0];

$images = explode(",",$product->images);

$image_elements = array_reduce($images,function($r,$o){
	return $r."<img src='img/$o'>";
});

// print_p($product);

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
<body>

	<!-- NAVBAR -->
	<?php include "parts/navbar.php"; ?>

	<br>
	<br>

	<!-- CONTENT -->
	<div class="container">
		<div class="grid gap align-items-stretch">
			<div class="col-xs-12 col-md-6">
				<div class="card soft" style="height: 100%; align-content: center;">
					<div class="images-main">
						<img src="img/<?= $product->thumbnail ?>">
					</div>
					<br>
					<div class="images-thumbs">
						<?= $image_elements ?>
					</div>
				</div>
			</div>

			<div class="col-xs-12 col-md-6">
				<div class="card soft flat" style="height: 100%; align-content: center;">
					<div>
						<h2 class="product-name"><?= $product->name ?></h2>
						<div style ="font-weight: 600; font-size: 20pt; color: #FF7506" class="product-price">&dollar;<?= $product->price ?></div>

						<br>

						<p style="color: #7B8684"><?= $product->product_condition ?></p>
						<p style="color: #7B8684"><?= $product->description ?></p>

						<p style="color: #D0B7A9; font-size: 10pt"><?= $product->ingredients ?></p>
					</div>

					<br>

					<div>
						<label for="product-amount" class="form-label"></label>
						<div class="form-select" id="product-amount">
							<select>
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
						</div>
					</div>

					<div class="card-section form-control">
						<a href="cart.php?id=<?= $product->id ?>">
							<button type="button" class="button-dark form-button">Add to cart</button>
						</a>
					</div>
				</div>					
			</div>
		</div>
	</div>

	<br>
	<br>
	<br>


	<!-- FOOTER -->
	<?php include "parts/footer.php"; ?>

</body>
</html>