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
                <li><a href="#services">Services</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
                <li>
                    <button onclick="location.href='login.html'"><a>Sign in</a></button>
                </li>
                <li>
                    <button onclick="location.href='customerRegister.php'"><a>Sign up</a></button>
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
            <h2>About Us</h2>
            <p> This website aims to bridge the gap between students seeking suitable housing and owners looking for reliable tenants. 
                We strive to create a transparent and convenient platform for both parties, facilitating a smooth and stress-free experience.

Find the ideal boarding house to match your lifestyle and budget. Whether you're a student 
seeking a quiet study environment or a young professional looking for a vibrant social hub, we've got you covered.
 Our platform connects boarders with trusted owners, offering a seamless booking experience and a wide range of options to choose from. </p>
        </div>
    </section>
    <section id="services" class="services-section">
        <div class="container">
            <h2>Our Services</h2>
            <div class="service-cards">
                <div class="service-card">
                    <h3>Fast Charging</h3>
                    <p>Get back on the road quickly with our fast-charging solutions.</p>
                </div>
                <div class="service-card">
                    <h3>Home Installation</h3>
                    <p>Convenient home charging station installation services.</p>
                </div>
                <div class="service-card">
                    <h3>Network Access</h3>
                    <p>Access our vast network of charging stations nationwide.</p>
                </div>
            </div>
        </div>
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
