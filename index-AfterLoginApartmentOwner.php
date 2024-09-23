<?php
session_start();


if (isset($_SESSION['email'])) {

    $email = $_SESSION['email'];
    echo $email;



}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home page</title>
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="responsive.css">
</head>
<body>
    <nav class="navbar" id="navbar">
        <div class="navdiv">
        <img src="image/boarding_logo.jpg" alt="Your Image Description" style="width: 70px; height: 70px; vertical-align: middle; margin-right: 10px;">
            <!-- <div class="logo"><a href="#">STAY SABRA</a></div> -->
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#about">Apartment details</a></li>
                <li><a href="#contact">Contact</a></li>
                <li>
                    <button onclick="location.href='index.php'"><a>LOG OUT</a></button>
                </li>

            </ul>
        </div>
    </nav>
    <header class="hero-section">
        <div class="hero-content">
            <h1>Welcome to STAY SABRA</h1>
            <p> This website aims to bridge the gap between students seeking suitable housing and owners looking for reliable tenants.</p>
            <a class="cta-button" href="#">Learn More</a>
        </div>
    </header>
    <section id="about" class="about-section">
        <div class="container">
            <h2>Apartment Details</h2>
            <a class="cta-button" href="#">ADD Apartment</a><br/>
            <br/> <p> This website aims to bridge the gap between students seeking suitable housing and owners looking for reliable tenants. 
                We strive to create a transparent and convenient platform for both parties, facilitating a smooth and stress-free experience.

Find the ideal boarding house to match your lifestyle and budget. Whether you're a student 
seeking a quiet study environment or a young professional looking for a vibrant social hub, we've got you covered.
 Our platform connects boarders with trusted owners, offering a seamless booking experience and a wide range of options to choose from. </p>
        </div>
    </section>
    <section id="services" class="services-section">

    
    </section>
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
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const navbar = document.getElementById('navbar');
            window.addEventListener('scroll', () => {
                if (window.scrollY > 0) {
                    navbar.classList.add('fixed-nav');
                } else {
                    navbar.classList.remove('fixed-nav');
                }
            });

            const links = document.querySelectorAll('nav ul li a');

            for (const link of links) {
                link.addEventListener('click', (event) => {
                    event.preventDefault();
                    const targetId = link.getAttribute('href').substring(1);
                    const targetSection = document.getElementById(targetId);

                    if (targetSection) {
                        window.scrollTo({
                            top: targetSection.offsetTop - 60, // Adjust for the fixed navbar height
                            behavior: 'smooth',
                        });
                    }
                });
            }
        });
    </script>
</body>
</html>
