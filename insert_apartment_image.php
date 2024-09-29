<?php
session_start();
require 'databaseConnection.php'; // Assuming your database connection file is named this

// Check if Apartment_ID is stored in the session
if (isset($_SESSION['lastApartmentID'])) {
    $apartmentID = $_SESSION['lastApartmentID'];
} else {
    echo "<script>alert('No Apartment ID found. Please add an apartment first.');</script>";
    exit;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect images from the form
    $images = ['image1', 'image2', 'image3', 'image4', 'image5'];

    // Loop through the uploaded images and insert them into the database
    foreach ($images as $imageKey) {
        if (!empty($_FILES[$imageKey]['name'])) {
            // Prepare the image name and move the file to a directory
            $imageName = $_FILES[$imageKey]['name'];
            $imageTmpName = $_FILES[$imageKey]['tmp_name'];
            $targetDirectory = "uploads/"; // Directory where images will be saved
            $targetFile = $targetDirectory . basename($imageName);

            // Move the uploaded file to the target directory
            if (move_uploaded_file($imageTmpName, $targetFile)) {
                // Insert the image name and Apartment_ID into the database
                $query = "INSERT INTO apartment_photos (Apartment_ID, image) VALUES ('$apartmentID', '$imageName')";
                if (!mysqli_query($conn, $query)) {
                    echo "<script>alert('Error uploading $imageName.');</script>";
                }
            } else {
                echo "<script>alert('Failed to upload $imageName.');</script>";
            }
        }
    }

    echo "<script>alert('Images uploaded successfully!'); window.location.href='index-AfterLoginApartmentOwner.php';</script>";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" />
    <title>Add Apartment</title>

    <!-- Dark Mode CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: white;
            color: #e0e0e0;
        }

        .apartment-form {
            width: 500px;
            margin: 0 auto;
            background: #444444;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            margin-top: 50px;
        }

        .apartment-form h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #ffffff;
        }

        .apartment-form label {
            margin-bottom: 5px;
            font-weight: bold;
            color: #b0b0b0;
        }

        .apartment-form input[type="file"] {
            margin-bottom: 15px;
            padding: 10px;
            background-color: #2c2c2c;
            color: #ffffff;
            border: 1px solid #444444;
            border-radius: 4px;
        }

        .apartment-form input[type="submit"], .apartment-form input[type="Back"] {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 20px;
        }

        .apartment-form input[type="submit"] {
            background-color: #45a049;
            color: white;
        }

        .apartment-form input[type="submit"]:hover {
            background-color: green;
        }

        .apartment-form input[type="Back"] {
            background-color: orangered;
            color: white;
        }

        .apartment-form input[type="Back"]:hover {
            background-color: red;
        }

        .footer {
            bottom: 0;
            width: 100%;
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <section class="apartment-form">
        <h2>Add Apartment Images</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="image1">Add Image 01 ( jpg, jpeg, png ):</label>
            <input type="file" name="image1" accept="image/*" required />

            <label for="image2">Add Image 02 ( jpg, jpeg, png ):</label>
            <input type="file" name="image2" accept="image/*" required />

            <label for="image3">Add Image 03 ( jpg, jpeg, png ):</label>
            <input type="file" name="image3" accept="image/*" required />

            <label for="image4">Add Image 04 ( jpg, jpeg, png ):</label>
            <input type="file" name="image4" accept="image/*" required />

            <label for="image5">Add Image 05 ( jpg, jpeg, png ):</label>
            <input type="file" name="image5" accept="image/*" required />

            <br>

            <input type="submit" value="SUBMIT" />

        </form>
    </section>

    <footer class="footer">
        <div class="container">
            <p>&copy; Copyright HMPM 2024. All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>
