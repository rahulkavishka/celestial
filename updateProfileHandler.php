<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name  = $_POST['last_name'];
    $email      = $_POST['email'];
    $phone_number = $_POST['PhoneNumber'];
    $address    = $_POST['Address'];

    $sql = "UPDATE users SET first_name=?, last_name=?, email=?, PhoneNumber=?, Address=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$first_name, $last_name, $email, $phone_number, $address, $user_id]);

    $_SESSION['user_name'] = $first_name;

    header("Location: dashboard.php?updated=1");
    exit();
}
