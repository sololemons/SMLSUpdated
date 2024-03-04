<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "database.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <?php if (isset($user)): ?>
      
        <?php include 'Dashboards.html'; ?>


        <a href="logout.php">Log out</a>
     
  
    <?php else: ?>
        
        <div class="navbar" id="navbar">
        <div class="logo">
            DigiClean
        </div>
        <div class="menu">
            <ul>
                <li><a href="index.php" class="active">Home</a></li>
                <li><a href="About.html">About</a></li>
                <li><a href="Contacts.html">Contacts</a></li>
                <li><a href="login.php">Log In</a></li>
                <li><a href="signup.html">Sign Up</a></li>
            </ul>
        </div>
    </div>
    <section>
        <div class="hero" id="Home">
            <div class="spacer-vertical"></div>
            <div class="welcome">
                Welcome to DigiClean laundry Service
            </div>
            <div class="sub">
                Your digital solution for laundry services. <br>
                 Convenient Fast And Reliable
            </div>
            <div class="spacer-vertical abt">
                <button class="btn btn-primary" type="button"><a href="About.html">Learn More</a></button>
            </div>
        </div>
        <div class="About flex-align">
            <div class="left internal">
                <h1>About DigiClean</h1>
                DigiClean is revolutionizing the laundry industry by providing a digital
                 platform that connects customers with laundry service providers. Our 
                 user-friendly interface allows customers to easily place cleaning orders,
                  make payments upon delivery, and rate our services for a seamless experience.
                   Both customers and providers can register accounts to access our convenient 
                   and efficient laundry solutions.
            </div>
            <div class="right internal">
                <img src="images/LAUNDRY.jpg">
            </div>
        </div>
        <div class="services flex-align">
            <div class="left title">
                <h1>Our Services</h1>
            </div>
            <div class="right content">
                Welcome to DigiClean, your go-to digital laundry service 
                provider. We offer a seamless and convenient way for you 
                to connect with top-notch laundry services in your area.
                 Whether you need a professional dry cleaning service or
                  smart laundry solutions, we've got you covered. With
                   our easy-to-use platform, you can place your cleaning
                    order, make secure payments upon delivery, and even 
                    leave ratings and feedback for the services you
                     receive. Join our community today, and experience
                      the future of laundry services at your fingertips.
            </div>
        </div>
        <div class="smart flex-align">
            <div class="image left">
                <img src="images/LAUNDRY.jpg">
            </div>
            <div class="content right">
                <h2>Smart Laundry Solutions</h2>
                <p>
                    Our professional dry cleaning service ensures that your
                     garments are handled with the utmost care and expertise.
                      Using state-of-the-art equipment and premium cleaning 
                      products, we guarantee a thorough and meticulous cleaning 
                      process, leaving your clothes looking and feeling brand new.
                       Trust DigiClean for all your dry cleaning needs, and enjoy 
                       unparalleled quality and convenience in every order.
                </p>
            </div>
        </div>
        <div class="profession flex-align">
            <div class="left content">
                <h2>Professional Dry Cleaning</h2>
                <p>
                    Discover our smart laundry solutions designed to simplify your
                     laundry routine. From wash-and-fold services to special garment
                      treatments, we combine cutting-edge technology with exceptional
                       attention to detail, providing you with a revolutionary way to
                        care for your clothes. With DigiClean, you'll never have to
                         compromise on cleanliness, efficiency, or convenience. Experience
                          the future of laundry management with us.
                </p>
            </div>
            <div class="right image">
                <img src="images/pm_1704150504794_cmp.jpg">
            </div>
        </div>
        <div class="addition">
            <div class="title">
                <h1>
                    Additional Services
                </h1>
            </div>
            <div class="container flex-align">
                <div class="content left">
                    <img src="images/award.svg">
                    <h3>Premium Dry-Cleaning</h3>
                    <p>The first additional service we offer is our
                         premium dry-cleaning service, perfect for
                          delicate fabrics and garments that require
                           extra care and attention. Let us take care
                            of your special items with the utmost precision
                             and expertise.</p>
                </div>
                <div class="content center">
                    <img src="images/award.svg">
                    <h3>Express Cleaning</h3>
                    <p>For our second additional service, we offer a
                         special express cleaning option for those in
                          a hurry. Your clothes will be cleaned and
                           delivered in record time, ensuring you never
                            have to wait long for your favorite outfit.</p>
                </div>
                <div class="content right">
                    <img src="images/award.svg">
                    <h3>Eco-Friendly Cleaning</h3>
                    <p>Our third additional service is our eco-friendly
                         cleaning option, using only environmentally 
                         friendly detergents and processes to ensure
                          minimal impact on the environment while
                           delivering top-quality cleaning results.</p>
                </div>
            </div>
        </div>
        <div class="faq">
            <div class="title">
                <h1>FAQ's</h1>
            </div>
            <div class="container flex-align">
                <div class="content left">
                    <div class="top holder">
                        <h3 class="question">
                            Do you offer same-day laundry service?
                        </h3>
                        <p class="answer">Yes, we offer same-day laundry service for your convenience.</p>
                    </div>
                    <div class="bottom holder">
                        <h3 class="question">
                            How do I track my laundry order?
                        </h3>
                        <p class="answer">
                            Our laundry service providers are carefully vetted to ensure high quality and reliability.
                        </p>
                    </div>
                </div>
                <div class="content right">
                    <div class="top holder">
                        <h3 class="question">
                            Can I trust the quality of the laundry service providers?
                        </h3>
                        <p class="answer">
                            You can easily track the status of your laundry order through our online platform.
                        </p>
                    </div>
                    <div class="bottom holder">
                        <h3 class="question">
                            How does the payment process work?
                        </h3>
                        <p class="answer">
                            We provide a seamless and secure payment process for your laundry orders.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="contact">
            <h1>Contact us today.</h1>
            <p>Get in touch with DigiClean today to experience the convenience of digital
                 laundry services. With our platform, you can easily connect with
                  laundry service providers in your area, place cleaning orders, make
                   payments upon delivery, and provide feedback on the service received
                   . Both customers and providers can register accounts to streamline
                    the process. Contact us now to simplify your laundry experience!</p>
                    <button class="btn btn-primary"><a href="Contacts.html">Reach Out</a></button>
        </div>
    </section>
        
        
    <?php endif; ?>
    
</body>
</html>
    
    
    
    
    
    
    
    
    
    
    