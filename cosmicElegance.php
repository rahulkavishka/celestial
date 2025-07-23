<?php
include 'db.php';

$productIDs = [2, 4, 5, 6];

$idList = implode(',', $productIDs);
$sql = "SELECT * FROM Products WHERE id IN ($idList)";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="Images/b.png" type="image/png">
    <title>Celestial - Cosmic Elegance</title>
    <link rel="stylesheet" href="browseStyle.css">
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
            <li><a class="active" href="cosmicElegance.php">Cosmic Elegance</a></li>
            <li><a href="browse.php">Browse</a></li>
        </ul>
        <ul class="nav-right">
            <li id="loginIcon"><a href="dashboard.php"><img src="Images/login icon.png" alt="Login"></a></li>
            <li id="cartIcon"><a href="cart.php"><img src="Images/cart icon.png" alt="Cart"></a></li>
        </ul>
    </nav>

    <div class="container_2">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "
             <div class='item'>
                <a href='product.php?id=" . $row['id'] . "' class='item-link'>
                    <img src='" . $row['image_url'] . "' alt='" . htmlspecialchars_decode($row['name']) . "'>
                </a>
                <div class='product-info'>
                <h4 class='product-name'>" . htmlspecialchars_decode($row['name']) . "</h4>
                <p class='product-price'>Rs. " . number_format($row['price']) . "</p>
                <button class='add-to-cart'>Add to Cart</button>
            </div>
        </div>";
            }
        } else {
            echo "<p>No products available</p>";
        }
        ?>
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

</body>

</html>