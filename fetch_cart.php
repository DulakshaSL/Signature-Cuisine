<?php
session_start();

// Check if the "cart" key exists in the session
if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
} else {
    // If the "cart" key doesn't exist, initialize an empty cart array
    $cart = array();
}

// Send the cart data as a JSON response
header('Content-Type: application/json');
echo json_encode($cart);
