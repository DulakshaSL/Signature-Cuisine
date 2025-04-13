<!-- update_status.php -->

<?php
require 'config.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reservation_id = $_POST['id'];
    $new_status = $_POST['new_status'];

    // Update the status in the database
    $updateQuery = "UPDATE reservations SET status = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $updateQuery);
    mysqli_stmt_bind_param($stmt, "si", $new_status, $reservation_id);

    if (mysqli_stmt_execute($stmt)) {
        header('Location: admindashboard.php');
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close the prepared statement
    mysqli_stmt_close($stmt);

    // Close the database connection
    mysqli_close($conn);
}

?>

