<?php
session_start();

// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the JSON data from the request
    $data = json_decode(file_get_contents("php://input"), true);

    // Store the cart data in the session
    $_SESSION["cart"] = $data;
}
