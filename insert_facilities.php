<?php

require 'databaseConnection.php';

// Check if Apartment_ID exists in the session
session_start();




if (isset($_SESSION['lastApartmentID'])) {
    $apartmentID = $_SESSION['lastApartmentID'];
} else {
    echo "<script>alert('No Apartment ID found. Please go back and add an apartment first.');</script>";
    exit;
}

$apartmentID = 4;


// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data from radio buttons
    $private_bathroom = $_POST['private_bathroom'];
    $toilet = $_POST['toilet'];
    $room_bed = $_POST['room_bed'];
    $room_mattress = $_POST['room_mattress'];
    $room_table = $_POST['room_table'];
    $room_chair = $_POST['room_chair'];
    $dining_area = $_POST['dining_area'];
    $sitting_area = $_POST['sitting_area'];
    $accommodation = $_POST['accommodation'];
    $parking = $_POST['parking'];

    // Prepare the SQL insert query
    $sql = "INSERT INTO facilities (Apartment_ID, Private_bathroom, Toilet, Room_Amenities_Bed, Room_Amenities_Mattress, Room_Amenities_Table, Room_Amenities_Chair, Living_area_Dining_area, Living_area_Sitting_area, Accommodation, Parking)
            VALUES ('$apartmentID', '$private_bathroom', '$toilet', '$room_bed', '$room_mattress', '$room_table', '$room_chair', '$dining_area', '$sitting_area', '$accommodation', '$parking')";

    // Execute the query and check for success
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Facilities added successfully!'); document.location.href = 'index-AfterLoginApartmentOwner.php';</script>";
    } else {
        echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Facilities</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #cfcfcf; /* Dark background */
            color: #e0e0e0; /* Light text color for better contrast */
        }
        .form-container {
            width: 400px;
            margin: 40px auto; /* Added top and bottom margins */
            background: #1e1e1e; /* Darker background for form */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #ffffff; /* Heading color */
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 10px;
            color: #e0e0e0; /* Label color */
        }
        .radio-group {
            margin-bottom: 20px;
        }
        input[type="radio"] {
            margin-right: 5px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #0cc100; /* Button background color */
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: green; /* Darker shade for hover effect */
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Add Facilities</h2>
        <form action="" method="POST">
            <div class="radio-group">
                <label>Private Bathroom:</label>
                <input type="radio" name="private_bathroom" value="YES" required> Yes
                <input type="radio" name="private_bathroom" value="NO" required> No
            </div>
            <div class="radio-group">
                <label>Toilet:</label>
                <input type="radio" name="toilet" value="YES" required> Yes
                <input type="radio" name="toilet" value="NO" required> No
            </div>
            <div class="radio-group">
                <label>Room Amenities - Bed:</label>
                <input type="radio" name="room_bed" value="YES" required> Yes
                <input type="radio" name="room_bed" value="NO" required> No
            </div>
            <div class="radio-group">
                <label>Room Amenities - Mattress:</label>
                <input type="radio" name="room_mattress" value="YES" required> Yes
                <input type="radio" name="room_mattress" value="NO" required> No
            </div>
            <div class="radio-group">
                <label>Room Amenities - Table:</label>
                <input type="radio" name="room_table" value="YES" required> Yes
                <input type="radio" name="room_table" value="NO" required> No
            </div>
            <div class="radio-group">
                <label>Room Amenities - Chair:</label>
                <input type="radio" name="room_chair" value="YES" required> Yes
                <input type="radio" name="room_chair" value="NO" required> No
            </div>
            <div class="radio-group">
                <label>Living Area - Dining Area:</label>
                <input type="radio" name="dining_area" value="YES" required> Yes
                <input type="radio" name="dining_area" value="NO" required> No
            </div>
            <div class="radio-group">
                <label>Living Area - Sitting Area:</label>
                <input type="radio" name="sitting_area" value="YES" required> Yes
                <input type="radio" name="sitting_area" value="NO" required> No
            </div>
            <div class="radio-group">
                <label>Accommodation:</label>
                <input type="radio" name="accommodation" value="YES" required> Yes
                <input type="radio" name="accommodation" value="NO" required> No
            </div>
            <div class="radio-group">
                <label>Parking:</label>
                <input type="radio" name="parking" value="YES" required> Yes
                <input type="radio" name="parking" value="NO" required> No
            </div>
            <input type="submit" value="NEXT">
        </form>
    </div>
</body>
</html>
