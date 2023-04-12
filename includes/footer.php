<!-- Created a footer -->
<!-- The footer contains some more links to other parts of the website
    and contains links to social media platforms -->

<div id="footer" style="z-index:1">
    <div class="container">
        <div class="row">
            <div class="col-xl-4">
                <h4 style="color: white;">Help and Customer Service</h4>
                <ul>
                    <li><a href="../adbs959/contact.php">Contact Us</a></li>
                    <li><a href="../adbs959/about.php">About Us</a></li>
                </ul>
                <hr class="hidden-md hidden-lg hidden-xl">
            </div>
            <div class="col-xl-4">
                <h4 style="color: white;">Helpful Links</h4>
                <ul>
                    <?php 
                           if(!isset($_SESSION['userEmail'])){
                               echo"<li><a href='../adbs959/login.php'>Login</a></li>";
                           }else{
                              echo"<li><a href='../adbs959/account.php'>My Account</a></li>"; 
                           }
                           ?>
                    <li><a href="../adbs959/calendar.php">Book an appointment</a></li><!-- Booking Page-->
                </ul>
                <hr class="hidden-md hidden-lg hidden-xl">
            </div>
            <div class="col-xl-4">
                <h4 style="color: white;">Follow Us On</h4>
                <br>
                <p class="social">
                    <a href="https://www.instagram.com" style="font-size:45px;" class="fa fa-instagram"></a>
                    <a href="https://www.twitter.com" style="font-size:45px;" class="fa fa-twitter"></a>
                    <a href="https://www.facebook.com" style="font-size:45px;" class="fa fa-facebook"></a>
                </p>
            </div>
        </div>
        <br>
    </div>
    <br>
    <div class="container col-xs-12 col-xl-12" style="background-color:yellow">
        <!-- required disclaimer -->
        <div class="row" style="text-align:center;font-family:sans-serif">
            <h5 style="font-weight:bold">DISCLAIMER:</h5>
            <p style="margin: 5px 10px;">
                Banging Barbers is a fictitious brand created solely for the purpose of the
                assessment of IN1010 module at City, University of London, UK. All products and
                people associated with Banging Barbers are also fictitious. Any resemblance to real
                brands, products, or people is purely coincidental. Information provided about the
                product is also fictitious and should not be construed to be representative of actual
                products on the market in a similar product category.</p>
            <h5 style="font-weight:bold;">Copyright © 2021 Banging Barbers</h5>
        </div>
    </div>
</div>
