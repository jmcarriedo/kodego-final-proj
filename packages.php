<?php
    require('session.php');
    require('server.php');

    $user_id = $_SESSION['user_id'];
    $query = "SELECT * FROM customers WHERE user_id='$user_id'";
    $sql = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($sql);
    
    if(isset($_POST['book'])) {
        $customer_id = $_POST['customer_id'];
        $eventName = $_POST['eventName'];
        $eventCategory = $_POST['eventCategory'];
        $eventPackage = $_POST['eventPackage'];
        $eventDate = $_POST['eventDate'];
        $eventTime = $_POST['eventTime'];
        $eventVenue = $_POST['eventVenue'];
        $eventNotes = $_POST['eventNotes'];
       
        $query2 = "INSERT INTO bookings (customer_id, eventName, eventCategory, eventPackage, eventDate, eventTime, eventVenue, eventNotes) VALUES ('$customer_id', '$eventName', '$eventCategory',  '$eventPackage','$eventDate', '$eventTime', '$eventVenue', '$eventNotes')";
        $sql2 = mysqli_query($connection, $query2) OR trigger_error('Query failed ' . $query2);
        echo "<script> alert('Successfully booked!') </script>";
        header('location: ./booking.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Packages</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="dashboardassets/vendor/" rel="stylesheet" media="all">
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

    <!-- Main CSS-->
    <link href="dashboardassets/css/theme.css" rel="stylesheet" media="all">

    <!-- Start of Async Drift Code -->
    <script>
        "use strict";

        ! function() {
            var t = window.driftt = window.drift = window.driftt || [];
            if (!t.init) {
                if (t.invoked) return void(window.console && console.error && console.error("Drift snippet included twice."));
                t.invoked = !0, t.methods = ["identify", "config", "track", "reset", "debug", "show", "ping", "page", "hide", "off", "on"],
                    t.factory = function(e) {
                        return function() {
                            var n = Array.prototype.slice.call(arguments);
                            return n.unshift(e), t.push(n), t;
                        };
                    }, t.methods.forEach(function(e) {
                        t[e] = t.factory(e);
                    }), t.load = function(t) {
                        var e = 3e5,
                            n = Math.ceil(new Date() / e) * e,
                            o = document.createElement("script");
                        o.type = "text/javascript", o.async = !0, o.crossorigin = "anonymous", o.src = "https://js.driftt.com/include/" + n + "/" + t + ".js";
                        var i = document.getElementsByTagName("script")[0];
                        i.parentNode.insertBefore(o, i);
                    };
            }
        }();
        drift.SNIPPET_VERSION = '0.3.1';
        drift.load('mf8ww89upe9t');
    </script>
    <!-- End of Async Drift Code -->

    <script src="https://meet.jit.si/external_api.js"></script>

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
        <!-- HEADER DESKTOP-->

        <!-- MAIN CONTENT-->
        <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row ">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong style="font-size:20px;">Hiraya Packages</strong> 
                                        <p class="m-t-10" style="font-size:14px;">Please see our current packages.</p>
                                    </div>

                                    <div class="row p-3">
                                        <div class="col-md-3">
                                            <div class="card">
                                                <img class="card-img-top" src="assets/img/about.jpg" alt="Card image cap">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-3">Classic Package</h4>
                                                    <p class="card-text">
                                                        Basic Photography Service
                                                        <br>
                                                        <span>Php 20,000</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-t-5 col-md-3">
                                            <div class="card">
                                                <img class="card-img-top" src="assets/img/image.jpg" alt="Card image cap">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-3">Gold Package</h4>
                                                    <p class="card-text">
                                                        Photo and Video Service
                                                        <br>
                                                        <span>Php 40,000</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-t-5 col-md-3">
                                            <div class="card">
                                                <img class="card-img-top" src="assets/img/a.jpg" alt="Card image cap">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-3">Premium Package</h4>
                                                    <p class="card-text">
                                                        Photo, Video, and Drone Service
                                                        <br>
                                                        <span>Php 50,000</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-t-5 col-md-3">
                                            <div class="card">
                                                <img class="card-img-top" src="assets/img/hero-bg.jpg" alt="Card image cap">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-3">Diamond Package</h4>
                                                    <p class="card-text">
                                                        Photo, Video, Drone, and Photobooth Service
                                                        <br>
                                                        <span>Php 80,000</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="px-3" >
                                            <button type="button" class="btn btn-secondary btn-sm" style="margin-right: 10px;" >
                                                    <a href="booking.php" class="text-white"><i class="zmdi zmdi-calendar-check"></i> Ready to Book?</a>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="dashboardassets/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="dashboardassets/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="dashboardassets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
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

    <!-- Main JS-->
    <script src="dashboardassets/js/main.js"></script>
   
</body>
</html>