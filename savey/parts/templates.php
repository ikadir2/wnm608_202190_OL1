<?php
function productlistTemplate($r,$o){
return $r.<<<HTML
<div class="col-xs-12 col-md-3">
	<div class="figure product">

		<div class="image-wrapper">
			<a href="product_item.php?id=$o->id">
				<img src="img/$o->thumbnail" alt="">
			</a>

			<form method="post" action="cart_actions.php?action=add-to-cart" class="add-circle-form">
				<input type="hidden" name="product-id" value="$o->id">
				<input type="hidden" name="product-amount" value="1">
				<button type="submit" class="add-circle">+</button>
			</form>
		</div>

		<figcaption>
			<div>&dollar;$o->price</div>
			<div>$o->name</div>
		</figcaption>

	</div>
</div>
HTML;
}

function selectAmount($amount=1,$total=10){
	$output = "<select name='amount'>";
	for($i=1;$i<=$total;$i++){
		$output .= "<option ".($i==$amount?"selected":"").">$i</option>";
	}
	$output .= "</select>";
	return $output;
}

function cartlistTemplate($r,$o){
$totalfixed = number_format($o->total,2,'.','');
$selectamount = selectAmount($o->amount,10);

return $r.<<<HTML
<div class="cart-page">
	<div class="cart-item display-flex" style="margin-top: 20px; color: #6D7473; align-items: center;">
		<div class="flex-none images-thumbs" style="display: flex; align-items: center;">
			<img src="img/$o->thumbnail">
		</div>
		<div class="flex-stretch">			
			<div class="display-flex" style="justify-content: space-between; align-items: baseline;">
				<strong style="line-height: 1;">$o->name</strong>
				<div style="padding-right: 15px;">&dollar;$totalfixed</div>
			</div>
			
			<div class="display-flex" style="justify-content: space-between; align-items: center; margin-top: 5px;">
				<form action="cart_actions.php?action=delete-cart-item" method="post" style="color:#FF7506; display: flex; align-items: center;">
					<input type="hidden" name="id" value="$o->id">
					<input type="submit" class="form-button inline" value="Delete" style="font-size: 0.8em">
				</form>
				<form action="cart_actions.php?action=update-cart-item" method="post" onchange="this.submit()" style="padding-right: 15px;">
					<input type="hidden" name="id" value="$o->id">
					<div class="cart form-select" style="font-size: 0.8em; color:">
						$selectamount
					</div>
				</form>
			</div>

		</div>
	</div>
</div>
HTML;
}

function cartlistTemplateReadOnly($r,$o){
$totalfixed = number_format($o->total,2,'.','');
return $r.<<<HTML
<div class="cart-page">
	<div class="cart-item display-flex" style="margin-top: 20px; color: #6D7473; align-items: center;">
		<div class="flex-none images-thumbs" style="display: flex; align-items: center; width: 50px; height: 50px; margin: 40px 40px 40px 35px">
			<img src="img/$o->thumbnail">
		</div>
		<div class="flex-stretch">			
			<div class="display-flex" style="justify-content: space-between; align-items: baseline;">
				<strong style="line-height: 1; padding-left: 15px">$o->name</strong>
				<div>&dollar;$totalfixed</div>
			</div>
			<div style="font-size: 0.8em; margin-top: 5px; padding-left: 15px">Qty: $o->amount</div>
		</div>
	</div>
</div>
HTML;
}

function cartTotals($has_items = true) {
    $cart = getCartItems();
    $cartprice = array_reduce($cart,function($r,$o){return $r + $o->total;},0);
    $pricefixed = number_format($cartprice,2,'.','');
    $taxfixed = number_format($cartprice*0.0725, 2, '.', '');
    $taxedfixed = number_format($cartprice*1.0725, 2, '.', '');
    $checkoutbtn = $has_items ? <<<HTML
    <div class="form-control checkout-button" style="padding-bottom: 20px; padding-top: 50px">
        <a href="checkout.php">
            <button type="button" class="button-dark form-button">Checkout</button>
        </a>
    </div>
    HTML : '';

    return <<<HTML
    <div class="card-section display-flex" style="margin-top: 20px;">
        <div class="flex-stretch"><strong>Subtotal</strong></div>
        <div class="flex-none">&dollar;$pricefixed</div>
    </div>
    <div class="card-section display-flex">
        <div class="flex-stretch"><strong>Taxes</strong></div>
        <div class="flex-none">&dollar;$taxfixed</div>
    </div>
    <div class="card-section display-flex">
        <div class="flex-stretch" Style="font-size: 18pt; color: #FF7506"><strong>Total</strong></div>
        <div class="flex-none" Style="font-size: 18pt; font-weight: 800; color: #FF7506">&dollar;$taxedfixed</div>
    </div>
    $checkoutbtn
HTML;
}

function recommendedProducts($a) {
$products = array_reduce($a,'productListTemplate');
echo <<<HTML
<div class="grid gap productlist">$products</div>
HTML;
}

function recommendedCategory($cat, $limit=4) {
    $result = makeQuery(
        makeConn(), 
        "
        SELECT *
        FROM `products`
        WHERE `category`='$cat'
        ORDER BY `date_create` DESC
        LIMIT $limit
        "
    );
    echo "<div class='productlist grid gap'>", array_reduce($result, 'productlistTemplate'), "</div>";
}

function recommendedSimilar($cat, $id=0, $limit=3) {
    $result = makeQuery(
        makeConn(), 
        "
        SELECT *
        FROM `products`
        WHERE `category`='$cat'
        AND `id`<>$id
        ORDER BY RAND ()
        LIMIT $limit
        "
    );
    echo "<div style='display: grid; grid-template-columns: repeat(3, 1fr); gap: 1em;' class='similar-grid'>", array_reduce($result, 'productlistTemplate'), "</div>";
}