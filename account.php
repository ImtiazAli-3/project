<!-- This page contains the users appointments if they had made any-->
<?php
include_once('includes/header.php');
?>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <h3>Your current appointments are as follows:</h3>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <?php
                            if(isset($_SESSION['userEmail'])){
                                $email = $_SESSION['userEmail'];
            
                                $get_email = "select * from user where userEmail='$email'";
            
                                $run_email = mysqli_query($con,$get_email);
            
                                $row_email = mysqli_fetch_array($run_email);
            
                                $get_booking = "select * from booking where email='$email'";
            
                                $run_booking = mysqli_query($con,$get_booking);
                        ?>
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while($row_booking = mysqli_fetch_array($run_booking)){
                                    $booking = $row_booking['timeslot'];
                                    $date = $row_booking['date'];
                        ?>
                            <tr>
                                <td><?php echo $date; ?></td>
                                <td><?php echo $booking; ?></td>
                            </tr>
                            <?php }  }?>
                        </tbody>
                    </table>
                </div>
                <h4>To book an appointment <a href="calendar.php">click here</a></h4>
            </div>
        </div>
    </div>
</div>

<?php
include_once('includes/footer.php');
?>
