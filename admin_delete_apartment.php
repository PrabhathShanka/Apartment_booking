<?php
// Step 1: Database connection
require 'databaseConnection.php';

if (isset($_GET['ID'])) {
    $facility_id = mysqli_real_escape_string($conn, $_GET['ID']);

    // Step 2: SQL query to delete the facility
    $sql = "DELETE FROM facilities WHERE ID='$facility_id'";

    if (mysqli_query($conn, $sql)) {
        // Redirect to the facilities listing page after deletion
        header("Location: facilities_listing.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "No facility ID provided for deletion.";
}

// Close the database connection
mysqli_close($conn);
?>
