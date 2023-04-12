<!-- This page is used to book the appointments. After the user chooses a valid date, 
    they are given a choice of several timeslots created using a function in function.php
    Previously booked timeslots are also shown as unavailable and will be indicated -->

<?php
$active='Book';
include_once("includes/header.php");
//using prepared statements rather than sql statements for several reasons
//Using prepared statements provide some extra security in my website
//these can stop any potential attacks on the website that may attempt 
//to change my code
//also using prepared statements is generaly since the preparation for
//the execution is already done and does not need to be completed again
$mysqli = new mysqli("smcse-stuproj00.city.ac.uk","adbs959","200022830","adbs959");
if(isset($_GET['date'])){
    $date = $_GET['date'];
    $stmt = $mysqli->prepare('SELECT * FROM booking WHERE date=?');
    $stmt->bind_param('s',$date);
    $bookings=array();
    if($stmt->execute()){
        $result=$stmt->get_result();
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                $bookings[]=$row['timeslot'];
            }
            $stmt->close();
        }
    }
}
if(isset($_POST['submit'])){
    if(isset($_SESSION['userEmail'])){
        $email = $_SESSION['userEmail'];
    }
    //pulls the timeslot from the form
    $timeslot = $_POST['timeslot'];
    $stmt = $mysqli->prepare("select * from booking where date = ? AND timeslot = ?");
    $stmt->bind_param('ss', $date, $timeslot);
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            $msg = "<div class='alert alert-danger'>This appointment has already been booked</div>";
        }else{
            $stmt = $mysqli->prepare("INSERT INTO booking (timeslot, email, date) VALUES (?,?,?)");
            $stmt->bind_param('sss', $timeslot, $email, $date);
            $stmt->execute();
            $msg = "<div class='alert alert-success'>You have successfully booked your appointment</div>";
            $bookings[] = $timeslot;
            $stmt->close();
            $mysqli->close();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <div class="container">
        <h3 class="text-center">Appointments available for: <?php echo date('m/d/Y', strtotime($date)); ?></h3>
        <hr>
        <div class="row">
            <div class="col-xl-12">
                <?php echo(isset($msg))?$msg:""; ?>
            </div>
            <?php $timeslots = timeslots($duration, $break, $start, $end); 
            foreach($timeslots as $ts){ ?>
            <div class="col-xl-3">
                <div class="form-group">
                    <?php if(in_array($ts, $bookings)){ ?>
                    <button class="btn btn-danger" style="cursor:not-allowed;" title="Slot currently booked"><?php echo $ts; ?></button>
                    <?php }else{ ?>
                    <button class="btn btn-success book" title="Slot available" data-timeslot="<?php echo $ts; ?>"><?php echo $ts; ?></button>
                    <?php }  ?>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

        <!-- Referencing code  
        *    Title: Bootstrap Modal Plugin
        *    Author: W3Schools.com
        *    Date: 2020
        *    Availability: https://www.w3schools.com/howto/howto_css_modals.asp 
        --> 
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-12">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Time: </label>
                                    <input type="text" readonly name="timeslot" id="timeslot" class="form-control">
                                </div>
                                <div class="form-group" align="center">
                                    <button class="btn btn-primary" type="submit" name="submit" style="color:black;">Request Appointment</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- javascript for the modal box -->
    <script>
        $(".book").click(function() {
            var timeslot = $(this).attr('data-timeslot');
            $("#slot").html(timeslot);
            $("#timeslot").val(timeslot);
            $("#myModal").modal("show");
        });

    </script>
    <!-- javascript for the modal box -->
</body>

</html>
<?php
include_once("includes/footer.php");
?>
