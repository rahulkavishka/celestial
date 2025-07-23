<?php
session_start();

include 'db.php';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $query = "SELECT Address FROM users WHERE id = $user_id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $address = $user['Address'];
    }
} else {
    $address = 'Colombo, Sri Lanka';
}

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$totalPrice = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="Images/b.png" type="image/png">
    <title>Celestial - Cart</title>
    <link rel="stylesheet" href="cartStyle.css">
    <link rel="stylesheet" href="basicStyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <script src="cart.js"></script>
</head>

<body>
    <nav>
        <div>
            <a href="home.php">
                <img src="Images/BlLogo.png" href="home.php" alt="Logo">
            </a>
        </div>
        <ul class="nav-middle">
            <li><a href="rings.php">Rings</a></li>
            <li><a href="earings.php">Earrings</a></li>
            <li><a href="necklaces.php">Necklaces</a></li>
            <li><a href="cosmicElegance.php">Cosmic Elegance</a></li>
            <li><a href="browse.php">Browse</a></li>
        </ul>
        <ul class="nav-right">
            <li id="loginIcon"><a href="dashboard.php"><img src="Images/login icon.png" alt="Login"></a></li>
            <li id="cartIcon"><a href="cart.php"><img src="Images/cart icon.png" alt="Cart"></a></li>
        </ul>
    </nav>

    <h1>Your Cart</h1>

    <div class="cart-container">
        <div class="cart-content">
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($cart)): ?>
                        <?php foreach ($cart as $key => $item):
                            $subtotal = $item['price'] * $item['quantity'];
                            $totalPrice += $subtotal;
                        ?>
                            <tr>
                                <td class="product-info">
                                    <img src="<?= $item['image'] ?>" alt="<?= htmlspecialchars($item['name']) ?>">
                                    <span class="product-name"><?= htmlspecialchars($item['name']) ?></span>
                                </td>
                                <td>Rs. <?= number_format($item['price']) ?></td>
                                <td>
                                    <button class="qty-btn" onclick="updateQuantity(<?= $key ?>, 'decrease')"><b>-</b></button>
                                    <span class="quan"><?= $item['quantity'] ?></span>
                                    <button class="qty-btn" onclick="updateQuantity(<?= $key ?>, 'increase')"><b>+</b></button>
                                </td>
                                <td>Rs. <?= number_format($subtotal) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" style="text-align:center;">Your cart is empty</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <div class="cart-summary">
                <table style="text-align: center;">
                    <tr>
                        <td style="width: 110px;">
                            <p>Shipping to:</p>
                        </td>
                        <td>
                            <p><?php echo htmlspecialchars($address); ?></p>
                            <a href="dashboard.php"><u>Change Address</u></a>
                            <p style="text-align: center;">OR</p>
                            <button onclick="window.location.href='test_map.html';" class="address-btn">Pin Address on Map</button>
                        </td>
                    </tr>
                </table>
                <hr>
                <p class="total">Total: <span>Rs. <?= number_format($totalPrice) ?></span></p>
                <a href="https://www.boc.lk/"><button class="checkout-btn">Proceed to Checkout</button></a>
            </div>
        </div>
    </div>

    <footer>
        <div class="explore">
            <h3>Explore</h3>
            <p><a href="rings.php">Rings</a></p>
            <p><a href="earings.php">Earrings</a></p>
            <p><a href="necklaces.php">Necklaces</a></p>
        </div>
        <div class="collec">
            <h3>collections</h3>
            <p><a href="cosmicElegance.php">Cosmic Elegance</a></p>
        </div>
        <div class="cont">
            <h3>Customer Care</h3>
            <p><a href="security.php">Contact Us</a></p>
        </div>

        <div class="update">
            <h3>Stay Updated</h3>
            <h4>Subscribe to our newsletter for the latest updates and exclusive offers.</h4>
            <form action="" method="post" id="footerUpdate">
                <input type="email" id="updateEmail" placeholder="Enter your email" required>
                <button type="submit" id="updateButton">Subscribe</button>
            </form>
            <h5>By signing up you agree to our <a href="security.php"><u>Privacy policy</u></a> and <a
                    href="security.php"><u>Terms & conditions</u></a>.</h5>
        </div>
        <div class="rights">
            <table>
                <tr>
                    <td>
                        <img id="copyrightIcon" src="Images/copyrightIcon.png" alt="">
                    </td>
                    <td>
                        <p>2025 Celestial. All rights reserved.</p>
                    </td>
                </tr>
            </table>
        </div>
    </footer>

    <script>
        function updateQuantity(index, action) {
            fetch('updateCart.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        index: index,
                        action: action
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    } else {
                        alert('Error updating quantity.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error updating quantity.');
                });
        }
    </script>
</body>

</html>