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

	<script src="lib/js/functions.js"></script>
	<script src="js/templates.js"></script>
	<script src="js/product_list.js"></script>

</head>
<body class="page-cart">

	<!-- NAVBAR -->
	<?php include "parts/navbar.php"; ?>

	<!-- CONTENT -->
	<div class="page-cart-content">
	    <div class="header">
	        <div class="container" id="header">
	            <div class="align-items product-search">
	                <h1 style="color: #303937">All Products</h1>
	                <div class="form-control">
	                    <form class="hotdog light" id="product-search">
	                        <input type="search" placeholder="Search Products">
	                    </form>
	                </div>
	            </div>	            

	            <div class="form-control display-flex" style="flex-wrap: wrap">
	            	<div class="flex-stretch display-flex filter-row" style="flex-wrap: wrap">
			           	<div class="flex-none">
			           		<button data-filter="category" data-value="" type="button" class="form-button card soft flat" style="background-color: #FCFCFC; color: #FF7506; font-weight: 400; line-height: 1.2; border: 1px solid;">All</button>
			           	</div>
			           	<div class="flex-none">
			           		<button data-filter="category" data-value="dairy" type="button" class="form-button card soft flat" style="background-color: #FCFCFC; color: #FF7506; font-weight: 400; line-height: 1.2; border: 1px solid">Dairy</button>
			           	</div>
			           	<div class="flex-none">
			           		<button data-filter="category" data-value="pantry" type="button" class="form-button card soft flat" style="background-color: #FCFCFC; color: #FF7506; font-weight: 400; line-height: 1.2; border: 1px solid">Pantry</button>
			           	</div>
			           	<div class="flex-none">
			           		<button data-filter="category" data-value="frozen" type="button" class="form-button card soft flat" style="background-color: #FCFCFC; color: #FF7506; font-weight: 400; line-height: 1.2; border: 1px solid">Frozen</button>
			           	</div>
			           	<div class="flex-none">
			            		<button data-filter="category" data-value="snack" type="button" class="form-button card soft flat" style="background-color: #FCFCFC; color: #FF7506; font-weight: 400; line-height: 1.2; border: 1px solid">Snack</button>
			           	</div>
			           	<div class="flex-none">
			           		<button data-filter="category" data-value="drink" type="button" class="form-button card soft flat" style="background-color: #FCFCFC; color: #FF7506; font-weight: 400; line-height: 1.2; border: 1px solid">Drink</button>
			           	</div>
			        </div>

		           	<div class="flex-none">
			           	<div class="form-select filter-row">
							<select class="js-sort" style="background-color: #FCFCFC; color: #FF7506; border: 1px solid; padding-top: 10px; padding-bottom: 10px; line-height: 1.2; height: auto; border-radius: 8px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); padding-right: 3em;">
								<option value="" disabled selected>Sort by</option>
								<option value="0">All Products</option>
								<option value="1">Price High to Low</option>
								<option value="2">Price Low to High</option>
							</select>
						</div>
					</div>
	            </div>

	            <div class='productlist grid gap' style="margin-bottom: 90px"></div>
	        </div>
	    </div>
	</div>

	<!-- FOOTER -->
	<?php include "parts/footer.php"; ?>
</body>
</html>