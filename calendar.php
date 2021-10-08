<?php
require('session.php');
require('server.php');

$sort = "ASC";
$column = "user_id";
if (isset($_GET['column']) && isset($_GET['sort'])) {
  $column = $_GET['column'];
  $sort = $_GET['sort'];
  // Descending order
  $sort == "ASC" ? $sort = "DESC" : $sort = "ASC";
}
$query = "SELECT * FROM users ORDER BY $column $sort";
$sqlUsers = mysqli_query($connection, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags-->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="au theme template">
  <!-- <meta name="author" content="Hau Nguyen">
  <meta name="keywords" content="au theme template"> -->

  <!-- Title Page-->
  <title>Calendar</title>

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
        <div class="section__content">
          <div class="container-fluid">

            <div class="row">
              <div class="col-lg-12">
                <h2 class="title-1 m-b-25">Calendar</h2>
                <section class="card">
                  <div class="card-body text-secondary">
                    <?php include '_calendar.php'; ?>
                  </div>
                  <div class="row m-t-25"></div>
                </section>
              </div>
            </div>

            <div class="spacer m-t-40"></div>
                <hr>
                
                <!-- ALL BOOKINGS -->
            <div class="row">
              <div class="col-lg-12">
                <?php 
                if($isAdmin) {
                    include '_bookingadmin.php'; 
                }
                ?>
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

  <!-- full calendar requires moment along jquery which is included above -->
  <script src="dashboardassets/vendor/fullcalendar-3.10.0/lib/moment.min.js"></script>
  <script src="dashboardassets/vendor/fullcalendar-3.10.0/fullcalendar.js"></script>

  <!-- Main JS-->
  <script src="dashboardassets/js/main.js"></script>

  <!-- <script>
    Calendly.initInlineWidget({
      url: 'https://calendly.com/hirayaphotos',
      parentElement: document.getElementById('hirayaCalendar'),
      prefill: {},
      utm: {}
    });
  </script> -->



</body>

</html>

