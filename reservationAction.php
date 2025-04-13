<?php
// Start the session to check if the user is logged in
session_start();

// Check if the user is not logged in or user_id is not set
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || !isset($_SESSION['user_id'])) {
    // Redirect to the login page with an alert message if not logged in
    echo "<script>
        alert('Please login to make a reservation.');
        window.location.href = 'login.php';
    </script>";
    exit; // Exit the script
}

// Include the database configuration file (config.php)
require 'config.php';

// Check if the request method is POST (form submission)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize the inputs
    $user_id = $_SESSION['user_id'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $time = mysqli_real_escape_string($conn, $_POST['time']);
    $seats = mysqli_real_escape_string($conn, $_POST['seats']);

    // Handle the uploaded image (payment slip)
    if (isset($_FILES['payment-slip'])) {
        $file = $_FILES['payment-slip'];
        $file_name = $file['name'];
        $file_temp = $file['tmp_name'];

        // Get the user's unique identifier (user_id)
        $user_id = $_SESSION['user_id'];

        // Create a new file name using the user's user_id
        $new_file_name = 'UserID_'. $user_id . '_' . $file_name;

        // Define the directory where the uploaded files will be stored
        $uploadDirectory = 'reservationpayments/';

        // Define the destination path for the uploaded image
        $destination = $uploadDirectory . $new_file_name;

        // Move the uploaded file to the destination directory with the new name
        if (move_uploaded_file($file_temp, $destination)) {
            echo "File uploaded.";
        } else {
            // File upload failed, handle the error
            echo "File upload failed.";
        }
        
    }

    // Prepare the SQL statement with seven placeholders and 'Pending' for status
    $sql = "INSERT INTO reservations (user_id, name, email, phone, date, time, seats, status) VALUES (?, ?, ?, ?, ?, ?, ?, 'Pending')";
    $stmt = mysqli_prepare($conn, $sql);

    // Bind the variables to the prepared statement with the corresponding number of placeholders
    mysqli_stmt_bind_param($stmt, "isssssi", $user_id, $name, $email, $phone, $date, $time, $seats);

    // Execute the statement and check for errors
    if (mysqli_stmt_execute($stmt)) {
        // Reservation saved successfully. Use JavaScript alert to notify the user.
        echo "<script>
                alert('Reservation saved successfully!');
                window.location.href = 'reservation.php';  // Redirect to the same page
              </script>";
        exit(); // Exit the script
    } else {
        echo "Error: " . mysqli_error($conn); // Display an error message
    }

    // Close the prepared statement
    mysqli_stmt_close($stmt);

    // Close the database connection
    mysqli_close($conn);
}
?>
