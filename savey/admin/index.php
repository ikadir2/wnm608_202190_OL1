<?php

include "../lib/php/functions.php";

$empty_product = (object)[
	"name"=>"",
    "brand"=>"",
    "price"=>"",
    "category"=>"",
    "expiry_date"=>"",
    "description"=>"",
    "ingredients"=>"",
    "thumbnail"=>"",
    "images"=>"",
    "inventory_qty"=>""
];




// LOGIC
if(isset($_GET['action'])) {
    try {
        $conn = makePDOConn();
        switch($_GET['action']) {
            case "update":
                $statement = $conn->prepare("UPDATE
                    `products`
                    SET
                        `name`=?,
                        `price`=?,
                        `inventory_qty`=?,
                        `brand`=?,
                        `category`=?,
                        `expiry_date`=?,
                        `description`=?,
                        `ingredients`=?,
                        `thumbnail`=?,
                        `images`=?,
                        `date_modify`=NOW()
                    WHERE `id`=?
                    ");
                $statement->execute([
                    $_POST['product-name'],
                    $_POST['product-price'],
                    $_POST['product-inventory-qty'],
                    $_POST['product-brand'],
                    $_POST['product-category'],
                    $_POST['product-expiry-date'],
                    $_POST['product-description'],
                    $_POST['product-ingredients'],
                    $_POST['product-thumbnail'],
                    $_POST['product-images'],
                    $_GET['id']
                ]);
                header("location:{$_SERVER['PHP_SELF']}?id={$_GET['id']}");
                break;
            case "create":
            	$statement = $conn->prepare("INSERT INTO
                    `products`
                    (
                        `name`,
                        `price`,
                        `inventory_qty`,
                        `brand`,
                        `category`,
                        `expiry_date`,
                        `description`,
                        `ingredients`,
                        `thumbnail`,
                        `images`,
                        `date_create`,
                        `date_modify`
                    )
                    VALUES (?,?,?,?,?,?,?,?,?,?,NOW(),NOW())
                    ");
                $statement->execute([
                    $_POST['product-name'],
                    $_POST['product-price'],
                    $_POST['product-inventory-qty'],
                    $_POST['product-brand'],
                    $_POST['product-category'],
                    $_POST['product-expiry-date'],
                    $_POST['product-description'],
                    $_POST['product-ingredients'],
                    $_POST['product-thumbnail'],
                    $_POST['product-images']
                ]);
                $id = $conn->lastInsertId();
                header("location:{$_SERVER['PHP_SELF']}?id=$id");
                break;
            case "delete":
			    $statement = $conn->prepare("DELETE FROM `products` WHERE id=?");
			    $statement->execute([$_GET['id']]);
			    header("location:{$_SERVER['PHP_SELF']}");
			    break;
        }
    } catch(PDOException $e) {
        die($e->getMessage());
    }
}













// TEMTPLATES
function productListItem($r,$o) {
return $r.<<<HTML
<div class="card soft" style="margin-bottom: 20px; padding-top: 30px; padding-bottom: 30px">
	<div class="display-flex" style="align-items: center;">
		<div class="flex-none images-thumbs"><img src='../img/$o->thumbnail'></div>
		<div class="flex-stretch" style="padding: 1em">$o->name</div>
		<div class="flex-none" style="padding-right: 40px"><a href="{$_SERVER['PHP_SELF']}?id=$o->id" class="form-button" style="background-color:#D5F3EF; color: #008374; text-decoration: none; padding: 10px">Edit</a></div>
	</div>
</div>
HTML;
}



function showProductPage($o, $id) {

	$id =$_GET['id'];
    $addoredit = $id == "new" ? "Add" : "Edit";
    $createorupdate = $id == "new" ? "create" : "update";
    $images_str = $o->images;
    $images = array_reduce(explode(",", $o->images), function($r, $img){ return $r."<img src='../img/$img'>"; }, "");

    $display = <<<HTML
	<div>
	    <h3 style="margin-top:20px; margin-left: 20px; font-weight: 700;">$o->name</h3>
	    <div class="form-control" style="margin-right:20px; margin-left: 20px; margin-bottom: 20px">
	        <label class="form-label" style="color: #6D7473">Price</label>
	        <span>&dollar;$o->price</span>
	    </div>
	    <div class="form-control" style="margin-right:20px; margin-left: 20px; margin-bottom: 20px">
	        <label class="form-label" style="color: #6D7473">Inventory Qty</label>
	        <span>$o->inventory_qty</span>
	    </div>
	    <div class="form-control" style="margin-right:20px; margin-left: 20px; margin-bottom: 20px">
	        <label class="form-label" style="color: #6D7473">Brand</label>
	        <span>$o->brand</span>
	    </div>
	    <div class="form-control" style="margin-right:20px; margin-left: 20px; margin-bottom: 20px">
	        <label class="form-label" style="color: #6D7473">Category</label>
	        <span>$o->category</span>
	    </div>
	    <div class="form-control" style="margin-right:20px; margin-left: 20px; margin-bottom: 20px">
	        <label class="form-label" style="color: #6D7473">Expiry Date</label>
	        <span>$o->expiry_date</span>
	    </div>
	    <div class="form-control" style="margin-right:20px; margin-left: 20px; margin-bottom: 20px">
	        <label class="form-label" style="color: #6D7473">Description</label>
	        <span>$o->description</span>
	    </div>
	    <div class="form-control" style="margin-right:20px; margin-left: 20px; margin-bottom: 20px">
	        <label class="form-label" style="color: #6D7473">Ingredients</label>
	        <span>$o->ingredients</span>
	    </div>
	    <div class="form-control">
	        <label class="form-label" style="color: #6D7473; margin-right:20px; margin-left: 20px; margin-bottom: 10px">Thumbnail</label>
	        <span class="images-thumbs" style="display:block; text-align:left; margin-bottom: 20px"><img src='../img/$o->thumbnail'></span>
	    </div>
	    <div class="form-control">
	        <label class="form-label" style="color: #6D7473; margin-right:20px; margin-left: 20px; margin-bottom: 10px">Other Images</label>
	        <span class="images-thumbs" style="display:block; text-align:left; margin-bottom: 20px">$images</span>
	    </div>
	</div>
	HTML;

    $form = <<<HTML
	<form method="post" action="{$_SERVER['PHP_SELF']}?id=$id&action=$createorupdate">
	    <h3 style="margin-top:20px; margin-left: 20px; font-weight: 700;">$addoredit Product</h3>
	    <div class="form-control" style="margin-right:20px; margin-left: 20px; margin-bottom: 20px">
	        <label class="form-label" for="product-name" style="color: #6D7473">Name</label>
	        <input class="form-input" name="product-name" id="product-name" type="text" value="$o->name" placeholder="Enter the Product Name">
	    </div>
	    <div class="form-control" style="margin-right:20px; margin-left: 20px; margin-bottom: 20px">
	        <label class="form-label" for="product-price" style="color: #6D7473">Price</label>
	        <input class="form-input" name="product-price" id="product-price" type="Number" min="0" max="1000" step="0.01" value="$o->price" placeholder="Enter the Product Price">
	    </div>
	    <div class="form-control" style="margin-right:20px; margin-left: 20px; margin-bottom: 20px">
	        <label class="form-label" for="product-inventory-qty" style="color: #6D7473">Inventory Qty</label>
	        <input class="form-input" name="product-inventory-qty" id="product-inventory-qty" type="Number" min="0" max="1000" step="1" value="$o->inventory_qty" placeholder="Enter the Product Qty">
	    </div>
	    <div class="form-control" style="margin-right:20px; margin-left: 20px; margin-bottom: 20px">
	        <label class="form-label" for="product-brand" style="color: #6D7473">Brand</label>
	        <input class="form-input" name="product-brand" id="product-brand" type="text" value="$o->brand" placeholder="Enter the Product Brand">
	    </div>
	    <div class="form-control" style="margin-right:20px; margin-left: 20px; margin-bottom: 20px">
	        <label class="form-label" for="product-category" style="color: #6D7473">Category</label>
	        <input class="form-input" name="product-category" id="product-category" type="text" value="$o->category" placeholder="Enter the Product Category">
	    </div>
	    <div class="form-control" style="margin-right:20px; margin-left: 20px; margin-bottom: 20px">
	        <label class="form-label" for="product-expiry-date" style="color: #6D7473">Expiry Date</label>
	        <input class="form-input" name="product-expiry-date" id="product-expiry-date" type="text" value="$o->expiry_date" placeholder="Enter the Product Expiry Date">
	    </div>
	    <div class="form-control" style="margin-right:20px; margin-left: 20px; margin-bottom: 20px">
	        <label class="form-label" for="product-description" style="color: #6D7473">Description</label>
	        <textarea class="form-input" name="product-description" id="product-description" placeholder="Enter the Product Description">$o->description</textarea>
	    </div>
	    <div class="form-control" style="margin-right:20px; margin-left: 20px; margin-bottom: 20px">
	        <label class="form-label" for="product-ingredients" style="color: #6D7473">Ingredients</label>
	        <textarea class="form-input" name="product-ingredients" id="product-ingredients" placeholder="Enter the Product Ingredients">$o->ingredients</textarea>
	    </div>
	    <div class="form-control" style="margin-right:20px; margin-left: 20px; margin-bottom: 20px">
	        <label class="form-label" for="product-thumbnail" style="color: #6D7473">Thumbnail</label>
	        <input class="form-input" name="product-thumbnail" id="product-thumbnail" type="text" value="$o->thumbnail" placeholder="Enter the Product Thumbnail">
	    </div>
	    <div class="form-control" style="margin-right:20px; margin-left: 20px; margin-bottom: 20px">
	        <label class="form-label" for="product-images" style="color: #6D7473">Images</label>
	        <input class="form-input" name="product-images" id="product-images" type="text" value="$o->images" placeholder="Enter images, comma separated">
	    </div>
	    <div class="form-control" style="margin-right:20px; margin-left: 20px; padding-top: 40px; margin-bottom: 0; font-weight: 600;">
	        <input class="form-button" type="submit" value="Save Changes" style="background-color: #008374; color: #FFFDFB">
	    </div>
	</form>
	HTML;

    $output = $id == "new" ? "<div class='card soft' style='margin-bottom: 30px; padding-bottom: 40px'>$form</div>" :
        "<div class='grid gap'style='padding-bottom: 60px; align-items:stretch'>
            <div class='col-xs-12 col-md-6'><div class='card soft' style='height:100%'>$display</div></div>
            <div class='col-xs-12 col-md-6'><div class='card soft' style='height:100%'>$form</div></div>
        </div>";

    $delete = $id == "new" ? "" : "<a class='form-button' href='{$_SERVER['PHP_SELF']}?id=$id&action=delete' style='background-color:#FFE5E5; color: #D00000; text-decoration: none; padding: 10px'>Delete</a>";

   echo "
	    <nav class='display-flex' style='padding-top: 30px; padding-bottom: 30px'>
	        <div class='flex-none'><a class='form-button' href='{$_SERVER['PHP_SELF']}' style='background-color:#D5F3EF; color: #008374; text-decoration: none; padding: 10px'>Back</a></div>
	        <div class='flex-stretch'></div>
	        <div class='flex-none' style='padding-right: 30px'>$delete</div>
	    </nav>
	    $output
	";
}





?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Product Admin Page</title>
	
	<!-- META-->
	<?php include "../parts/meta.php"; ?>

</head>
<body>

	<header class="navbar sticky-nav">
		<div class="container display-flex">
			<div class="flex-none logo">
	    		<a href="index.php">
	        		<img src="../img/savey-logo-navbar.png" alt="Savey Logo" style="padding-right: 20px;">
	    		</a>
			</div>

			<div class="flex-stretch"></div>
			<nav class="flex-none nav">
				<ul class="container display-flex">
					<li style="padding-right: 15px;"><a href="<?= $_SERVER['PHP_SELF'] ?>">Product List</a></li>
					<li style="padding-left: 15px;"><a href="<?= $_SERVER['PHP_SELF'] ?>?id=new">Add New Product</a></li>
				</ul>
			</nav>
		</div>
	</header>

	<div class="page-cart-content">
		<div class="container">
			<div class="align-items">
				<?php

				if(isset($_GET['id'])) {
					showProductPage(
		    			$_GET['id'] == "new" ? $empty_product : makeQuery(makeConn(), "SELECT * FROM `products` WHERE `id`=" . $_GET['id'])[0],
		    			$_GET['id']
					);

				} else {

					?>
					<h2>Product List</h2>

					<?php

					$result = makeQuery(makeConn(),"SELECT * FROM `products` ORDER BY `date_create` DESC");

					echo array_reduce($result,'productListItem');

					?>

				<?php } ?>
			</div>				
		</div>
	</div>



	<!-- FOOTER -->
	<?php include "../parts/footer.php"; ?>

</body>
</html>