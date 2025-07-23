<?php
session_start();

include 'db.php';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $sql = "DELETE FROM Users WHERE id = $user_id";

    if ($conn->query($sql) === TRUE) {
        session_destroy();

        header("Location: login.php");
        exit();
    } else {
        echo "Error deleting account: " . $conn->error;
    }
} else {
    header("Location: login.php");
    exit();
}

$conn->close();
