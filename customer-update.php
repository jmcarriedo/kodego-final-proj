<?php
    require('server.php');
    require('session.php');

    if(isset($_POST['edit'])) {
        $user_id= $_POST['user_id'];
        $query = "SELECT * FROM customers WHERE user_id='$user_id'";
        $sql = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($sql);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Update Customer</title>

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
                    <div class="row">
                        <div class="col-md-12">
                            <!-- EDIT CUSTOMER -->
                            <h3 class="title-5 m-b-20">Edit Customer</h3>
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Edit User</div>
                                    <div class="card-body card-block">
                                        <form action="customers.php" method="POST">
                                            <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>"/>
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
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- END EDIT CUSTOMER -->
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