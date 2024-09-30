<?php
// Step 1: Database connection
require 'databaseConnection.php'; // Ensure this contains your correct connection details

if (isset($_GET['email'])) {
    $email = mysqli_real_escape_string($conn, $_GET['email']);

    // Step 2: SQL query to delete the user
    $sql = "DELETE FROM users WHERE email='$email'";

    if (mysqli_query($conn, $sql)) {
        // Redirect to the user listing page after deletion
        header("Location: user_listing.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "No email provided for deletion.";
}

// Close the database connection
mysqli_close($conn);
?>
