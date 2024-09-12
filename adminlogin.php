<?php

if (isset($_POST["submit"])) {
    
  require 'databaseConnection.php';
  
  if (isset($_POST['username']) && isset($_POST['password'])) {
  
      function validate($data){
  
         $data = trim($data);
  
         $data = stripslashes($data);
  
         $data = htmlspecialchars($data);
  
         return $data;
  
      }
  
      $uname = validate($_POST['username']);
  
      $pass = validate($_POST['password']);
  
      if (empty($uname)) {
  
          echo "User Name is required";
  
          exit();
  
      }else if(empty($pass)){
  
          echo"Password is required";
  
          exit();
  
      }else{
  
          $sql = "SELECT * FROM admin WHERE username='$uname' AND password ='$pass'";
  
          $result = mysqli_query($conn, $sql);
  
          if (mysqli_num_rows($result) === 1) {
  
              $row = mysqli_fetch_assoc($result);
  
              if ($row['username'] === $uname && $row['password'] === $pass) {
                  header("Location: admin_dash.php");
                  exit();
                  
              }
              
              else{

                ?>
              <script type="text/javascript">
               var alertStyle = "padding: 10px; background-color: #f44336; color: white;";
              alert("User name or password is invalid !!!");
                window.location.href = "adminlogin.php";
                </script>
          <?php
  
             //header("Location: adminlogin.html");
             //exit();
            }
  
          }else{

            ?>
              <script type="text/javascript">
               var alertStyle = "padding: 10px; background-color: #f44336; color: white;";
              alert("User name or password is invalid !!!");
                window.location.href = "adminlogin.php";
                </script>
          <?php
    
             // header("Location: adminlogin.html");
             // exit();
            }
   
          }
      }
          else{
                  exit();
              }





}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" type="text/css" href="index.css">
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

  </style>
</head>
<body>
  <nav class="navbar">
    <div class="navdiv">
      <div class="logo"><a href="#">E-ChargeZone</a></div>
      <ul>
        
        <li>
          <button onclick="location.href='index.php'"><a>Home</a></button>
        </li>
        <li>
          <button onclick="location.href='customerRegister.php'"><a>Sign up</a></button>
        </li>
      </ul>
    </div>
  </nav>
  <div class="login-container">
    <h2>Admin Login</h2>
    <form action="#" method="POST">
      <div class="input-container">
        <label for="username">Admin ID</label>
        <input type="text" id="username" name="username" placeholder="Enter your username" required>
      </div>
      <div class="input-container">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>
      </div>
      <button type="submit" name="submit">Login</button>
      <div class="links">
        
        
      </div>
    </form>
  </div>
  <footer class="footer">
    <div class="container">
      <p>&copy; 2024 E-ChargeZone. All rights reserved.</p>
    </div>
  </footer>
</body>
</html>
