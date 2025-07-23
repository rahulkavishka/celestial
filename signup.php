<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="Images/b.png" type="image/png">
    <title>Celestial - Sign up</title>
    <link rel="stylesheet" href="loginStyle.css">
    <link rel="stylesheet" href="basicStyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
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

    <div class="container">
        <div class="image-section">
            <img src="Images/Products/loginImg2.jpg" alt="Ring Image">
        </div>
        <div class="login-section">
            <h1>WELCOME</h1>
            <form action="signupHandler.php" method="POST">
                <label>First Name</label>
                <input type="text" name="first_name" placeholder="Enter your first name" required>

                <label>Last Name</label>
                <input type="text" name="last_name" placeholder="Enter your last name" required>

                <label>Email</label>
                <input type="email" name="email" placeholder="Enter your email" required>

                <label>Phone Number</label>
                <input type="phone" name="PhoneNumber" placeholder="Enter your phone number" required>

                <label>Address</label>
                <input type="text" name="Address" placeholder="Enter your address" required>

                <label>Password</label>
                <div class="password-container">
                    <input type="password" name="password" placeholder="Enter your password" required>
                    <span class="toggle-password"></span>
                </div>

                <label>Confirm Password</label>
                <div class="password-container">
                    <input type="password" name="confirm_password" placeholder="Re-Enter your password" required>
                    <span class="toggle-password"></span>
                </div>

                <button type="submit" class="login-btn">Sign up</button>

                <p><a href="login.php">Go Back</a></p>
            </form>
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


</body>

</html>