<?php
session_start();

if (!isset($_SESSION['cart'])) {
    echo json_encode(['success' => false, 'message' => 'No cart found']);
    exit();
}

$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['index']) || !isset($data['action'])) {
    echo json_encode(['success' => false, 'message' => 'Invalid data received']);
    exit();
}

$index = $data['index'];
$action = $data['action'];

if ($index < 0 || $index >= count($_SESSION['cart'])) {
    echo json_encode(['success' => false, 'message' => 'Invalid product index']);
    exit();
}

$product = $_SESSION['cart'][$index];

if ($action == 'increase') {
    $_SESSION['cart'][$index]['quantity']++;
} elseif ($action == 'decrease') {
    if ($_SESSION['cart'][$index]['quantity'] > 1) {
        $_SESSION['cart'][$index]['quantity']--;
    } else {
        array_splice($_SESSION['cart'], $index, 1);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid action']);
    exit();
}

echo json_encode(['success' => true, 'message' => 'Cart updated']);
