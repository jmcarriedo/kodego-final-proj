<?php
require('server.php');
require('session.php');

if ($_SESSION['accessRole'] == 'admin') {
    $welcome = "Welcome " . $_SESSION['accessRole'];
    $isAdmin = true;
} else {
    $welcome = "Welcome " . $_SESSION['accessRole'];
    $isAdmin = false;
}
// $user_id = $_SESSION['user_id'];
// $query = "SELECT users.user_id, customers.user_id, customers.firstName, customers.middleName, customers.lastName, customers.address
// FROM users JOIN customers on customers.user_id = users.user_id where customers.user_id=$user_id";
// $query = "SELECT * FROM bookings";
// $sql = mysqli_query($connection, $query);
// $row = mysqli_fetch_assoc($sql);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Booking Date</title>

    <!-- Fontfaces CSS-->
    <link href="dashboardassets/css/font-face.css" rel="stylesheet" media="all">
    <link href="dashboardassets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="dashboardassets/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="dashboardassets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="dashboardassets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="dashboardassets/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="dashboardassets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="dashboardassets/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="dashboardassets/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="dashboardassets/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="dashboardassets/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="dashboardassets/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <link href="dashboardassets/css/theme.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <?php include '_headerMobile.php'; ?>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <?php include '_sidebar.php'; ?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <?php include '_headerDesktop.php'; ?>

            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div div class="container-fluid">
                        <?php
                        if ($isAdmin) {
                            include 'bookingPerDay.php';
                        }
                        // } else {
                        //     include 'bookingPerDay.php';
                        // }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTAINER-->





        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->


        <!-- Jquery JS
        <script src="dashboardassets/vendor/jquery-3.2.1.min.js"></script> -->
        <!-- Bootstrap JS -->
        <script src="dashboardassets/vendor/bootstrap-4.1/popper.min.js"></script>
        <script src="dashboardassets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
        <!-- Vendor JS -->
        <script src="dashboardassets/vendor/slick/slick.min.js">
        </script>
        <script src="dashboardassets/vendor/wow/wow.min.js"></script>
        <script src="dashboardassets/vendor/animsition/animsition.min.js"></script>
        <script src="dashboardassets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
        </script>
        <script src="dashboardassets/vendor/counter-up/jquery.waypoints.min.js"></script>
        <script src="dashboardassets/vendor/counter-up/jquery.counterup.min.js">
        </script>
        <script src="dashboardassets/vendor/circle-progress/circle-progress.min.js"></script>
        <script src="dashboardassets/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="dashboardassets/vendor/chartjs/Chart.bundle.min.js"></script>
        <script src="dashboardassets/vendor/select2/select2.min.js">
        </script>

        <!-- full calendar requires moment along jquery which is included above -->
        <script src="dashboardassets/vendor/fullcalendar-3.10.0/lib/moment.min.js"></script>
        <script src="dashboardassets/vendor/fullcalendar-3.10.0/fullcalendar.js"></script>

        <!-- Main JS-->
        <script src="dashboardassets/js/main.js"></script>





</body>

</html>