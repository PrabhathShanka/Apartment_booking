<?php
// if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {


//     $apartment_id = $_GET['id'];
//  //echo $apartment_id;

// }
?>


<?php


$apartment_id = 1;

// Database connection
require 'databaseConnection.php';

// Fetch apartment data from the database
$query = "
    SELECT Apartments.*, facilities.*
    FROM Apartments
    INNER JOIN facilities ON Apartments.Apartment_ID = facilities.Apartment_ID
    WHERE Apartments.Apartment_ID = '$apartment_id'
";
$result = mysqli_query($conn, $query);

?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css"
          rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="inforstyles.css" />
    <title>information</title>
    
</head>
<body>
   






 

                    <?php
                    // Check if there are apartments to display
                    if (mysqli_num_rows($result) > 0) {
                        // Output data for each row
                        while($row = mysqli_fetch_assoc($result)) { ?>



            <div class="section__container client__container">
                <h2 class="section__header">Facilities</h2>
                <div class="client__grid">

                    <div class="client__card">
                        <img src="assets/bath.png" alt="client" />
                        <p>
                            Bathroom
                        </p>
                        <p>
                            Private bathroom :- <?php echo $row["Private_bathroom"]; ?>
                            <br>
                            Toilet :- <?php echo $row["Toilet"]; ?>
                        </p>
                    </div>

                    <div class="client__card">
                        <img src="assets/room.jpg" alt="client" />
                        <p>
                            Room Amenities
                            
                        </p>
                        <p>
                             Bed :- <?php echo $row["Room_Amenities_Bed"]; ?>
                             <br>
                            Metress :- <?php echo $row["Room_Amenities_Mattress"]; ?>
                            <br>
                            Table :- <?php echo $row["Room_Amenities_Table"]; ?>
                            <br>
                             Chair :- <?php echo $row["Room_Amenities_Chair"]; ?>
                        </p>
                    </div>

                    <div class="client__card">
                        <img src="assets/living area.jpg" alt="client" />
                        <p>
                            Living area
                        </p>
                        <p>
                            Dining area :- <?php echo $row["Living_area_Dining_area"]; ?>
                            <br>
                            Sitting area :- <?php echo $row["Living_area_Sitting_area"]; ?>
                        </p>
                    </div>

                    <div class="client__card">
                        <img src="assets/food.jpg" alt="client" />
                        <p>
                            Accomodation :- <?php echo $row["Accommodation"]; ?>
                        </p>

                    </div>

                    <div class="client__card">
                        <img src="assets/parking.png" alt="client" />
                        <p>
                            Parking :- <?php echo $row["Parking"]; ?>
                        </p>
                    </div>

                </div>
            </div>
           




            <?php
                        }
                    }
                    ?>
    
</body>
</html>
