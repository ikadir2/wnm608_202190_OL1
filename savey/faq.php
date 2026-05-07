<?php

include_once "lib/php/functions.php";
include_once "parts/templates.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Savey - FAQ</title>

    <!-- META -->
    <?php include "parts/meta.php"; ?>

    <style>
	    .faq-item { border-bottom: 0.5px solid #E0DBD7; }
	    .faq-btn { width: 100%; background: none; border: none; cursor: pointer; display: flex; justify-content: space-between; align-items: center; padding: 20px 0; text-align: left; gap: 16px; }
	    .faq-btn:hover .faq-q { color: #008374; }
	    .faq-q { font-family: 'Poppins', sans-serif; font-size: 16px; font-weight: 500; color: #303937; transition: color 0.2s; }
	    .faq-icon { font-size: 20px; color: #008374; flex-shrink: 0; transition: transform 0.25s ease; }
	    .faq-body { overflow: hidden; max-height: 0; transition: max-height 0.3s ease; }
	    .faq-body p { font-family: 'Poppins', sans-serif; font-size: 15px; color: #6D7473; line-height: 1.7; margin: 0; padding-bottom: 20px; }
	    .faq-item.open .faq-icon { transform: rotate(180deg); }
	</style>

</head>
<body style="margin:0; padding:0; display:flex; flex-direction:column; min-height:100vh;">
	<!-- NAVBAR-->
    <?php include "parts/navbar.php"; ?>

    <!-- CONTENT -->
    <div class="page-cart-content" style="background-color: #F9F5F2; padding-bottom: 80px; flex:1;">
        <div class="container faq" style="padding-top: 40px; padding-bottom: 60px;">
            <h1 style="text-align: center; color: #303937; margin-bottom: 8px;">Frequently Asked Questions</h1>
            <p style="text-align: center; color: #6D7473; margin-bottom: 80px;">Everything you need to know about Savey.</p>

            <div id="faq-list"></div>
        </div>
    </div>

    <script>
    const faqs = [
        { q: "What products do you offer?", a: "We offer a wide range of groceries, including farm-fresh produce, pantry staples, animal and plant-based proteins, dairy and alternatives, beverages, snacks, and more. Many of our items are discounted because they are near expiry, surplus, or slightly imperfect—but still fresh and safe to enjoy." },
        { q: "Where do you deliver?", a: "Savey delivers to all states across the United States." },
        { q: "How does ordering work?", a: "Simply browse our website, add items to your cart, and check out like any online grocery store. Each product clearly shows why it's discounted, so you can shop with confidence while saving money and reducing waste." },
        { q: "How does delivery or shipping work?", a: "Once you place your order, we carefully pack your items and ship them to your address. Delivery times may vary depending on your location and the type of products ordered, but we always aim to get your groceries to you as quickly and safely as possible." },
        { q: "How do payments work?", a: "We accept major credit and debit cards for secure and easy checkout. All payments are processed safely through our trusted payment system." },
        { q: "How do I get delivery updates?", a: "You'll receive delivery updates by email, including order confirmation, shipping status, and arrival notifications so you always know where your groceries are." }
    ];

    const container = document.getElementById('faq-list');
    faqs.forEach((item, i) => {
        const div = document.createElement('div');
        div.className = 'faq-item';
        div.innerHTML = `
            <button class="faq-btn" aria-expanded="false">
                <span class="faq-q">${item.q}</span>
                <span class="faq-icon">&#8964;</span>
            </button>
            <div class="faq-body"><p>${item.a}</p></div>`;
        div.querySelector('button').addEventListener('click', () => {
            const isOpen = div.classList.contains('open');
            document.querySelectorAll('.faq-item.open').forEach(el => {
                el.classList.remove('open');
                el.querySelector('.faq-body').style.maxHeight = '0';
            });
            if (!isOpen) {
                div.classList.add('open');
                const body = div.querySelector('.faq-body');
                body.style.maxHeight = body.scrollHeight + 'px';
            }
        });
        container.appendChild(div);
    });
    </script>

    <!-- FOOTER -->
    <?php include "parts/footer.php"; ?>
</body>
</html>