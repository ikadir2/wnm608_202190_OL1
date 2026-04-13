<?php

function productlistTemplate($r,$o){
return$r.<<<HTML
<a class="col-xs-12 col-md-3" href="product_item.php?id=$o->id">
	<figure class="figure product">
		<img src="img/$o->thumbnail" alt="">
		<figcaption>
			<div>&dollar;$o->price</div>
			<div>$o->name</div>
			<div class="tagmedium card">$o->expiry_date</div>
		</figcaption>
	</figure>
</a>
HTML;
}

function cartlistTemplate($r,$o){
return $r.<<<HTML
<div class="cart-item display-flex">
	<div class="flex-none images-thumbs">
		<img src="img/$o->thumbnail">
	</div>
	<div class="flex-stretch">
		<strong>$o->name</strong>
		<div style="color:#FF7506">Delete</div>
	</div>
	<div class="flex-none">
		&dollar;$o->price
	</div>
</div>
HTML;
}