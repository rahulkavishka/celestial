<?php
session_start();

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM Users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_name'] = $user['first_name'] . ' ' . $user['last_name'];

            header("Location: home.php");
            exit();
        } else {
            echo "<script>alert('Incorrect email or password!');window.location.href='login.php';</script>";
        }
    } else {
        echo "<script>alert('Email not registered!');window.location.href='login.php';</script>";
    }
}

$conn->close();
