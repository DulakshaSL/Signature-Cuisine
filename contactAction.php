<?php
// Include the database configuration file
include('config.php'); // Replace with the actual path to your config file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Prepare and execute an SQL INSERT statement with the "feedback" column
$insert_query = "INSERT INTO queries (name, email, message, feedback) VALUES (?, ?, ?, 'Pending')";

$stmt = mysqli_prepare($conn, $insert_query);
mysqli_stmt_bind_param($stmt, "sss", $name, $email, $message);

if (mysqli_stmt_execute($stmt)) {
    // Query was successfully executed
    echo "<script>
            alert('Thank you for your message! We will get in touch soon');
            window.location.href = 'contact.php';  // Redirect to the same page
          </script>";
} else {
    // Query execution failed
    echo "Error: " . mysqli_error($conn);
}

// Close the prepared statement
mysqli_stmt_close($stmt);


// Close the database connection
mysqli_close($conn);


}

?>