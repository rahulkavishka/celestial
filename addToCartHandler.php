<?php
session_start();

include 'db.php';

$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['name']) || !isset($data['price']) || !isset($data['image'])) {
    echo json_encode(['success' => false, 'message' => 'Invalid data received']);
    exit();
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$product = [
    'name' => $data['name'],
    'price' => $data['price'],
    'image' => $data['image'],
    'quantity' => 1
];

$existingIndex = array_search($product['name'], array_column($_SESSION['cart'], 'name'));
if ($existingIndex !== false) {
    $_SESSION['cart'][$existingIndex]['quantity']++;
} else {
    $_SESSION['cart'][] = $product;
}

echo json_encode(['success' => true, 'message' => $data['name'] . ' added to cart']);

