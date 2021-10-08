<?php 
    require('server.php');

    $user_id = $_SESSION['user_id'];
    $mysqli = new mysqli('localhost', 'root', '', 'hiraya');
    if (isset($_GET['date'])) {
        $eventDate = trim($_GET['date']);
        $query = "SELECT * FROM bookings INNER JOIN customers ON bookings.customer_id = customers.customer_id WHERE bookings.eventDate='$eventDate'";
        $result = mysqli_query($connection, $query);
    }

    if(isset($_POST['delete'])) {
        $booking_id = $_POST['booking_id'];
        $query1 = "DELETE FROM bookings WHERE booking_id='$booking_id'";
        $sql = mysqli_query($connection, $query1) OR trigger_error('Query failed ' . $query);
        echo "<script> alert('Successfully deleted') </script>";
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
    <title>Admin Dashboard</title>

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


<!-- ALL BOOKINGS -->
    <div class="row">
        <div class="col-md-12">
            <!-- DATA TABLE -->
            <div class="table-data__tool">
                <div class="table-data__tool-left">
                    <!-- <div class="bg-transparent">
                        Booking for:<strong style="font-size:20px;"> <?php echo date("M d, Y", strtotime($eventDate)); ?> </strong> 
                    </div> -->
                    <div class="row rs-select2--light">
                        <h3 class="title-5 m-b-10">Bookings for :  <?php echo $eventDate ?> </h3>
                    </div>
                   
                </div>
                <div class="table-data__tool-right">

                </div>
            </div>
            <div class="table-responsive table-responsive-data2">
                <table class="bg-white table table-data2">
                    <thead class="text-center">
                        <tr>
                            <th>Booking ID</th>
                            <th>Event Name</th>
                            <th>Event Time</th>
                            <th>Event Venue</th>
                            <th>event package</th>
                            <th>Name</th>
                            <th>mobile number</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while($row = mysqli_fetch_array($result)) { ?>
                        <tr class="tr-shadow">
                            <td><?php echo $row['booking_id']; ?></td>
                            <td><?php echo $row['eventName']; ?></td>
                            <td><?php echo $row['eventTime']; ?></td>
                            <td><?php echo $row['eventVenue']; ?></td>
                            <td><?php echo $row['eventPackage']; ?></td>
                            <td><?php echo $row['firstName'].' '.$row['lastName']; ?></span></td>
                            <td><?php echo $row['mobileNum']; ?></td>
                            <td>
                                <span class="<?php echo $row['status'] == '1' ? 'text-primary text-xs text-uppercase' : 'text-danger text-xs text-uppercase' ?>"><?php echo $row['status'] == 1 ? 'confirmed': 'on process' ?></span>
                            </td>
                            <td>
                                <div class="table-data-feature">
                                    <form action="booking-view.php" method="GET">
                                        <button name="view" type="submit" class="btn item" data-toggle="tooltip" data-placement="top" title="View">
                                            <i class="zmdi zmdi-eye"></i>
                                        </button>
                                        <input type="hidden" name="booking_id" value="<?php echo $row['booking_id']; ?>"/>
                                    </form>
                                    <?php if ($row['status'] == 0) { ?>
                                    <form action="booking-edit.php" method="POST">
                                        <button name="edit" type="submit" class="btn item" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="zmdi zmdi-edit"></i>
                                        </button>
                                        <input type="hidden" name="booking_id" value="<?php echo $row['booking_id']; ?>"/>
                                    </form>
                                    <?php } ?>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- END DATA TABLE -->
        </div>
    </div>
<!-- END ALL BOOKINGS-->

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