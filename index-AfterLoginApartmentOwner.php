<?php
session_start();

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    echo $email;
}

// Database connection
require 'databaseConnection.php';

// Fetch apartment data from the database
$query = "SELECT * FROM Apartments WHERE email = '$email'";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home page</title>
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="responsive.css">

    <!-- Internal CSS -->
    <style>
        /* Search Section Styling */
        .search-bar {
            width: 100%;
            padding: 20px;
            background-color: #f4f4f4;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin-top: 20px;
        }

        .search-bar h3 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        .search-bar form {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
        }

        .search-bar input[type="text"],
        .search-bar input[type="number"] {
            width: 200px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 16px;
        }

        .search-bar input[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .search-bar input[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table th,
        table td {
            padding: 12px;
            border: 0px solid #ddd;
            text-align: left;
            background-color: #f4f4f4;
        }

        table th {
            background-color: #333;
            color: white;
        }

        table tr:nth-child(even) {
            background-color: #f4f4f4;
        }

        .cta-button {
            margin-bottom: 10px;
        }

        /* Fixed Navbar Styling */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background-color: #333;
            /* Update this as needed */
            z-index: 1000;
            /* To ensure it stays on top of other elements */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }

        .navbar ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
        }

        .navbar li {
            margin: 0 15px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 10px;
        }

        .navdiv {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 20px;
        }

        body {
            margin: 0;
            padding-top: 90px;
            /* Adjust this to prevent content from being hidden under the navbar */
        }
    </style>
</head>

<body>
    <nav class="navbar" id="navbar">
        <div class="navdiv">
            <img src="image/boarding_logo.jpg" alt="Your Image Description" style="width: 70px; height: 70px; vertical-align: middle; margin-right: 10px;">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#about"> Apartment details</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="#settings">Settings</a></li>
                <li><button onclick="location.href='index.php'"><a>LOG OUT</a></button></li>
            </ul>
        </div>
    </nav>

    <header class="hero-section">
        <div class="hero-content">
            <h1>Welcome to STAY SABRA</h1>
            <p>This website aims to bridge the gap between students seeking suitable housing and owners looking for reliable tenants.</p>
            <a class="cta-button" href="#">Learn More</a>
        </div>
    </header>

    <section id="about" class="about-section">
        <div class="container">
            <h2>
                <hr>Apartment Details
                <hr>
            </h2>
            <a class="cta-button" href="add_apartment.php">ADD Apartment</a><br /><br />



            <!-- Apartments Table -->
            <h2>
                <hr>List of Apartments
                <hr>
            </h2>
            <table>
                <thead>
                    <tr>
                        <th>Apartment ID</th>
                        <th>Location</th>
                        <th>GPS Tag</th>
                        <th>Image</th>
                        <th>TeleNo</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Check if there are apartments to display
                    if (mysqli_num_rows($result) > 0) {
                        // Output data for each row
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                <td>" . $row['Apartment_ID'] . "</td>
                                <td>" . $row['location'] . "</td>
                                <td>" . $row['gps_tag'] . "</td>
                                <td><img src='images/" . $row['image'] . "' width='100' height='100'></td>
                                <td>" . $row['TeleNo'] . "</td>
                                <td>" . $row['price'] . "</td>
                                <td>" . $row['description'] . "</td>
                                <td>" . $row['email'] . "</td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>No apartments found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>

    <section id="services"></section>
    <section id="contact" class="contact-section">
        <div class="container">
            <h2>Contact Us</h2>
            <p>If you have any questions, comments, or would like to learn more about our services, please get in touch with us.
                You can reach us via email at staysabra@gmail.com or call us at +94 455666236. We're here to help and look forward to hearing from you!</p>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <p>&copy; Copyright HMPM 2024. All Rights Reserved.</p>
        </div>
    </footer>

</body>

</html>

<?php
$conn->close();
?>