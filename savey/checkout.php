<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Savey</title>

	<!-- META-->
	<?php include "parts/meta.php"; ?>
</head>
<body>

	<?php include "parts/navbar.php"; ?>

	<br>
	<div class="container">
		<div class="card soft">
			<h2>Checkout</h2>

			<form>
				<div class="form-control">
					<label class="form-label">Name</label>
					<input type="text" placeholder="Enter your name" class="form-input">
				</div>
			</form>

			<form>
				<div class="form-control">
					<label class="form-label">Address</label>
					<input type="text" placeholder="Enter your street address" class="form-input">
				</div>
			</form>

			<div class="grid gap">
				<div class="col-xs-12 col-md-4">
					<form>
						<div class="form-control">
							<label class="form-label">City</label>
							<input type="text" placeholder="Enter your city" class="form-input">
						</div>
					</form>
				</div>

				<div class="col-xs-12 col-md-4">
					<form>
						<div class="form-control">
							<label class="form-label">Zip code</label>
							<input type="text" placeholder="Enter your zip code" class="form-input">
						</div>
					</form>
				</div>

				<div class="col-xs-12 col-md-4">
					<form>
						<div class="form-control">
							<label class="form-label">Country</label>
							<input type="text" placeholder="Enter your street country" class="form-input">
						</div>
					</form>
				</div>
			</div>

			<form>
				<div class="form-control">
					<label class="form-label">Card number</label>
					<input type="text" placeholder="1234 5678 9101 2345" class="form-input">
				</div>
			</form>

			<div class="grid gap">
				<div class="col-xs-12 col-md-6">
					<form>
						<div class="form-control">
							<label class="form-label">Expiration date</label>
							<input type="date" placeholder="date" class="form-input">
						</div>
					</form>
				</div>

				<div class="col-xs-12 col-md-6">
					<form>
						<div class="form-control">
							<label class="form-label">CCV</label>
							<input type="text" placeholder="Enter your ccv number" class="expire-card form-input">
						</div>
					</form>
				</div>
			</div>

			<div class="col-xs-12 col-md-6">
				<div class="form-control">
					<a href="confirmation.php">
						<button type="button" class="button-dark form-button">Place order</button>
					</a>
				</div>
			</div>
		</div>
	</div>

	

	<!-- FOOTER -->
	<?php include "parts/footer.php"; ?>

</body>
</html>