<!-- The contact page contains links to social media sites where the user can supposedly 
    contact them, I also added in a form that users may also use, I have not implented its
    proper functionality however-->
<?php 
    
    $active='Contact';
    include("includes/header.php");
    require("includes/db.php");

?>
<div id="content">
    <div class="container">
        <center>
            <h2> Contact Us</h2>
            <p class="text-muted">
                If you have any questions feel free to contact us.
            </p>
        </center>
        <br>
        <div class="col-xl-6" align="">
            <p style="color:black">You can contact us on <a href="https://www.facebook.com"><b>Facebook</b></a>, <a href="https://www.instagram.com"><b>Instagram</b></a>, <a href="https://www.twitter.com"><b>Twitter</b></a> or by using the form on this page. We aim to answer your questions as soon as possible. <br>To book an appointment, <a href="../adbs959/calendar.php"><b>click here</b></a>.<br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam bibendum, odio quis commodo sodales, orci est lacinia turpis, sed eleifend ligula tellus id nisl. In elementum sed lorem pulvinar vulputate. Aliquam in ex accumsan quam consequat tincidunt. Nam interdum est at sem commodo sagittis. Sed eu diam condimentum, pulvinar risus porta, bibendum lorem. Proin mollis, justo sit amet accumsan ullamcorper, lectus tortor euismod arcu, vitae dignissim nisi neque id urna. Etiam fringilla tellus nec justo facilisis, at pellentesque tortor mollis. Ut aliquet nibh ut semper sollicitudin.</p>
        </div>
        <br>
        <div class="col-xl-6">
            <div class="box">
                <div class="box-header">
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label>Question</label>
                            <textarea name="message" class="form-control"></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="submit" class="btn btn-primary">
                                <i class="fa fa-user-md"></i> Send Message
                            </button>
                        </div>
                    </form>
                    <?php 
                       if(isset($_POST['submit'])){
                           echo "<h4 align='center'>Thank you for your message, we aim to reply ASAP</h4>";
                       }
                       ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
    include("includes/footer.php");
    ?>
<script src="js/jquery-331.min.js"></script>
<script src="js/bootstrap-337.min.js"></script>
<style>
    a {
        color: black;
    }

</style>
