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
<body style="margin:0; padding:0; display:flex; flex-direction:column; min-height:100vh;">

    <!-- NAVBAR-->
    <?php include "parts/navbar.php"; ?>

    <!-- HERO -->
    <div class="landing-page">
        <img src="img/hero.jpg" alt="Hero" class="hero">
        <div class="hero-content">
            <h1 class="hero-title" style="color:#fff;">
                Save Good Food.<br>Save Money.
            </h1>
            <a href="product_list.php" class="landing-button">Explore Products</a>
        </div>
    </div>

    <!-- SMALL ACTIONS -->
    <div class="page-cart-content onboarding" style="margin-bottom: 120px;">
	    <h1 style="display: flex; justify-content: center; margin-top: -150px; margin-bottom: 50px; color: #008374; text-align: center;">Small Actions, Big Impact</h1>
	    <div class="grid gap" style="display: flex; justify-content: center; flex-wrap: wrap;">
	        <div class="col-xs-12 col-md-3" style="display: flex; justify-content: center;">
	            <figure class="figure product impact-figure">
	                <div class="image-wrapper">
	                    <img src="img/ob1.jpg" alt="">
	                </div>
	                <h1 style="font-size:20px; color: #FF7506;">Save Money. Save Food.</h1>
	                <p style="color: #6D7473; padding: 0 15px;">Rescue good food with minor flaws or near expiry. Save money & cut waste.</p>
	            </figure>
	        </div>
	        <div class="col-xs-12 col-md-3" style="display: flex; justify-content: center;">
	            <figure class="figure product impact-figure">
	                <div class="image-wrapper">
	                    <img src="img/ob2.jpg" alt="">
	                </div>
	                <h1 style="font-size:20px; color: #FF7506;">Freshness Guaranteed</h1>
	                <p style="color: #6D7473; padding: 0 15px;">We partner with stores to rescue fresh, safe food from waste daily.</p>
	            </figure>
	        </div>
	        <div class="col-xs-12 col-md-3" style="display: flex; justify-content: center;">
	            <figure class="figure product impact-figure">
	                <div class="image-wrapper">
	                    <img src="img/ob3.jpg" alt="">
	                </div>
	                <h1 style="font-size:20px; color: #FF7506;">Earn and Redeem</h1>
	                <p style="color: #6D7473; padding: 0 15px;">Earn points with every rescue and redeem them for rewards.</p>
	            </figure>
	        </div>
	    </div>
	</div>

    <!-- HOW IT WORKS -->
    <div class="page-cart-content" style="background-color: #F9F5F2; padding-top: 50px; padding-bottom: 80px;">
        <h1 style="display: flex; justify-content: center; margin-bottom: 50px; color: #008374;">How It Works</h1>
        <div class="how-it-works-grid">
            <div class="how-it-works-item">
                <div style="width: 64px; height: 64px; border-radius: 50%; background-color: #FCFCFC; display: flex; align-items: center; justify-content: center; margin: 0 auto 30px auto; font-size: 24px; font-weight: 700; color: #FF7506;">1</div>
                <h3 style="font-size: 18px; color: #008374; margin-bottom: 12px;">Browse & Pick</h3>
                <p style="color: #6D7473; line-height: 1.6;">Browse your items, check the best price and expiry date.</p>
            </div>
            <div class="how-it-works-item">
                <div style="width: 64px; height: 64px; border-radius: 50%; background-color: #FCFCFC; display: flex; align-items: center; justify-content: center; margin: 0 auto 30px auto; font-size: 24px; font-weight: 700; color: #FF7506;">2</div>
                <h3 style="font-size: 18px; color: #008374; margin-bottom: 12px;">Check Out & Rescue</h3>
                <p style="color: #6D7473; line-height: 1.6;">Check out and rescue your food from going to waste.</p>
            </div>
            <div class="how-it-works-item">
                <div style="width: 64px; height: 64px; border-radius: 50%; background-color: #FCFCFC; display: flex; align-items: center; justify-content: center; margin: 0 auto 30px auto; font-size: 24px; font-weight: 700; color: #FF7506;">3</div>
                <h3 style="font-size: 18px; color: #008374; margin-bottom: 12px;">Earn Your Points</h3>
                <p style="color: #6D7473; line-height: 1.6;">Your points are automatically added to your account with every rescue.</p>
            </div>
        </div>
    </div>

    <!-- VIEW WINDOW -->
    <div class="view-window" style="background-image: url(img/viewpoint.jpg)"></div>

    <!-- TRENDING SNACKS -->
    <div class="page-cart-content" style="margin-top: 100px;">
        <div class="container">
            <div class="align-items">
                <div style="display: flex; justify-content: space-between; align-items: center; padding-bottom: 30px;">
                    <h2 class="header-section-home" style="font-weight: 600; color: #FF7506; margin: 0;">Trending Snacks</h2>
                </div>
                <?php recommendedCategory("Snack"); ?>
            </div>
        </div>
    </div>

    <!-- POPULAR ITEMS -->
    <div class="page-cart-content" style="margin-top: 80px; margin-bottom: 80px;">
        <div class="container">
            <div class="align-items">
                <div style="display: flex; justify-content: space-between; align-items: center; padding-bottom: 30px;">
                    <h2 class="header-section-home" style="font-weight: 600; color: #FF7506; margin: 0;">Popular Items</h2>
                </div>
                <?php recommendedCategory("Pantry"); ?>
            </div>
        </div>
    </div>

    <!-- TESTIMONIALS -->
    <div class="page-cart-content" style="background-color: #F9F5F2;">
        <div class="container" style="padding-top: 25px; padding-bottom: 50px;">
            <div class="align-items">
                <div class="card flat" style="padding-left: 30px; padding-right: 30px; background-color: #F9F5F2; text-align: center;">
                    <h1 style="display: flex; justify-content: center; margin-bottom: 50px; color: #008374;">Voices of Our Community</h1>
                    <div class="grid gap" style="justify-content: center; flex-wrap: wrap;">
                        <div class="col-xs-12 col-md-4">
                            <figure class="figure product" style="text-align: center; padding: 10px;">
                                <p style="font-size:16px; font-weight: 700; color: #FF7506;">David • New York • 1 Day ago</p>
                                <p style="color: #6D7473; padding: 0 15px;">So good! The family size lasagna is perfect. Even though the box was a little bent, the sticks inside were totally fine. Amazing deal for the price!</p>
                            </figure>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <figure class="figure product" style="text-align: center; padding: 10px;">
                                <p style="font-size:16px; font-weight: 700; color: #FF7506;">Taylor • San Francisco • 1 Week ago</p>
                                <p style="color: #6D7473; padding: 0 15px;">My new favorite Pocky! Sweet, tasty, and perfect for a quick treat. Earned points too, which is a bonus. Definitely grabbing more next time!</p>
                            </figure>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <figure class="figure product" style="text-align: center; padding: 10px;">
                                <p style="font-size:16px; font-weight: 700; color: #FF7506;">Sheila • San Francisco • 4 days ago</p>
                                <p style="color: #6D7473; padding: 0 15px;">Love this flavor from The Turtle Chips is light crispy, only $1.20! Savey has been save my budget but feels good in saving the earth!</p>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CLOSING CTA -->
    <div class="page-cart-content" style="background-color: #008374; position: relative; overflow: hidden; min-height: 400px;">
        <img src="img/closing.jpg" alt="" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;">
        <div class="container" style="padding-top: 50px; padding-bottom: 50px; position: relative; z-index: 1;">
            <div class="align-items">
                <div class="card flat" style="padding-left: 30px; padding-right: 30px; background-color: transparent; text-align: center;">
                    <h1 style="display: flex; justify-content: center; margin-bottom: 50px; color: #FFFDFB;">Rescue More and Waste Less</h1>
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