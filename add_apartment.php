<?php
session_start();


if (isset($_SESSION['email'])) {

    $email = $_SESSION['email'];
    echo $email;



}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Apartment</title>

    <!-- Internal CSS -->
    <style>
      body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        padding: 50px;
      }

      .apartment-form {
        width: 500px;
        margin: 0 auto;
        background: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }

      .apartment-form h2 {
        text-align: center;
        margin-bottom: 20px;
      }

      .apartment-form form {
        display: flex;
        flex-direction: column;
      }

      .apartment-form label {
        margin-bottom: 5px;
        font-weight: bold;
      }

      .apartment-form input[type="text"],
      .apartment-form input[type="email"],
      .apartment-form input[type="file"],
      .apartment-form textarea {
        margin-bottom: 15px;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ddd;
        border-radius: 4px;
      }

      .apartment-form input[type="submit"] {
        padding: 10px 20px;
        font-size: 16px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }

      .apartment-form input[type="submit"]:hover {
        background-color: #0056b3;
      }
    </style>
  </head>
  <body>
    <section class="apartment-form">
      <h2>Add Apartment</h2>
      <form
        action="insert_apartment.php"
        method="POST"
        enctype="multipart/form-data"
      >
       

        <label for="location">Location:</label>
        <input type="text" name="location" required />

        <label for="gps_tag">GPS Tag:</label>
        <input type="text" name="gps_tag" required />

        <label for="image">Apartment Image ( jpg , jpeg , png ):</label>
        <input type="file" name="image" accept="image/*" required />

        <label for="TeleNo">Telephone Number:</label>
        <input type="text" name="TeleNo" required />

        <label for="price">Price ( LKR ):</label>
        <input type="text" name="price" required />

        <label for="description">Description:</label>
        <textarea name="description" required></textarea>

        <input type="submit" value="Submit" />
      </form>
    </section>
  </body>
</html>
