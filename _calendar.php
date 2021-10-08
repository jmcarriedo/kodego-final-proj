<?php

require('server.php');

function build_calendar($month, $year)
{
    $mysqli = new mysqli('localhost', 'root', '', 'hiraya');

    $stmt = $mysqli->prepare("select * from bookings where MONTH(eventDate) = ? AND YEAR(eventDate)=?");

    $stmt->bind_param('ss', $month, $year);
    $bookings = array();
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $bookings[] = $row['eventDate'];
            }
            $stmt->close();
        }
    }
    // Create array containing abbreviations of days of week.
    $daysOfWeek = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');

    // What is the first day of the month in question?
    $firstDayOfMonth = mktime(0,0,0,$month,1,$year);

    // How many days does this month contain?
    $numberDays = date('t', $firstDayOfMonth);

    // Retrieve some information about the first day of the
    // month in question.
    $dateComponents = getdate($firstDayOfMonth);

    // What is the name of the month in question?
    $monthName = $dateComponents['month'];

    // What is the index value (0-6) of the first day of the
    // month in question.
    $dayOfWeek = $dateComponents['wday'];

    // Create the table tag opener and day headers

    $datetoday = date('Y-m-d');
    $calendar = "<table class='table table-bordered'>";
    $calendar .= "<center><h2>$monthName $year</h2>";
    
    //create button to show previous month
    $calendar .= "<a class='btn btn-xs btn-dark' href='?month=".date('m',mktime(0,0,0,$month-1,1,$year))."&year=".date('Y',mktime(0,0,0,$month-1,1,$year))."'><i class='fas fa-arrow-left'></i>  Previous Month</a>";
    
    //create button to show current month
    $calendar .= " <a class='btn btn-xs btn-dark' href='?month=".date('m')."&year=".date('Y')."'><i class='fas fa-arrow-down'></i>  Current Month</a>";

    //create button to show next month
    $calendar .= " <a class='btn btn-xs btn-dark' href='?month=".date('m',mktime(0,0,0,$month+1,1,$year))."&year=".date('Y',mktime(0,0,0,$month+1,1,$year))."'>Next Month <i class='fas fa-arrow-right'></i></a></center><br>";


    $calendar .= "<tr>";

    // Create the calendar headers
    foreach ($daysOfWeek as $day) {
        $calendar.="<th class='header'>$day</th>";
    }

    // Create the rest of the calendar
    // Initiate the day counter, starting with the 1st.

    $currentDay = 1;
    $calendar .= "</tr><tr>";

    // The variable $dayOfWeek is used to
    // ensure that the calendar
    // display consists of exactly 7 columns.

    if($dayOfWeek > 0) {
        for ($k=0; $k<$dayOfWeek; $k++) {
            $calendar .= "<td class='empty'></td>";
        }
    }

    $month = str_pad($month, 2, "0", STR_PAD_LEFT);

    while ($currentDay <= $numberDays) {
        //Seventh column (Saturday) reached. Start a new row.
        if ($dayOfWeek == 7) {
            $dayOfWeek = 0;
            $calendar .= "</tr><tr>";
        }

        $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
        $date = "$year-$month-$currentDayRel";

        $dayname = strtolower(date('l', strtotime($date)));
        $eventNum = 0;
        $today = $date == date('Y-m-d') ? "today" : "";

        if (($date < date('Y-m-d')) && (in_array($date, $bookings))) {
            $calendar .= "<td><h4>$currentDay</h4> <a href='_book.php?date=" . $date . "' class='btn btn-primary btn-xs'>Past Bookings</button>";

        } else if ($date < date('Y-m-d')) {
            $calendar .= "<td><h4>$currentDay</h4> <button class='btn btn-secondary btn-xs'>N/A</button>";

        } else if (in_array($date, $bookings)) {

            $calendar .= "<td class='$today'><h4>$currentDay</h4> <a href='_book.php?date=" . $date . "' class='btn btn-success btn-xs'>Booked</a>";

        } else {
            $calendar .= "<td class='$today'><h4>$currentDay</h4> <button class='btn btn-info btn-xs'>Available</button>";
        }

        $calendar .= "</td>";
        //Increment counters
        $currentDay++;
        $dayOfWeek++;
    }

    //Complete the row of the last week in month, if necessary
    if ($dayOfWeek != 7) {
        $remainingDays=7-$dayOfWeek;
        for ($i = 0; $i < $remainingDays; $i++) {
            $calendar.= "<td></td>";
        }
    }

    $calendar .= "</tr>";
    $calendar .= "</table>";
    return $calendar;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <title>Calendar</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- FullCalendar -->
    <!-- <link href='vendor/fullcalendar-3.10.0/fullcalendar.css' rel='stylesheet' media="all" /> -->

    <!-- Main CSS-->
    <link href="dashboardassets/css/theme.css" rel="stylesheet" media="all">

    <style>
        @media only screen and (max-width: 760px),
        (min-device-width: 802px) and (max-device-width: 1020px) {

            /* Force table to not be like tables anymore */
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

            /* Hide table headers (but not display: none;, for accessibility) */
            th {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            tr {
                border: 2px solid #ccc;
            }

            td {
                /* Behave  like a "row" */
                border: none;
                border-bottom: 1px solid #eee;
                position: relative;
                padding-left: 50%;
            }



            /*
        Label the data
        */
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

        /* Smartphones (portrait and landscape) ----------- */

        @media only screen and (min-device-width: 320px) and (max-device-width: 480px) {
            body {
                padding: 0;
                margin: 0;
            }
        }

        /* iPads (portrait and landscape) ----------- */

        @media only screen and (min-device-width: 802px) and (max-device-width: 1020px) {
            body {
                width: 495px;
            }
        }

        @media (min-width:641px) {
            table {
                table-layout: fixed;
            }

            td {
                width: 33%;
            }
        }

        .row {
            margin-top: 20px;
        }

        .today {
            background: lightgoldenrodyellow;
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 bg-white px-3 py-4">
                <div id="calendar">
                    <?php
                    $dateComponents = getdate();
                    if (isset($_GET['month'])) {
                        $month = $_GET['month'];
                        $year = $_GET['year'];
                    } else {
                        $month = $dateComponents['mon'];
                        $year = $dateComponents['year'];
                    }
                    echo build_calendar($month, $year);
                    ?>
                </div>
            </div>
        </div>
    </div>


</body>

</html>