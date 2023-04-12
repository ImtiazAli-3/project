<!-- This code is used to sign the user up to website, it uses the functions in functions.php
    to insert the information into the database, creating a new user -->
<?php 

if(isset($_POST["submit"])){
    
    $uid = $_POST['uid'];
    $fname = $_POST['fname'];
    $sname = $_POST['sname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $pwdRepeat = $_POST['pwdrepeat'];
    
    require_once 'db.php';
    require_once 'functions.php';
    
    if(emptyInputSignup($uid,$fname,$sname,$phone,$email,$pwd,$pwdRepeat)!== false){
        header("location: ../login.php?error=emptyinput");
        exit();
    }   
    if(invalidEmail($email)!== false){
        header("location: ../login.php?error=invalidemail");
        exit();
    }
    
    if(pwdMatch($pwd,$pwdRepeat)!== false){
        header("location: ../login.php?error=passwordsdontmatch");
        exit();
    }    
    if(emailExists($con,$email,$uid)!== false){
        header("location: ../login.php?error=emailexists");
        exit();
    }    
    
    createUser($con,$uid,$fname,$sname,$phone,$email,$pwd);
    
}else{
    header("location: ../adbs959/login.php");
    exit();
}
