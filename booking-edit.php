<?php
    require('session.php');
    require('server.php');

    // $user_id = $_SESSION['user_id'];
    // $query = "SELECT * FROM customers WHERE user_id='$user_id'";
    // $sql = mysqli_query($connection, $query);
    // $row = mysqli_fetch_assoc($sql);
    
    if(isset($_POST['edit'])) {
        $booking_id = $_POST['booking_id'];

        $query = "SELECT * from bookings WHERE booking_id=$booking_id";
        $result = mysqli_query($connection, $query) OR trigger_error('Query failed ' . $query);
        $row = mysqli_fetch_assoc($result);
    }

    if(isset($_POST['update'])) {
        $booking_id = $_POST['booking_id'];
        $customer_id = $_POST['customer_id'];
        $eventName = $_POST['eventName'];
        $eventCategory = $_POST['eventCategory'];
        $eventPackage = $_POST['eventPackage'];
        $eventDate = $_POST['eventDate'];
        $eventTime = $_POST['eventTime'];
        $eventVenue = $_POST['eventVenue'];
        $eventNotes = $_POST['eventNotes'];
       
        $query1 = "UPDATE bookings SET customer_id='$customer_id', eventName='$eventName', eventCategory='$eventCategory', eventPackage='$eventPackage', eventDate='$eventDate', eventTime='$eventTime', eventVenue='$eventVenue', eventNotes='$eventNotes' WHERE booking_id=$booking_id";
        $sql = mysqli_query($connection, $query1) OR trigger_error('Query failed ' . $query1);
        echo "<script> alert('Successfully updated') </script>";
        header('location: ./dashboard.php');
    }
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Edit Booking</title>

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
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card ">
                                    <div class="card-header">
                                        <strong style="font-size:20px;">Edit Booking</strong> 
                                        <p class="m-t-10" style="font-size:14px;">Please make sure all fields are filled before submitting update.</p>
                                    </div>
                                    <div class="card-body card-block bg-white">
                                        <form action="booking-edit.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="row form-group">
                                                <div class="col-12 col-md-9">
                                                    <input type="hidden" class="form-control-static" value="<?php echo $_SESSION['user_id']; ?>" />
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="hidden" name="customer_id" class="form-control-static" value="<?php echo $row['customer_id']; ?>" />
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="eventPackage" class=" form-control-label">Hiraya Package</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="eventPackage" id="SelectLm" class="form-control">
                                                        <option disabled selected>Choose package...</option>
                                                        <option value="Classic Package" <?php echo ($row['eventPackage']=='Classic Package' ? 'Selected' : ''); ?>>Classic Package</option>
                                                        <option value="Gold Package" <?php echo ($row['eventPackage']=='Gold Package' ? 'Selected' : ''); ?>>Gold Package</option>
                                                        <option value="Premium Package" <?php echo ($row['eventPackage']=='Premium Package' ? 'Selected' : ''); ?>>Premium Package</option>
                                                        <option value="Diamond Package"<?php echo ($row['eventPackage']=='Diamond Package' ? 'Selected' : ''); ?>>Diamond Package</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group ">
                                                <div class="col col-md-3">
                                                    <label for="eventName" class="form-control-label">Event Name</label>
                                                    <small class="form-text text-muted">Example: Juan and Maria Wedding</small>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="eventName" name="eventName" class="form-control" value="<?php echo $row['eventName']; ?>"/>
                                                </div>
                                            </div>
                                            <div class="row form-group ">
                                                <div class="col col-md-3">
                                                    <label for="eventDate" class="form-control-label">Event Date</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type='date' name='eventDate' id='eventDate' class='form-control' value="<?php echo $row['eventDate']; ?>"/>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="eventTime" class=" form-control-label">Event Time</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="eventTime" id="eventTime" class="form-control">
                                                        <option disabled selected>Choose timeslot...</option>
                                                        <option value="Morning Event" <?php echo ($row['eventTime']=='Morning Event' ? 'Selected' : ''); ?>>Morning Event</option>
                                                        <option value="Afternoon Event" <?php echo ($row['eventTime']=='Afternoon Event' ? 'Selected' : ''); ?>>Afternoon Event</option>
                                                        <option value="Whole Day Event" <?php echo ($row['eventTime']=='Whole Day Event' ? 'Selected' : ''); ?>>Whole Day Event</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group ">
                                                <div class="col col-md-3">
                                                    <label for="evenVenue" class="form-control-label">Event Venue</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="eventVenue" name="eventVenue" class="form-control" value="<?php echo $row['eventVenue']; ?>"/>
                                                    <small class="form-text text-muted">Please provide full address</small>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">Event Category</label>
                                                </div>
                                                <div class="col col-md-9">
                                                    <div class="form-check col-md-6">
                                                        <div class="radio">
                                                            <label for="radio1" class="form-check-label ">
                                                                <input type="radio" id="radio1" name="eventCategory" value="Wedding" class="form-check-input" <?php echo ($row['eventCategory']=="Wedding" ? "Checked" : ""); ?>>Wedding
                                                            </label>
                                                        </div>
                                                        <div class="radio">
                                                            <label for="radio2" class="form-check-label ">
                                                                <input type="radio" id="radio2" name="eventCategory" value="Engagement" class="form-check-input" <?php echo ($row['eventCategory']=="Engagement" ? "Checked" : ""); ?>>Engagement
                                                            </label>
                                                        </div>
                                                        <div class="radio">
                                                            <label for="radio3" class="form-check-label ">
                                                                <input type="radio" id="radio3" name="eventCategory" value="Debut" class="form-check-input text-info" <?php echo ($row['eventCategory']=="Debut" ? "Checked" : ""); ?>>Debut
                                                            </label>
                                                        </div>
                                                        <div class="radio">
                                                            <label for="radio4" class="form-check-label ">
                                                                <input type="radio" id="radio4" name="eventCategory" value="Predebut" class="form-check-input" <?php echo ($row['eventCategory']=="Predebut" ? "Checked" : ""); ?>>Pre Debut
                                                            </label>
                                                        </div>
                                                        <div class="radio">
                                                            <label for="radio5" class="form-check-label ">
                                                                <input type="radio" id="radio5" name="eventCategory" value="Corporate" class="form-check-input" <?php echo ($row['eventCategory']=="Corporate" ? "Checked" : ""); ?>>Corporate
                                                            </label>
                                                        </div>
                                                        <div class="radio">
                                                            <label for="radio6" class="form-check-label ">
                                                                <input type="radio" id="radio6" name="eventCategory" value="Birthday" class="form-check-input" <?php echo ($row['eventCategory']=="Birthday" ? "Checked" : ""); ?>>Birthday
                                                            </label>
                                                        </div>
                                                        <div class="radio">
                                                            <label for="radio7" class="form-check-label ">
                                                                <input type="radio" id="radio7" name="eventCategory" value="Kids" class="form-check-input" <?php echo ($row['eventCategory']=="Kids" ? "Checked" : ""); ?>>Kids
                                                            </label>
                                                        </div>
                                                        <div class="radio">
                                                            <label for="radio9" class="form-check-label ">
                                                                <input type="radio" id="radio8" name="eventCategory" value="Family" class="form-check-input" <?php echo ($row['eventCategory']=="Family" ? "Checked" : ""); ?>>Family
                                                            </label>
                                                        </div>
                                                        <div class="radio">
                                                            <label for="radio10" class="form-check-label ">
                                                                <input type="radio" id="radio8" name="eventCategory" value="Maternity" class="form-check-input" <?php echo ($row['eventCategory']=="Maternity" ? "Checked" : ""); ?>>Maternity
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="eventNotes" class=" form-control-label">Notes</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="eventNotes" id="eventNotes" rows="9" placeholder="Please include important notes" class="form-control"><?php echo $row['eventNotes']; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="card-footer bg-white" style="display: flex; justify-content:end;">
                                                <button type="reset" class="btn btn-secondary btn-sm" style="margin-right: 10px;" onclick="return confirm('Are you sure you want to reset?')">
                                                    <i class="fa fa-ban"></i> Reset
                                                </button>
                                                <input type="submit" name="update" class="btn btn-info btn-sm" style="padding: 5px 20px;" value="Update" onclick="return confirm('Are you sure you want to update?')">
                                                    <i class="fa fa-dot-circle-o"></i>
                                                </input>
                                                <input type="hidden" name="booking_id" value="<?php echo $row['booking_id']; ?>"/>
                                            </div>
                                        </form>
                                        <a href="dashboard.php" class="m-t-25 text-dark"><i class="fas fa-reply"></i> Back to Dashboard</a>
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