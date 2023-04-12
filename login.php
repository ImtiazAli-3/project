<!-- This page is the login page. It contains 2 forms, one for signing up 
    and another for logging in. I felt this made the website look cleaner, 
    without having any unneccessary wasted space -->
<?php 
    $active='';
    include_once("includes/header.php");

?>
<div id="content">

    <div class="container">
        <div class="col-xl-6">
            <div class="box">
                <div class="box-header">
                    <h4>Sign up to start booking your appointments</h4>
                    <!-- form action links to a separate file with php code only, it uses the inputs from the 
                        form and then uses it to create a user in the database. The 'name' is used to 
                        reference them in the php code -->
                    <form action="includes/signup.inc.php" method="post" style="width:300px;">
                        <div class="form-group">
                            <input type="text" name="uid" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <input type="text" name="fname" class="form-control" placeholder="First name">
                        </div>
                        <div class="form-group">
                            <input type="text" name="sname" class="form-control" placeholder="Suname">
                        </div>
                        <div class="form-group">
                            <input type="tel" name="phone" class="form-control" placeholder="Phone Number">
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="password" name="pwd" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <input type="password" name="pwdrepeat" class="form-control" placeholder="Repeat Password">
                        </div>
                        <div class="form-group" align="center">
                            <button type="submit" name="submit">Sign up</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <h4>Login to make and view appointments</h4>
            <div class="box">
                <div class="box-header">
                    <form action="includes/login.inc.php" method="post" style="width:300px;">
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="Username/Email">
                        </div>
                        <div class="form-group">
                            <input type="password" name="pwd" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group" align="center">
                            <button type="submit" name="submit">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- When signing up or logging in, the user may encounter problems, such as the email already 
    is already in use, or the password is wrong etc. The error is fetched from the other files
    and is used to check if any of theses problems have occured -->
<?php
    if(isset($_GET["error"])){?>
<div class="container">
    <div class="col-xl-12">
        <?php
        if($_GET["error"] == "emptyinput"){
            echo"<h4>Fill all fields</h4>";
        }else if($_GET["error"] == "wronglogin"){
            echo"<h4>Incorrect Login info</h4>";
        }else if($_GET["error"] == "invalidemail"){
            echo"<h4>Choose a proper Email</h4>";
        }else if($_GET["error"] == "passwordsdontmatch"){
            echo"<h4>Passwords dont match</h4>";
        }else if($_GET["error"] == "stmtfail"){
            echo"<h4>Something went wrong</h4>";
        }else if($_GET["error"] == "emailexists"){
            echo"<h4>Username/Email already exists</h4>";
        }else if($_GET["error"] == "none"){
            echo"<h4>Signed up successfully</h4>";
        }?>
    </div>
</div>
<?php } ?>

<?php 
    include("includes/footer.php");
    ?>
<script src="js/jquery-331.min.js"></script>
<script src="js/bootstrap-337.min.js"></script>
