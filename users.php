<?php
    require('session.php');
    require('server.php');

    $sort = "ASC";
    $column = "user_id";
    if(isset($_GET['column']) && isset($_GET['sort'])) {
        $column = $_GET['column'];
        $sort = $_GET['sort'];
        // Descending order
        $sort == "ASC" ? $sort = "DESC" : $sort = "ASC";
    }
    $query = "SELECT * FROM users ORDER BY $column $sort";
    $sqlUsers = mysqli_query($connection, $query);

    if(isset($_POST['delete'])) {
        $email = $_POST['email'];
        $query1 = "DELETE FROM users WHERE email='$email'";
        $sql = mysqli_query($connection, $query1) OR trigger_error('Query failed ' . $query);
        echo "<script> alert('Successfully deleted') </script>";
        header('location: ./users.php');
    }

    if(isset($_POST['update'])) {
        $email = $_POST['email'];
        $accessRole = $_POST['accessRole'];

        $query2 = "UPDATE users SET email='$email', accessRole='$accessRole' WHERE email='$email'";
        $sql2 = mysqli_query($connection, $query2) OR trigger_error('Query failed ' . $query2);
        echo "<script> alert('Successfully updated') </script>";
        header('location: ./users.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Users</title>

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
                            <!-- DATA TABLE -->
                            <div class="user-data table-responsive table-responsive-data2">
                                <h3 class="title-3 m-b-30">
                                            <i class="zmdi zmdi-account-calendar"></i>user data</h3>
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            <th><a class="text-dark" href="?column=email&sort=<?php echo $sort ?>"> Email <i class="fas fa-sort"></i></a></th>
                                            <th><a class="text-dark" href="?column=accessRole&sort=<?php echo $sort ?>"> Access Role <i class="fas fa-sort"></i></a></th>
                                            <th><a class="text-dark" href="?column=accessRole&sort=<?php echo $sort ?>"> Date Joined <i class="fas fa-sort"></i></a></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while($row = mysqli_fetch_array($sqlUsers)) { ?>
                                        <tr class="border">
                                            <td>
                                                <span class="block-email"> <?php echo $row['email']; ?> </span>
                                            </td>
                                            <td class=""> <?php echo $row['accessRole']; ?> </td>
                                            <td class=""> <?php echo $row['date_created']; ?> </td>
                                            <td>
                                                <div class="table-data-feature">
                                                    <form class="pe-3" action=" user-update.php" method="POST">
                                                        <button name="edit" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                        <input type="hidden" name="email" value="<?php echo $row['email']; ?>"/>
                                                    </form>
                                                    <form class="pe-3" action="users.php" method="POST">
                                                        <button name="delete" class="item" data-toggle="tooltip" data-placement="top" title="Delete" onclick="return (confirm('Are you sure you want to delete?'));">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                        <input type="hidden" name="email" value="<?php echo $row['email']; ?>"/>
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