<?php
session_start();
include 'connection.php';

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

$id = $_SESSION['id'];
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$address = $_SESSION['address'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cartItems = $_POST['books'];
    $subtotal = $_POST['subtotal'];

    // Insert order into orders table
    $orderQuery = "INSERT INTO orders (user_id, user_name, user_address, subtotal, order_date) VALUES (?, ?, ?, ?, NOW())";
    $stmt = $conn->prepare($orderQuery);
    $stmt->bind_param("isss", $id, $name, $address, $subtotal);
    $stmt->execute();
    $order_id = $stmt->insert_id;

    // Insert order items into order_items table
    $itemsQuery = "INSERT INTO order_items (order_id, book_title, book_price) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($itemsQuery);
    foreach ($cartItems as $item) {
        $stmt->bind_param("iss", $order_id, $item['title'], $item['price']);
        $stmt->execute();
    }

    header("Location: invoice.php?order_id=$order_id");
    exit();
}
?>
