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
            <h2>
                <hr>About Us
                <hr>
            </h2>
            <p> This website is designed to bridge the gap between students in search of suitable housing and owners looking for dependable tenants. Our mission is to create a transparent, convenient platform for both parties, ensuring a smooth and stress-free experience. Whether you're a student seeking the perfect boarding house that fits your lifestyle and budget or a young professional in need of a vibrant social hub, we've got a variety of options for you. Our platform connects boarders with trusted owners, facilitating a seamless booking experience with ease.

                We strive to make the process of finding a home simple and efficient, offering a wide range of choices to match individual needs. Whether you're looking for a quiet study environment as a student or something more energetic and community-driven, our platform caters to all. By connecting reliable tenants with trusted owners, we ensure that every user can find the ideal boarding house without unnecessary hassle. </p>
        </div>
    </section>
    <section id="services" class="services-section">
        <div class="container">
            <h2>
                <hr>Our Services
                <hr>
            </h2>
            <div class="service-cards">
                <div class="service-card">
                    <h3>Direct Booking
                    </h3>
                    <p>Secure your accommodation instantly with our hassle-free booking system. Easily find the perfect place by filtering results based on your specific needs and preferences.</p>
                </div>
                <div class="service-card">
                    <h3> Personalized Search</h3>
                    <p> Tailor your search to match your preferences. Filter listings to find the ideal accommodation that fits your lifestyle and requirements.</p>
                </div>
                <div class="service-card">
                    <h3>Extensive Listings</h3>
                    <p>Explore a broad range of boarding houses located near your university. Our extensive listings ensure you can find the perfect fit for your needs.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section id="contact" class="contact-section">
        <div class="container">
            <h2>
                <hr>Contact Us
                <hr>
            </h2>
            <p>If you have any questions, comments, or would like to learn more about our services, please don’t hesitate to get in touch with us. We’re committed to providing you with all the information you need and assisting you throughout the entire process. Whether you need clarification on our platform, have specific concerns, or want to explore more about how we can help you find the ideal boarding house, we’re here for you.

                Feel free to reach out to us anytime via email at staysabra@gmail.com or give us a call at +94 455666236. Our team is always ready to assist, and we look forward to connecting with you and helping you with any inquiries you might have!</p>
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