<!-- Simple home page containing a brief description written in 'lorem ipsum' and a hero image off of the internet -->
<?php 

    $active='Home';
    include_once("includes/header.php");

?>
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-xl-12" align="center">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam bibendum, odio quis commodo sodales, orci est lacinia turpis, sed eleifend ligula tellus id nisl. In elementum sed lorem pulvinar vulputate. Aliquam in ex accumsan quam consequat tincidunt. Nam interdum est at sem commodo sagittis. Sed eu diam condimentum, pulvinar risus porta, bibendum lorem. Proin mollis, justo sit amet accumsan ullamcorper, lectus tortor euismod arcu, vitae dignissim nisi neque id urna. Etiam fringilla tellus nec justo facilisis, at pellentesque tortor mollis. Ut aliquet nibh ut semper sollicitudin.</p>
            </div>
        </div>
        <!-- Referencing Image from https://www.today.com/health/confess-project-how-barber-shops-support-mental-health-t208641 -->
        <img src="images/hero.jpg" style="width:100%" alt="hero-image">
    </div>
</div>

<br>
<?php 
    include("includes/footer.php");
    ?>
<script src="js/jquery-331.min.js"></script>
<script src="js/bootstrap-337.min.js"></script>
