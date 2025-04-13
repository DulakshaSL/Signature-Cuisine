<?php
// Include your database configuration
require 'config.php';

// Check if the "query" key is set in the $_GET array
if (isset($_GET['query'])) {
    $searchQuery = mysqli_real_escape_string($conn, $_GET['query']);

    // Perform a query to search for facilities
    $query = "SELECT * FROM facilities WHERE facility_name LIKE '%$searchQuery%' OR description LIKE '%$searchQuery%'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    // Display search results
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="result-item">';
        echo '<img src="resources/' . $row['image'] . '" alt="' . $row['facility_name'] . '" class="result-image">';
        echo '<div class="result-details">';
        echo '<h3>' . $row['facility_name'] . '</h3>';
        echo '</div>';
        echo '</div>';
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // Handle the case where "query" key is not set
    echo "No search query provided.";
}
?>


