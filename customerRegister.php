<?php

if (isset($_POST["submitCustomer"])) {
    $telNumber = $_POST['telephone'];
    $name = $_POST['name'];
    $addre = $_POST['address'];
    $email = $_POST['email'];
    $userRole = $_POST['userRole'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

    require 'databaseConnection.php';

    if ($password1 == $password2) {
        $sql = "INSERT INTO `users`(`email`,`name`, `address`, `tel_number`, `user_role` , `password1`) VALUES ('$email','$name','$addre','$telNumber','$userRole','$password1')";
        $ret = mysqli_query($conn, $sql);

        if ($ret) {
            echo "No of records inserted: $ret <br>";
           // echo "registration successfully";

            ?>
		            <script type="text/javascript">
                 var alertStyle = "padding: 10px; background-color: #f44336; color: white;";
                alert("registration successfully !!!");
                  window.location.href = "login.html";
                  </script>
				    <?php


          //  header("Location: login.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        // Disconnect
        mysqli_close($conn);
    } else {
        echo "Passwords do not match.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" type="text/css" href="index.css">
  <link rel="stylesheet" href="cusregister.css">
  <link rel="stylesheet" type="text/css" href="responsive.css">
  <style>
    /* Ensure the navbar stays fixed at the top */
    .navbar {
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 1000;
    }

    /* Add padding to the top of the body to prevent the content from being hidden behind the fixed navbar */
    body {
      padding-top: 60px; /* Adjust this value based on the height of your navbar */
      padding-bottom: 60px; /* Add padding to the bottom to make space for the footer */
    }
    body {
  padding-top: 60px; /* Adjust this value based on the height of your navbar */
  padding-bottom: 60px; /* Add padding to the bottom to make space for the footer */
  margin: 0;
  position: relative; /* Needed to position the pseudo-element */
  background: none; /* Remove the default background */
}

body::before {
  content: '';
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-image: url('image/img1.WEBP');
  background-size: cover;
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-position: center;
  filter: blur(5px); /* Adjust the blur amount as needed */
  z-index: -1; /* Ensure it is behind all other content */
}


    /* Footer styles to ensure it stays at the bottom */
    .footer {
      position: fixed;
      bottom: 0;
      width: 100%;
      background-color: #333; /* Change footer color to #333 */
      color: #fff; /* Change text color to white for better contrast */
      text-align: center;
      padding: 10px 0;
    }
  </style>
</head>
<body>
  <nav class="navbar">
    <div class="navdiv">
    <img src="image/boarding_logo.jpg" alt="Your Image Description" style="width: 70px; height: 70px; vertical-align: middle; margin-right: 10px;">
      <ul>
        
        <li>
          <button onclick="location.href='login.html'"><a>Sign in</a></button>
        </li>
        <li>
          <button onclick="location.href='index.php'"><a>Home</a></button>
        </li>
      </ul>
    </div>
  </nav>
  <div class="registration-container">
    <h2>Customer Registration</h2>
    <form action="#" method="POST">
    <div class="input-container">
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" placeholder="Enter your email" required>
      </div>
      <div class="input-container">
        <label for="telephone">Telephone number:</label>
        <input type="tel" id="telephone" name="telephone" placeholder="Enter your telephone number" required>
      </div>
      <div class="input-container">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter your name" required>
      </div>
      <div class="input-container">
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" placeholder="Enter your address" required>
      </div>
      <div class="input-container">
        <label for="email">User role:</label>
        <select class="form-select border-0" style="height: 55px;" name="userRole"required>
                                    <option selected>--- Select User role ---</option>

                                    <option value="students">Student</option>
                                    <option value="apartmentOwner">apartment Owner</option>
                                    
                                    
                                </select>
      </div>
      <div class="input-container">
        <label for="password1">Password:</label>
        <input type="password" id="password1" name="password1" placeholder="Password" required>
      </div>
      <div class="input-container">
        <label for="password2">Confirm Password:</label>
        <input type="password" id="password2" name="password2" placeholder="Confirm Password" required>
      </div>
      <button type="submit" name="submitCustomer">Register</button>
    </form>
    <p>Already have an account? <a href="login.html">Login</a></p>
  </div>
  <footer class="footer">
    <div class="container">
      <p>&copy;  Copyright HMPM 2024. All Rights Reserved.</p>
    </div>
  </footer>
</body>
</html>
