<?php 
require('server.php');
require('session.php');

    if($_SESSION['accessRole'] == 'admin') {
        $welcome = "Welcome " . $_SESSION['accessRole'];
        $isAdmin = true;
    } else {
        $welcome = "Welcome " . $_SESSION['accessRole'];
        $isAdmin = false;
    }
    $user_id = $_SESSION['user_id'];
    // $query = "SELECT users.user_id, customers.user_id, customers.firstName, customers.middleName, customers.lastName, customers.address
    // FROM users JOIN customers on customers.user_id = users.user_id where customers.user_id=$user_id";
    $query = "SELECT * FROM customers where user_id='$user_id'";
    $sql = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Hiraya Dashboard</title>

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
                <h2 class="title-1 m-b-25"><?php echo $welcome; ?></h2>
                
                <!-- CUSTOMER PROFILE -->
                <div class="row">
                        <?php if( $row['user_id'] == $_SESSION['user_id']) { ?>
                        <div class="my-2 col-md-4">
                            <div class="card-header user-header alt bg-white">
                                <div class="text-center">
                                    <div>
                                        <img class="rounded-circle mx-auto d-block" src="dashboardassets/images/icon/avatar-01.jpg" alt="Card image cap">
                                        <h5 class="text-uppercase text-center mt-2 mb-1"><?php echo $row['firstName']." ".$row['middleName']." ".$row['lastName']; ?></h5>
                                        <div class="text-xs">
                                            <i class="fa fa-map-marker"></i> <?php echo $row['address']; ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body bg-white">
                                <div class="media-body">
                                    <a href="profile.php">
                                        <p class="card-title text-info mb-2"> <span class="mr-2"><i class="zmdi zmdi-account"></i></span> My Profile</p>
                                    </a>
                                    <br>
                                    <a href="gallery.php"><span class="card-title text-info"><span class="mr-2"><i class="zmdi zmdi-camera-bw"></i></span> My Gallery</span></a>
                                </div>
                            </div>
                        </div>
                        <?php } else {?>
                        <div class="my-2 col-md-4">
                            <!-- <div class="card-header user-header alt bg-dark">
                                <div class="text-center">
                                    <div>
                                        <img class="align-self-center rounded-circle mr-3 " style="width:185px; " alt="" src="assets/img/logo round.png">
                                    </div>
                                </div>
                            </div> -->
                            <div class="card-body bg-danger">
                                <div class="media-body">
                                    <h2 class="text-light display-6"> <i class="zmdi zmdi-alert-circle-o"></i> Profile</h2>
                                    <a href="profile.php" class="text-light">
                                        <p class="">Complete your profile first  <i class="zmdi zmdi-arrow-right-top"></i></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="my-2 col-md-4">
                            <!-- <div class="card-header user-header alt bg-dark">
                                <div class="text-center">
                                    <div>
                                        <img class="align-self-center rounded-circle mr-3 " style="width:185px; " alt="" src="assets/img/logo round.png">
                                    </div>
                                </div>
                            </div> -->
                            <div class="card-body bg-dark">
                                <div class="media-body">
                                    <h2 class="text-light display-6">Hiraya</h2>
                                    <a href="packages.php" class="text-light">
                                        <p class="">See our packages  <i class="zmdi zmdi-arrow-right-top"></i></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="my-2 col-md-4">
                            <!-- <div class="card-header user-header alt bg-info">
                                <div class="text-center">
                                    <div>
                                        <img class="align-self-center rounded-circle mr-3 " style="width:185px; " alt="" src="assets/img/logo round.png">
                                    </div>
                                </div>
                            </div> -->
                            <div class="card-body bg-info">
                                <div class="media-body">
                                    <h2 class="text-light display-6">Booking</h2>
                                    <a href="booking.php" class="text-light">
                                        <p class="">Submit request form <i class="zmdi zmdi-arrow-right-top"></i></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                

                <div class="spacer m-t-40"></div>
                <hr>

                <!-- CALENDAR -->
                <?php if($isAdmin){
                    include '_calendar.php';
                } ?>

                <div class="spacer m-t-40"></div>
                
                <!-- ALL BOOKINGS -->
                <?php 
                if($isAdmin) {
                    include '_bookingadmin.php'; 
                } else {
                    include '_bookinguser.php';
                }
                ?>
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