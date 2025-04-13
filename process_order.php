<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require 'config.php'; // Include your database configuration file

    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;

    if ($user_id === 0) {
        echo "<script>
            alert('Please login to place an order.');
            window.location href = 'login.php';
        </script>";
        exit;
    }

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $paymentMethod = mysqli_real_escape_string($conn, $_POST['payment']);

    // Get the order data from the hidden input field
    $orderData = json_decode($_POST['orderData'], true);

    if (empty($orderData)) {
        // Handle empty or invalid order data
        echo "Invalid order data";
        exit;
    }

    $totalPrice = 0;
    $titles = [];
    $quantities = [];

    foreach ($orderData as $item) {
        $price = (float) filter_var($item['price'], FILTER_SANITIZE_NUMBER_FLOAT);
        if (is_numeric($price)) {
            $totalPrice += $price * $item['count'];
            $titles[] = $item['title'];
            $quantities[] = $item['count'];
        }
    }

    // Encode titles and quantities as JSON arrays
    $titlesJSON = json_encode($titles);
    $quantitiesJSON = json_encode($quantities);

    // Prepare and execute the SQL statement to insert data into the onlineorders table
    $sql = "INSERT INTO onlineorders (user_id, name, address, contact, paymentMethod, titles, quantities, total_price, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'pending')";
    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "issssssd", $user_id, $name, $address, $contact, $paymentMethod, $titlesJSON, $quantitiesJSON, $totalPrice);

    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['cart'] = array();
        echo "<script>
            alert('Order Placed Successfully.');
            window.location.href = 'menu.php';
        </script>";

        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>