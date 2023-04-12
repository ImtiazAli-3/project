<!-- This code is used to log the user into the website by taking information 
    from the form and using a function that is used to find existing users -->

<?php

if(isset($_POST["submit"])){
    
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    
    require_once("db.php");
    require_once("functions.php");
    
    if(emptyInputLogin($email,$pwd)!== false){
        header("location: ../login.php?error=emptyinput");
        exit();
    }
    //function created in function.php
    loginUser($con,$email,$uid,$pwd);
}
else{
    header("location: ../adbs959/login/php");
    exit();
}
