<?php

include_once "lib/php/functions.php";
include_once "parts/templates.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Savey</title>

	<!-- META -->
	<?php include "parts/meta.php"; ?>

</head>
<body style="margin:0; padding:0;">

	<!-- NAVBAR-->
	<?php include "parts/navbar.php"; ?>

	<!-- CONTENT -->
	<div class="page-cart-content" style="background-color: #F9F5F2;">
	    <div class="container about-header" style="padding-top: 70px; padding-bottom: 70px;">
	        <div style="display: flex; align-items: center; gap: 60px; flex-wrap: wrap;">
	            <div style="flex: 1; min-width: 280px;">
	                <h1 style="color: #303937; margin-bottom: 20px;">Rethinking What "Good Food" Means</h1>
	                <p style="color: #6D7473; margin-bottom: 16px;">Every day, grocery stores discard perfectly edible food—not because it's unsafe, but because it's imperfect. A slightly bruised apple. Yogurt nearing its best-by date. Extra inventory that didn't sell in time.</p>
	                <p style="color: #6D7473;">At Savey, we see this differently. We see opportunity.</p>
	            </div>
	            <div style="flex: 1; min-width: 280px;">
	                <img src="img/about.jpg" alt="Good food reimagined" style="width: 100%; height: 380px; object-fit: cover; border-radius: 12px;">
	            </div>
	        </div>
	    </div>
	</div>

	<div class="page-cart-content">
	    <div class="container" style="padding-top: 70px; padding-bottom: 70px;">
	        <div style="display: flex; align-items: center; gap: 60px; flex-wrap: wrap;">
	            <div style="flex: 1; min-width: 280px;">
	                <img src="img/mission.jpg" alt="Our mission" style="width: 100%; height: 380px; object-fit: cover; border-radius: 12px;">
	            </div>
	            <div class="mission" style="flex: 1; min-width: 280px;">
	                <h1 style="color: #303937; margin-bottom: 20px;">Our Mission</h1>
	                <p style="color: #6D7473; margin-bottom: 16px;">Savey exists to make grocery shopping more affordable and more sustainable.</p>
	                <p style="color: #6D7473;">We connect people with high-quality food that would otherwise go to waste—offering it at lower prices while helping reduce unnecessary disposal. Because good food shouldn't be wasted, and saving money shouldn't mean compromising on quality.</p>
	            </div>
	        </div>
	    </div>
	</div>

	<div class="page-cart-content" style="background-color: #EEF8F7;">
		<div class="container" style="padding-top: 25px; padding-bottom: 50px">
			<div class="align-items">
				<div class="card flat" style="padding-left: 30px; padding-right: 30px; background-color: #EEF8F7;">
					<h1 style="display: flex; justify-content: center; margin-bottom: 50px; color: #008374;">Voices of Our Community</h1>					
					<div class="grid gap" style="justify-content: center; flex-wrap: wrap;">
						<div class="col-xs-12 col-md-4">
							<figure class="figure product" style="text-align: center; padding: 10px;">
							    <p style="font-size:16px; font-weight: 700; color: #FF7506">David • New York • 1 Day ago</p>
								<p style="color: #6D7473; padding: 0 15px 0 15px">So good! The family size lasagna is perfect. Even though the box was a little bent, the sticks inside were totally fine. Amazing deal for the price!</p>
							</figure>
						</div>
						<div class="col-xs-12 col-md-4">
							<figure class="figure product" style="text-align: center; padding: 10px;">
							    <p style="font-size:16px; font-weight: 700; color: #FF7506">Taylor • San Francisco • 1 Week ago</p>
								<p style="color: #6D7473; padding: 0 15px 0 15px">My new favorite Pocky! Sweet, tasty, and perfect for a quick treat. Earned points too, which is a bonus. Definitely grabbing more next time!</p>
							</figure>
						</div>
						<div class="col-xs-12 col-md-4">
							<figure class="figure product" style="text-align: center; padding: 10px;">
							    <p style="font-size:16px; font-weight: 700; color: #FF7506">Sheila • San Francisco • 4 days ago</p>
								<p style="color: #6D7473; padding: 0 15px 0 15px">Love this flavor from The Turtle Chips is lightcrispy, only $1.20! Savey has been save my budget but feels good in saving the earth!</p>
							</figure>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="page-cart-content" style="background-color: #008374; position: relative; overflow: hidden;">
	    <img src="img/closing.jpg" alt="" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;">
	    <div class="container" style="padding-top: 50px; padding-bottom: 50px; position: relative; z-index: 1;">
	        <div class="align-items">
	            <div class="card flat" style="padding-left: 30px; padding-right: 30px; background-color: transparent; text-align: center">
	                <h1 style="display: flex; justify-content: center; margin-bottom: 20px; color: #FFFDFB;">Join the Movement</h1>
	                <p style="display: flex; justify-content: center; color: #FFFDFB; margin-bottom: 50px">Shop with Savey and turn everyday groceries into a simple way to save and do good.</p>
	                <div style="display: flex; justify-content: center;">
	                    <a href="product_list.php" class="landing-button">Explore Products</a>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>

	<!-- FOOTER -->
	<?php include "parts/footer.php"; ?>
</body>
</html>