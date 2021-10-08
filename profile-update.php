<?php
    require('session.php');
    require('server.php');

    $user_id = $_SESSION['user_id'];
    $query1 = "SELECT * from customers where user_id='$user_id'";
    $sql1 = mysqli_query($connection, $query1);
    $row = mysqli_fetch_assoc($sql1);
    
    if(isset($_POST['update'])) {
        $user_id = $_POST['user_id'];
        $firstName = $_POST['firstName'];
        $middleName = $_POST['middleName'];
        $lastName = $_POST['lastName'];
        $address = $_POST['address'];
        $mobileNum = $_POST['mobileNum'];

        $query2 = "UPDATE customers SET user_id='$user_id', firstName='$firstName', middleName='$middleName', lastName='$lastName', address='$address', mobileNum='$mobileNum' WHERE user_id='$user_id'";
        $sql2 = mysqli_query($connection, $query2) OR trigger_error('Query failed ' . $query2);
        echo "<script> alert('Successfully updated') </script>";
        header('location: ./profile.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Update Profile</title>

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
    </style>
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
                    <div class="row">
                        <div class="col-md-12">
                            <?php if($_SESSION['user_id'] == $row['customer_id']) { ?>
                                <!-- CUSTOMER PROFILE -->
                                <!-- <h3 class="title-5 m-b-20">Customer Profile</h3> -->
                                <div class="col-lg-10">
                                    <div class="card">
                                        <div class="card-header text-secondary">
                                            <strong style="font-size:20px;">Edit Profile</strong> 
                                            <p class="m-t-10" style="font-size:14px;">Please make sure all fields are filled before submitting update.</p>
                                        </div>
                                        <div class="card-body card-block">
                                            <form action="profile-update.php" method="POST">
                                                <div class="input-group">
                                                    <div class="form-group" style="margin-right: 30px;">
                                                        <label for="firstName" class="form-control-label">First Name</label>
                                                        <input type="text" name="firstName" id="firstName" class="form-control" value="<?php echo $row['firstName']; ?>">
                                                    </div>
                                                    <div class="form-group" style="margin-right: 30px;">
                                                        <label for="middleName" class="form-control-label">Middle Name</label>
                                                        <input type="text" name="middleName" id="middleName" class="form-control" value="<?php echo $row['middleName']; ?>">
                                                    </div>
                                                    <div class="form-group" style="margin-right: 30px;">
                                                        <label for="lastName" class="form-control-label">Last Name</label>
                                                        <input type="text" name="lastName" id="lastName" class="form-control" value="<?php echo $row['lastName']; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="address" class="form-control-label">Address</label>
                                                    <input type="text" name="address" id="address" class="form-control"" value="<?php echo $row['address']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="mobileNum" class="form-control-label">Mobile Number</label>
                                                    <input type="text" name="mobileNum" id="mobileNum"  class="form-control" value="<?php echo $row['mobileNum']; ?>">
                                                </div>                                            
                                                <div class="form-actions form-group">
                                                    <input type="submit" name="update" class="btn btn-info btn-sm" value="Update" onclick="return confirm('Are you sure you want to update?')"/>
                                                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>"/>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <!-- END CUSTOMER PROFILE -->
                        </div>
                    </div>       
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT-->
        <!-- END PAGE CONTAINER-->
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