<!-- An about me page, it contains an image carousel created using bootstrap -->
<?php 
    $active='About';
    include("includes/header.php");
?>
<div id="content">
    <div class="container">
        <div class="col-xl-12 col-lg-12 col-sm-12 col-xs-12 aboutinfo" align="center">
            <h1>About Us</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam bibendum, odio quis commodo sodales, orci est lacinia turpis, sed eleifend ligula tellus id nisl. In elementum sed lorem pulvinar vulputate. Aliquam in ex accumsan quam consequat tincidunt. Nam interdum est at sem commodo sagittis. Sed eu diam condimentum, pulvinar risus porta, bibendum lorem. Proin mollis, justo sit amet accumsan ullamcorper, lectus tortor euismod arcu, vitae dignissim nisi neque id urna. Etiam fringilla tellus nec justo facilisis, at pellentesque tortor mollis. Ut aliquet nibh ut semper sollicitudin.</p>
        </div>
    </div>

    <!-- Referencing code from https://www.w3schools.com/bootstrap/bootstrap_carousel.asp -->
    <div id="slider">
        <div class="carousel slide col-xl-12" id="myCarousel" data-ride="carousel">
            <ol class="carousel-indicators">
                <li class="active" data-target="#myCarousel" data-slide-to="0"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <!-- Referencing code  
        *    Title: Bootstrap Carousel Plugin
        *    Author: W3Schools.com
        *    Date: 2020
        *    Availability:://www.w3schools.com/bootstrap/bootstrap_carousel.asp 
-->

            <div class="carousel-inner col-xl-12">
                <?php 
                //images are pulled from a database in phpmyadmin
                //References for 3 images
                //https://www.esquire.com/style/grooming/a56434/better-barbershop-trip-haircut/
                //https://www.huckmag.com/perspectives/reportage-2/black-british-barbershop-experience/
                //https://urbanoak.co/hair/singapores-best-barbershops-men-care-grooming/
                   $get_slides = "select * from slider LIMIT 0,1";
                   $run_slides = mysqli_query($con,$get_slides);
                   while($row_slides=mysqli_fetch_array($run_slides)){
                       $slide_image = $row_slides['slideimage'];
                       $slide_url = $row_slides['slideurl'];
                       echo"
                       <div class='item active'>
                           <a href='$slide_url'>
                                <img src='../adbs959/$slide_image'>
                           </a>
                       </div>
                       "; 
                   }
                   $get_slides = "select * from slider LIMIT 1,3";
                   $run_slides = mysqli_query($con,$get_slides);
                   while($row_slides=mysqli_fetch_array($run_slides)){
                       $slide_image = $row_slides['slideimage'];
                       $slide_url = $row_slides['slideurl'];
                       echo "
                       <div class='item'>
                           <a href='$slide_url'>
                                <img src='../adbs959/$slide_image'>
                           </a>
                       </div>
                       "; 
                   }
                   ?>
            </div>

            <!-- Referencing code from https://www.w3schools.com/bootstrap/bootstrap_carousel.asp -->
            <a href="#myCarousel" class="left carousel-control" data-slide="prev" style="background:none">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a href="#myCarousel" class="right carousel-control" data-slide="next" style="background:none">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
            <!-- Referencing code from https://www.w3schools.com/bootstrap/bootstrap_carousel.asp -->

        </div>
    </div>
</div>
<div class="container"></div>
<br>
<?php 
    include("includes/footer.php");
    ?>
<script src="js/jquery-331.min.js"></script>
<script src="js/bootstrap-337.min.js"></script>
