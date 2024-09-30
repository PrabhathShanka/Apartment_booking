<?php
// Step 1: Database connection
require 'databaseConnection.php';

if (isset($_GET['ID'])) {
    $ApartmentID = mysqli_real_escape_string($conn, $_GET['ID']);

    echo $ApartmentID;

    // Step 2: SQL query to delete the facility
    $sql = "DELETE FROM facilities WHERE Apartment_ID ='$ApartmentID'";

    if (mysqli_query($conn, $sql)) {
        // Redirect to the facilities listing page after deletion
        //header("Location: facilities_listing.php");



        $sql = "DELETE FROM apartments WHERE Apartment_ID='$ApartmentID'";

        if (mysqli_query($conn, $sql)) {
            // Redirect to the apartment listing page after deletion
            ?>
            <script type="text/javascript">
              var alertStyle = "padding: 10px; background-color: #f44336; color: white;";
              alert("Aparment record Delete successfully !!!");
              window.location.href = "admin_NOT_Approve_List.php";
            </script>
      <?php
           
           
           
           
            exit();
       
       
       
       
       
        }
    


















        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "No facility ID provided for deletion.";
}

// Close the database connection.....
mysqli_close($conn);
?>
