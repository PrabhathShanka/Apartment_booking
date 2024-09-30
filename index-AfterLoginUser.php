<?php
session_start();

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
}

// Database connection
require 'databaseConnection.php';

// Fetch apartment data based on search criteria
$whereClauses = ["adminApproving = 'Approved'"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve search inputs

    $min_price = isset($_POST['min_price']) ? intval($_POST['min_price']) : 0;
    $max_price = isset($_POST['max_price']) ? intval($_POST['max_price']) : PHP_INT_MAX;

    // Append location to the query if provided
    if (!empty($location)) {
        $whereClauses[] = "location LIKE '%$location%'";
    }

    // Append price range to the query
    $whereClauses[] = "price >= $min_price";
    $whereClauses[] = "price <= $max_price";
}

// Construct the final query
$whereSQL = implode(" AND ", $whereClauses);
$query = "SELECT * FROM Apartments WHERE $whereSQL";

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Internal CSS -->
    <style>
        /* Search Section Styling */
        .search-bar {
            width: 100%;
            padding: 20px;
            background-color: #c7e47e;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin-top: 20px;
        }

        .search-bar h3 {
            font-size: 24px;
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
            border: 1px solid white;
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
            background-color: #707b7c;
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

        .container,
        h2 {
            margin-top: 40px;
            margin-bottom: 50px;
        }

        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            height: 75px;
            background-color: #333;
            z-index: 1000;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            display: flex;
            align-items: center;
        }

        .navdiv {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
        }

        .navdiv img {
            width: 60px;
            height: 60px;
            vertical-align: middle;
            margin-right: 10px;
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
            padding: 10px 15px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .navbar button {
            background-color: #f00;
            color: white;
            border: none;
            padding: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .navbar button:hover {
            background-color: #d00;
        }

        body {
            margin: 0;
            padding-top: 75px;
        }
    </style>
</head>

<body>
    <nav class="navbar" id="navbar">
        <div class="navdiv">
            <img src="image/boarding_logo.jpg" alt="Your Image Description" style="width: 60px; height: 60px; vertical-align: middle; margin-right: 10px;">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#about">Apartment details</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><button onclick="location.href='index.php'"><a>LOG OUT</a></button></li>
            </ul>
        </div>
    </nav>

    <header class="hero-section">
        <div class="hero-content">
            <h1>Welcome to STAY SABRA</h1>
            <p>This website aims to bridge the gap between students seeking suitable housing and owners looking for reliable tenants.</p>
        </div>
    </header>

    <section id="about" class="about-section">
        <div class="container">
            <h2><hr>Apartment Details<hr></h2>
            <!-- Search Section -->
            <section class="search-bar">
                <h3>Search for Apartments</h3>
                <form method="POST" action="">
                    <!-- <input type="text" name="location" placeholder="Enter location" /> -->
                    <input type="number" name="min_price" placeholder="Min Price" />
                    <input type="number" name="max_price" placeholder="Max Price" />
                    <input type="submit" value="Search" />
                </form>
            </section>

            <!-- Apartments Table -->
            <table>
                <thead>
                    <tr>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Check if there are apartments to display
                    if (mysqli_num_rows($result) > 0) {
                        // Output data for each row
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td style="text-align: center; vertical-align: middle;">
                                    <h1><?php echo $row["location"]; ?></h1><br>
                                    <img src="images/<?php echo $row["image"]; ?>" width="600" height="400" title="<?php echo $row['image']; ?>"><br>
                                    <h1>Price: <?php echo $row["price"]; ?></h1>
                                    <h1>
                                        <a href='apartment_more_details.php?id=<?php echo urlencode($row["Apartment_ID"]); ?>' style="color: #1829f4;">
                                            <b>| MORE DETAILS |</b>
                                        </a>
                                    </h1>
                                    <br>
                                    <hr style="border: 6px solid #fbfcfc; width: 100%;">
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan='8'>No apartments found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>

    <div class="mb-5">
        <div class="row d-flex justify-content-center mx-5">
            <div class="col-sm-12 col-lg-6 m-4 p-3">
                <h2><b>About Stay Sabra</b></h2>
                <p>If you have any questions, comments, or would like to learn more about our services, please don’t hesitate to get in touch with us. We’re committed to providing you with all the information you need and assisting you throughout the entire process. Whether you need clarification on our platform, have specific concerns, or require help finding your ideal apartment, our friendly team is here to help you every step of the way.</p>
            </div>
            <div class="col-sm-12 col-lg-6 m-4 p-3">
                <img class="img-fluid" src="images/student_housing.jpg" alt="">
            </div>
        </div>
    </div>
</body>

</html>
