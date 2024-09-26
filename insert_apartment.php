


<?php
session_start();


if (isset($_SESSION['email'])) {

    $email = $_SESSION['email'];
    echo $email;



}

// Database connection

require 'databaseConnection.php';

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $location = $_POST['location'];
    $gps_tag = $_POST['gps_tag'];
    $teleNo = $_POST['TeleNo'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    // Handle image upload
    if($_FILES["image"]["error"] === 4){
        echo
        "<script> alert('Image Does Not Exist')</script>";
    }else{
        $fileName = $_FILES["image"]["name"];
        $fileSize = $_FILES["image"]["size"];
        $tmpName = $_FILES["image"]["tmp_name"];
    
        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));
        if ( !in_array($imageExtension, $validImageExtension) ){
          echo
          "
          <script>
            alert('Invalid Image Extension');
          </script>
          ";
        }
        else if($fileSize > 1000000){
          echo
          "
          <script>
            alert('Image Size Is Too Large');
          </script>
          ";
        }


        else{
            $newImageName = uniqid();
            $newImageName .= '.' . $imageExtension;
      
            move_uploaded_file($tmpName, 'images/' . $newImageName);
            $query = "INSERT INTO Apartments ( location, gps_tag, image, TeleNo, price, description, email) 
                VALUES ( '$location', '$gps_tag', '$newImageName', '$teleNo', '$price', '$description', '$email')";
            mysqli_query($conn, $query);
            echo
            "
            <script>
              alert('Registration is successful!!!!');
              document.location.href = 'index-AfterLoginApartmentOwner.php';
            </script>
            ";
          }
        }
}

$conn->close();
?>
