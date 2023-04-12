<?php
$active='Book';
include_once("includes/header.php");
?>
<!-- This page displays the calendar, it uses the function made in function.php to create a calendar -->

<html>

<head>
    <link rel="stylesheet" href="adbs959/styles/bootstrap-337.min.css">
</head>

<body>
    <div class="container">
        <div class="col-xl-12 col-xs-12">
            <div class="row">
                <?php
            $dateComponents = getdate();
            if(isset($_GET['month'])&& isset ($_GET['year'])){
                $month = $_GET['month'];
                $year = $_GET['year'];
            }else{
                $month = $dateComponents['mon'];
                $year = $dateComponents['year'];
            }
            echo build_calendar($month, $year);
            ?>
            </div>
        </div>
    </div>
    <style>
        @media only screen and (max-width: 760px),
        (min-device-width: 802px) and (max-device-width: 1020px) {

            table,
            thead,
            tbody,
            th,
            td,
            tr {
                display: block;

            }

            .empty {
                display: none;
            }

            th {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            tr {
                border: 1px solid black;
                padding-left: 40%;
            }

            td {
                border: none;
                border-bottom: 1px solid #eee;
                position: relative;
                padding-left: 50%;
            }

            td:nth-of-type(1):before {
                content: "Sunday";
            }

            td:nth-of-type(2):before {
                content: "Monday";
            }

            td:nth-of-type(3):before {
                content: "Tuesday";
            }

            td:nth-of-type(4):before {
                content: "Wednesday";
            }

            td:nth-of-type(5):before {
                content: "Thursday";
            }

            td:nth-of-type(6):before {
                content: "Friday";
            }

            td:nth-of-type(7):before {
                content: "Saturday";
            }
        }

    </style>
</body>

</html>
<?php
include_once("includes/footer.php");
?>
