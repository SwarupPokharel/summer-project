<?php

session_set_cookie_params(0);
session_start(); // If using sessions for cart storage

// Example: Adding product to session cart
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = $_POST['product_id'];
    $productName = $_POST['product_title'];
    $productPrice = $_POST['product_price'];
    $productImage = $_POST['product_image'];

    // Example: Store product in session cart
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    if (isset($_SESSION['cart'][$productId])) {
        // Item already in cart
        $_SESSION['message'] = "<script> alert('This item is already in your cart.'); </script>";
    }else{
        $_SESSION['cart'][$productId] = array(
            'id' => $productId,
            'title' => $productName,
            'price' => $productPrice,
            'image' => $productImage
        );
    }
    
    // Return updated cart count (you may customize this based on your cart implementation)
    $_SESSION['cartCount'] = count($_SESSION['cart']);
    echo $_SESSION['cartCount'];
}
?>
