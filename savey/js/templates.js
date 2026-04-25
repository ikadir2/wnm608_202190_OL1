const listItemTemplate = templater(o=>`
<div class="col-xs-12 col-md-3">
	<div class="figure product">

		<div class="image-wrapper">
			<a href="product_item.php?id=${o.id}">
				<img src="img/${o.thumbnail}" alt="">
			</a>

			<form method="post" action="cart_actions.php?action=add-to-cart" class="add-circle-form">
				<input type="hidden" name="product-id" value="${o.id}">
				<input type="hidden" name="product-amount" value="1">
				<button type="submit" class="add-circle">+</button>
			</form>
		</div>

		<figcaption>
			<div>&dollar;${o.price.toFixed(2)}</div>
			<div>${o.name}</div>
		</figcaption>

	</div>
</div>
`);