<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $conn->real_escape_string($_POST['first_name']);
    $last_name = $conn->real_escape_string($_POST['last_name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone_number = $conn->real_escape_string($_POST['PhoneNumber']);
    $address = $conn->real_escape_string($_POST['Address']);
    $password = $conn->real_escape_string($_POST['password']);
    $confirm_password = $conn->real_escape_string($_POST['confirm_password']);

    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match!');window.location.href='signup.php';</script>";
        exit;
    }

    $email_check_sql = "SELECT * FROM Users WHERE email = '$email'";
    $result = $conn->query($email_check_sql);

    if ($result->num_rows > 0) {
        echo "<script>alert('Email is already registered! Please use a different email.');window.location.href='signup.php';</script>";
        exit;
    }

    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO Users (first_name, last_name, email, PhoneNumber, Address, password) VALUES ('$first_name', '$last_name', '$email', '$phone_number', '$address', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
