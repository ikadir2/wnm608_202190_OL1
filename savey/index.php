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
<body style="margin:0; padding:0;">

	<!-- CONTENT -->
	<div class="landing-page">
		<img src="img/hero.jpg" alt="Hero" class="hero">
		<div class="hero-content">
			<img src="img/savey_large.png" alt="Savey" class="landing-logo">
			<h5 style="color:#fff; font-size: 30px; margin: 0 0 2rem; font-weight: 300; letter-spacing: 1.2px;">
				Transforms discounted imperfect food <br> into trusted food rescue
			</h5>
			<a href="product_list.php" class="landing-button">Explore Products</a>
		</div>
	</div>

	<script>
		window.addEventListener('wheel', function(e) {
		    if (e.deltaY > 0) {
		        document.querySelector('.landing-page').classList.add('fade-out');
		        setTimeout(function() {
		            window.location.href = 'product_list.php';
		        }, 500);
		    }
		}, { once: true });

		document.querySelector('.landing-button').addEventListener('click', function(e) {
		    e.preventDefault();
		    document.querySelector('.landing-page').classList.add('fade-out');
		    setTimeout(function() {
		        window.location.href = 'product_list.php';
		    }, 500);
		});
	</script>
</body>
</html>