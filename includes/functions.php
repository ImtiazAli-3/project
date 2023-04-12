<?php
//creating all of my function in fucntion.php

//this function is used to detect if there were any fields left empty if the user signed up
//if this was the case, an error message is displayed and the user is prompted to complete it
function emptyInputSignup($uid,$fname,$sname,$phone,$email,$pwd,$pwdRepeat){
    $result;
    if(empty($uid)||empty($fname)||empty($sname)||empty($phone)||empty($email)||empty($pwd)||empty($pwdRepeat)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

//this function uses the built in function filter_var in php to see if the email entered 
//in the forms is a 'proper' email
function invalidEmail($email){
    $result;
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
//this function is used to see if the password that is entered in the field 'repeat password'
//is the same as the password already entered
function pwdMatch($pwd,$pwdRepeat){
    $result;
    if($pwd !== $pwdRepeat){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
//this function is used to find out whether the email is already registered in the database or not
function emailExists($con,$email,$uid){
    $sql = "SELECT * FROM user WHERE userEmail=? OR userUID=?;";
    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../login.php?error=stmtfail");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"ss",$email,$uid);
    mysqli_stmt_execute($stmt);
    
    $resultData = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }
    
    mysqli_stmt_close($stmt);

}
//this function inserts the values entered into the form, into the table in the database,
//thus creating a new 'user'
function createUser($con,$uid,$fname,$sname,$phone,$email,$pwd){
    $sql = "INSERT INTO user(userUID,userFname,userSname,userPhone,userEmail,userPassword) VALUES (?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../login.php?error=stmtfail");
        exit();
    }
    
    $hashedpwd = password_hash($pwd,PASSWORD_DEFAULT);
    
    mysqli_stmt_bind_param($stmt,"ssssss",$uid,$fname,$sname,$phone,$email,$hashedpwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
    header("location: ../login.php?error=none");
    exit();

}
//function created to see if any empty fields are left in the login form
function emptyInputLogin($email,$pwd){
    $result;
    if(empty($email)||empty($pwd)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
//this function is responsible for logging the user into the website
//it checks if the email entered is already in the database or not,
//it also checks the password entered is the same as the one entered 
//when they signed up by using the password_verify function
//if both the email and password are a combination in the table, 
//the user is signed in and a session is created
function LoginUser($con,$email,$uid,$pwd){
    $emailExists = emailExists($con,$email,$email);
    
    if($emailExists === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    
    $pwdhashed = $emailExists["userPassword"];
    $checkPass = password_verify($pwd,$pwdhashed);
    
    if($checkPass === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    else if($checkPass === true){
        session_start();
        $_SESSION["userEmail"] = $emailExists["userEmail"];
        header("location: ../calendar.php");
        exit();
    }
}

//this function creates the timeslots available to make appointments 
//in the website, it uses several variables to create a timeslot, 
//and then increments it until the chosen end time
$duration =60;
$break = 10;
$start ="10:00";
$end = "24:00";
function timeslots($duration,$break,$start,$end){
    $start = new DateTime($start);
    $end = new DateTime($end);
    $interval = new DateInterval("PT".$duration."M");
    $breakInterval = new DateInterval("PT".$break."M");
    $slots =array();
    
    for($intStart=$start; $intStart<$end; $intStart->add($interval)->add($breakInterval)){
        $endPeriod = clone $intStart;
        $endPeriod->add($interval);
        if($endPeriod>$end){
            break;
        }
        
        $slots[] = $intStart->format("H:i A")." - ".$endPeriod->format("H:i A");
    }
    return $slots;
}
//this function builds a calendar that the user can book appoinments from
//it uses the current time and date and arrays to create a calendar
//if a day in the calendar is older than the current date, that date 
//becomes unavailable to book
        // Referencing code  
        //*    Title: calendar.php
        //*    Author: https://gist.github.com/agarzon
        //*    Date: 2014
        //*    Availability: https://gist.github.com/agarzon/7089504  
function build_calendar($month, $year){
    
    $mysqli = new mysqli("smcse-stuproj00.city.ac.uk","adbs959","200022830","adbs959");
    //an array is created here to store the days of the week
    $daysOfWeek = array('Sunday', 'Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
    $firstDayOfMonth = mktime(0,0,0,$month,1,$year);
    $numberDays = date("t",$firstDayOfMonth);
    $dateComponents = getdate($firstDayOfMonth);
    $monthName = $dateComponents['month'];
    $week = $dateComponents['wday'];
    //added this section of code, this section of code is used to 
    //change the date of the calendar, making it possible to 
    //book appointments months in advance
    //it uses the php function date,mktime and increments or 
    //decrements depending on which button is pressed
    $dateToday = date('Y-m-d');
    $calendar = "<center>$monthName $year</center>";
    $prev_month = date('m',mktime(0,0,0,$month-1,1,$year));
    $prev_year = date('Y',mktime(0,0,0,$month-1,1,$year));
    $next_month = date('m',mktime(0,0,0,$month+1,1,$year));
    $next_year = date('Y',mktime(0,0,0,$month+1,1,$year));
    $calendar = "<center><h2>$monthName $year</h2>";
    $calendar.= "<a class='btn btn-primary btn-xs' style='color:black;' href='?month=".$prev_month."&year=".$prev_year."'>Prev Month</a>";    
    $calendar.= "<a class='btn btn-primary btn-xs' style='color:black;' href='?month=".date('m')."&year=".date('Y')."'>Current Month</a>";    
    $calendar.= "<a class='btn btn-primary btn-xs' style='color:black;' href='?month=".$next_month."&year=".$next_year."'>Next Month</a></center>";
    //
    $calendar.="<br><table class='table table-bordered'>";
    $calendar.="<tr>";
    foreach($daysOfWeek as $day){
        $calendar.="<th class='header'>$day</th>";
    }
    $calendar.="</tr><tr>";
    $currentDay=1;
    if($week>0){
        for($k=0;$k<$week; $k++){
            $calendar.="<td class='empty'></td>";
        }
    }
    $month = str_pad($month,2,"0",STR_PAD_LEFT);
    while($currentDay<=$numberDays){
        if($week ==7){
            $week = 0;
            $calendar.="</tr><tr>";
        }
        $currentDayRel =str_pad($currentDay,2,"0",STR_PAD_LEFT);
        $date ="$year-$month-$currentDayRel";
        //added section
        //this section of code is added to detect whether a date on 
        //the calendar is an old date. If the date is old, i.e
        // 10/12/2020, then it would become unavailable to book
        //furthermore you can only book an appointment if you are
        //logged in, if you are not logged in, you are sent to signup
        //to create an account
        $dayName = strtolower(date("l",strtotime($date)));
        $today = $date==date('Y-m-d')?'today':'' ;
         if($date<date('Y-m-d')){
             $calendar.="<td><h4>$currentDay</h4> <button class='btn btn-danger btn-xs'>N/A</button>";
         }else{
             if(isset($_SESSION['userEmail'])){
                $calendar.="<td class='$today'><h4>$currentDay</h4><a href='book.php?date=".$date."' class='btn btn-success'>Book</a>";
             }else{
                $calendar.="<td class='$today'><h4>$currentDay</h4><a href='../adbs959/login.php' class='btn btn-success'>Book</a>";
             }
         }
        //
        $currentDay++;
        $week++;
        
    }
    if($week<7){
        $remainingDays=7-$week;
        for($i=0;$i<$remainingDays;$i++){
            $calendar.="<td class='empty'></td>";
        }
    }
    $calendar.="</tr></table>";
    
    
        return $calendar;
}
