<?php
session_start();
include 'db.php';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $query = "SELECT first_name, last_name, email, PhoneNumber, Address FROM users WHERE id = $user_id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $first_name = $user['first_name'];
        $last_name = $user['last_name'];
        $email = $user['email'];
        $phone_number = $user['PhoneNumber'];
        $address = $user['Address'];
    } else {
        header("Location: login.php");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="Images/b.png" type="image/png">
    <title>Celestial - Dashboard</title>
    <link rel="stylesheet" href="loginStyle.css">
    <link rel="stylesheet" href="basicStyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <script>
        function toggleEdit() {
            const viewMode = document.getElementById('viewMode');
            const editMode = document.getElementById('editMode');
            if (editMode.style.display === "none") {
                viewMode.style.display = "none";
                editMode.style.display = "block";
            } else {
                viewMode.style.display = "block";
                editMode.style.display = "none";
            }
        }
    </script>

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
            <img src="Images/Products/loginRight.jpg" alt="Ring Image">
        </div>
        <div class="login-section">
            <h1>Hi, <?php echo htmlspecialchars($first_name); ?>!</h1>

            <div class="user-details" id="viewMode">
                <p><strong>First Name:</strong> <?php echo htmlspecialchars($first_name); ?></p>
                <p><strong>Last Name:</strong> <?php echo htmlspecialchars($last_name); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
                <p><strong>Phone Number:</strong> <?php echo htmlspecialchars($phone_number); ?></p>
                <p><strong>Address:</strong> <?php echo htmlspecialchars($address); ?></p>

                <button class="edit-profile-btn" onclick="toggleEdit()">Edit Profile</button>
            </div>

            <div class="user-edit-form" id="editMode" style="display: none;">
                <form action="updateProfileHandler.php" method="POST">
                    <label>First Name:</label>
                    <input type="text" name="first_name" value="<?php echo htmlspecialchars($first_name); ?>" required><br>

                    <label>Last Name:</label>
                    <input type="text" name="last_name" value="<?php echo htmlspecialchars($last_name); ?>" required><br>

                    <label>Email:</label>
                    <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required><br>

                    <label>Phone:</label>
                    <input type="phone" name="PhoneNumber" value="<?php echo htmlspecialchars($phone_number); ?>"><br>

                    <label>Address:</label>
                    <input type="text" name="Address" value="<?php echo htmlspecialchars($address); ?>"><br>

                    <button type="submit" class="save-btn">Save Changes</button>
                    <button type="button" class="cancel-btn" onclick="toggleEdit()">Cancel</button>
                </form>
            </div>

            <form action="logoutHandler.php" method="POST">
                <button type="submit" class="logout-btn">Logout</button>
            </form>

            <form action="deleteAccountHandler.php" method="POST">
                <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to delete your account? This action cannot be undone!');">Delete Account</button>
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