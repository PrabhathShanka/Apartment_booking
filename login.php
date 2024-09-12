<?php
require 'databaseConnection.php';

session_start(); 



if (isset($_POST['telNumber']) && isset($_POST['password'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $telNum = validate($_POST['telNumber']);

    $pass = validate($_POST['password']);

    if (empty($telNum)) {

        echo "User Name is required";

        exit();

    }else if(empty($pass)){

        echo"Password is required";

        exit();

    }else{

        $sql = "SELECT * FROM customer WHERE telephone_no='$telNum' AND password ='$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['telephone_no'] === $telNum && $row['password'] === $pass) {

                $_SESSION['teliphon_number'] = $telNum;

               header("Location: index-AfterLogin.php");
                exit();
            }  
            else{

              ?>
		            <script type="text/javascript">
                 var alertStyle = "padding: 10px; background-color: #f44336; color: white;";
                alert("The phone number or password is invalid !!!");
                  window.location.href = "login.html";
                  </script>
				    <?php

                  //  header("Location: Sign in4.html");
                  //  exit();
                }

            }else{
              ?>
              <script type="text/javascript">
               var alertStyle = "padding: 10px; background-color: #f44336; color: white;";
              alert("The phone number or password is invalid !!!");
                window.location.href = "login.html";
                </script>
          <?php
  
                   // header("Location: Sign in5.html");
                   // exit();
                 }
 
        }

    }

        else{
                 exit();
            }
?>