document.addEventListener("DOMContentLoaded", function () {
    document.addEventListener("click", function (e) {
        if (e.target.classList.contains("add-to-cart")) {
            let product = e.target.closest(".item");
            if (!product) {
                alert('Product container not found!');
                return;
            }
            let productName = product.querySelector(".product-name")?.innerText;
            let priceText = product.querySelector(".product-price")?.innerText;
            let image = product.querySelector("img")?.src;

            if (!productName || !priceText || !image) {
                alert('Missing product details.');
                return;
            }

            let price = priceText.replace(/Rs\.|,/g, "").trim();

            fetch('addToCartHandler.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    name: productName,
                    price: parseInt(price),
                    image: image
                })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert(productName + ' added to cart!');
                    } else {
                        alert('Failed to add product to cart.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error adding product to cart.');
                });
        }
    });
});
