<?php

include_once "lib/php/functions.php";
include_once "parts/templates.php";

resetCart();

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
		<div class="container" style="padding-top: 25px; margin-bottom: 40px;">
			<div class="align-items">
				<div class="card soft" style="padding-left: 30px; padding-right: 30px; padding-bottom: 40px">
					<h2 style="margin-top: 10px">Thank You For Shopping With Us</h2>

					<p style="color: #7B8684">Your order has been successfully placed and is now being processed, and a confirmation email with your order details and receipt has been sent to your inbox (please check your spam or promotions folder if you don’t see it).</p>

					<p style="color: #7B8684">We’re preparing your items for shipment and will notify you as soon as your order is on its way—if you have any questions or need assistance, feel free to contact our support team anytime.</p>

					<br>

					<div class="card flat" style="background-color: #FFF0E4; padding: 30px;">
						<div style="display: flex; justify-content: space-between; align-items: center; padding-bottom: 30px">
							<h5 style="font-weight: 600; color: #FF7506; margin: 0;">Trending Snacks</h5>

							<div class="form-control">
								<a href="product_list.php" style="text-decoration: none;">
									<div style="
										width: 32px;
										height: 32px;
										border: 1px solid #FF7506;
										border-radius: 50%;
										display: flex;
										align-items: center;
										justify-content: center;
										color: #FF7506;
										font-weight: bold;
										cursor: pointer;
									">
										&gt;
									</div>
								</a>
							</div>
						</div>

						<?php

						include_once "lib/php/functions.php";
						include_once "parts/templates.php";

						recommendedCategory("Snack");

						?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- FOOTER -->
	<?php include "parts/footer.php"; ?>

</body>
</html>