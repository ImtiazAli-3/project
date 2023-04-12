<?php 
//this is the header.php
//this file is included in every other file

//the only declaration of the session is in the header,
//since this is available on every page, the session is 
//available for every page
session_start();
include("db.php");
include("functions.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Banging Barbers</title>
    <link rel="shortcut icon" type="image/png" href="logo.png">
    <link rel="stylesheet" href="../adbs959/styles/reset.css">
        <!-- Referencing code  
        *    Title: Bootstrap 
        *    Author: blog.getbootstrap.com
        *    Date: 2018 (Bootstrap was already downloaded into my pc from a previous project in 2018-2020)
        *    Availability: https://blog.getbootstrap.com/2016/07/25/bootstrap-3-3-7-released/
        --> 
    <link rel="stylesheet" href="../adbs959/styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="../adbs959/font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../adbs959/styles/style.css">
</head>

<body>
    <div id="top">
        <div class="container">
            <div class="col-xl-6 offer">
                <a href="#" class="btn btn-success btn-sm">
                    <!-- this code chunk is created to see whether or not the user is logged in or not
                        if the user is logged, a message will be shown to show that they have logged in -->
                    <?php 
                   if(!isset($_SESSION['userEmail'])){
                       echo "Welcome: Guest";
                   }else{
                       
                       echo "Welcome: " . $_SESSION['userEmail'] . "";
                   } 
                   ?>
                </a>
            </div>
            <div class="col-xl-6">
                <ul class="menu">
                    <li>
                        <?php 
                           if(isset($_SESSION['userEmail'])){
                                echo "<a href='../adbs959/account.php'> My Account </a>";
                               }else{
                                echo " <a href='../adbs959/login.php'> My Account </a> ";
                               }
                           ?>
                    </li>
                    <li>
                        <?php 
                           if(!isset($_SESSION['userEmail'])){
                                echo "<a href='../adbs959/login.php'> Login </a>";
                               }else{
                                echo " <a href='../adbs959/includes/logout.inc.php'> Log Out </a> ";
                               }
                           ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- in this section of code I have created the navigation bar, this contains the logo and links to other parts of the website -->
    <div id="navbar" class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <a href="index.php" class="navbar-brand home">
                    <img src="logo.png" alt="logo" class="hidden-xs hidden-sm" style="width:60px;margin: -2.5px 0 0 -100px;">
                    <img src="logo.png" alt="logo-small" class="hidden-xl hidden-lg" style="width:60px;">
                </a>
                <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                    <span class="sr-only">Toggle Navigation</span>
                    <i class="fa fa-align-justify"></i>
                </button>
            </div>
            <div class="navbar-collapse collapse" id="navigation">
                <div class="padding-nav">
                    <ul class="nav navbar-nav left">
                        <li class="<?php if($active=='Home') echo"active"; ?>">
                            <a href="../adbs959/index.php">Home</a>
                        </li>
                        <li class="<?php if($active=='About') echo"active"; ?>">
                            <a href="../adbs959/about.php">About</a>
                        </li>
                        <li class="<?php if($active=='Book') echo"active"; ?>">
                            <a href="../adbs959/calendar.php">Book</a>
                        </li>
                        <li class="<?php if($active=='Contact') echo"active"; ?>">
                            <a href="../adbs959/contact.php">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Referencing code from https://www.w3schools.com/howto/howto_js_scroll_to_top.asp 
        This code is used to create a button that allows the user to get back to the top 
        of the website
        Referencing code  
        //*    Title: Scroll Back To Top Button
        //*    Author: W3Schools
        //*    Date: 2020
        //*    Availability: https://www.w3schools.com/howto/howto_js_scroll_to_top.asp  -->
    <button onclick="topFunction()" id="topbtn" title="Back to top">Top</button>
    <script>
        mybutton = document.getElementById("topbtn");
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 450 || document.documentElement.scrollTop > 450) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        function topFunction() {
            document.documentElement.scrollTop = 0;
        }

    </script>
