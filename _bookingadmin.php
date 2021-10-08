<?php 
    require('server.php');

    $query = "SELECT DISTINCT bookings.booking_id, bookings.customer_id, bookings.eventName, bookings.eventTime, bookings.eventDate, bookings.eventPackage, bookings.eventVenue, bookings.eventTime, bookings.status, customers.customer_id, customers.firstName, customers.lastName, customers.mobileNum
    FROM bookings JOIN customers ON bookings.customer_id = customers.customer_id";
    $result = mysqli_query($connection, $query);

    if(isset($_POST['delete'])) {
        $booking_id = $_POST['booking_id'];
        $query1 = "DELETE FROM galleries WHERE booking_id='$booking_id'";
        $query2 = "DELETE FROM bookings WHERE booking_id='$booking_id'";
        $sql1 = mysqli_query($connection, $query1) OR trigger_error('Query failed ' . $query1);
        $sql2 = mysqli_query($connection, $query2) OR trigger_error('Query failed ' . $query2);
        echo "<script> alert('Successfully deleted') </script>";
        header('location: ./dashboard.php');
    }

    if(isset($_POST['confirm'])) {
        $booking_id = $_POST['booking_id'];
        $query3 = "UPDATE bookings SET status='1' WHERE booking_id='$booking_id'";
        $sql3 = mysqli_query($connection, $query3) OR trigger_error('Query failed ' . $query3);
        echo "<script> alert('Successfully confirmed') </script>";
        header('location: ./dashboard.php');
    }

    if(isset($_POST['unconfirm'])) {
        $booking_id = $_POST['booking_id'];
        $query4 = "UPDATE bookings SET status='0' WHERE booking_id='$booking_id'";
        $sql4 = mysqli_query($connection, $query4) OR trigger_error('Query failed ' . $query4);
        echo "<script> alert('Successfully confirmed') </script>";
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
        <div class="col-lg-12">
            <!-- DATA TABLE -->
            <div class="table-data__tool">
                <div class="table-data__tool-left">
                    <div class="rs-select2--light rs-select2--md">
                        <h3 class="title-5 m-b-10">All Bookings</h3>
                    </div>        
                </div>
                <div class="table-data__tool-right">
                    <button class="au-btn au-btn-icon au-btn--green au-btn--small bg-dark">
                        <a href="./booking.php" class="text-white"><i class="zmdi zmdi-plus"></i>add item</a></button>
                </div>
            </div>
            <div class="table-responsive table-responsive-data2">
                <table class="bg-white table table-data2">
                    <thead class="">
                        <tr>
                            <th>booking id</th>
                            <th>customer</th>
                            <th>event date</th>
                            <!-- <th>event time </th> -->
                            <th>event name</th>
                            <th>event venue</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while($row = mysqli_fetch_array($result)) { ?>
                        <tr class="tr-shadow">
                            <td><?php echo $row['booking_id']; ?></td>
                            <td><?php echo $row['firstName'].' '.$row['lastName']; ?></span></td>
                            <td><?php echo $row['eventDate']; ?></td>
                            <!-- <td><?php echo date("M d, Y", strtotime($row['eventDate'])); ?></td> -->
                            <!-- <td><?php echo $row['eventTime']; ?></td> -->
                            <td><?php echo $row['eventName']; ?></td>
                            <td><?php echo $row['eventVenue']; ?></td>
                            <td>
                                <span style="font-size:11px;" class="<?php echo $row['status'] == '1' ? 'text-info text-uppercase' : 'text-danger text-uppercase' ?>"><?php echo $row['status'] == 1 ? 'confirmed': 'on process' ?></span>
                            </td>
                            <td>
                                <div class="table-data-feature">
                                <?php if ($row['status'] == 0) { ?>
                                <form action="_bookingadmin.php" method="POST">
                                    <button name="confirm" type="submit" class="btn item text-info" data-toggle="tooltip" data-placement="top" title="Confirm" onclick="return confirm('Are you sure you want to confirm booking?')">
                                        <i class="zmdi zmdi-collection-plus"></i>
                                    </button>
                                    <input type="hidden" name="booking_id" value="<?php echo $row['booking_id']; ?>"/>
                                </form>
                                <?php } else { ?>
                                <form action="_bookingadmin.php" method="POST">
                                    <button name="unconfirm" type="submit" class="btn item text-danger" data-toggle="tooltip" data-placement="top" title="Unconfirm" onclick="return confirm('Are you sure you want to unconfirm booking?')">
                                        <i class="zmdi zmdi-close-circle"></i>
                                    </button>
                                    <input type="hidden" name="booking_id" value="<?php echo $row['booking_id']; ?>"/>
                                </form>
                                <?php } ?>
                                <form action="booking-view.php" method="GET">
                                    <button name="view" type="submit" class="btn item text-secondary" data-toggle="tooltip" data-placement="top" title="View">
                                        <i class="zmdi zmdi-eye"></i>
                                    </button>
                                    <input type="hidden" name="booking_id" value="<?php echo $row['booking_id']; ?>"/>
                                </form>
                                <form action="booking-edit.php" method="POST">
                                    <button name="edit" type="submit" class="btn item text-secondary" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="zmdi zmdi-edit"></i>
                                    </button>
                                    <input type="hidden" name="booking_id" value="<?php echo $row['booking_id']; ?>"/>
                                </form>
                                <form action="_bookingadmin.php" method="POST">
                                    <button name="delete" type="submit" class="btn item text-secondary" data-toggle="tooltip" data-placement="top" title="Delete" onclick="return confirm('Are you sure you want to delete this?')">
                                        <i class="zmdi zmdi-delete"></i>
                                    </button>
                                    <input type="hidden" name="booking_id" value="<?php echo $row['booking_id']; ?>"/>
                                </form>
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