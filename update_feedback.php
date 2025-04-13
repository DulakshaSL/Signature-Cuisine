<!-- update_feedback.php -->

<?php
require 'config.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $query_id = $_POST['query_id'];
    $new_feedback = $_POST['new_feedback'];

    // Update the feedback in the database
    $updateQuery = "UPDATE queries SET feedback = ? WHERE query_id = ?";
    $stmt = mysqli_prepare($conn, $updateQuery);
    mysqli_stmt_bind_param($stmt, "si", $new_feedback, $query_id);

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
