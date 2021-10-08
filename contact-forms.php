<?php
    require('session.php');
    require('server.php');

    $sort = "ASC";
    $column = "date_created";
    if(isset($_GET['column']) && isset($_GET['sort'])) {
        $column = $_GET['column'];
        $sort = $_GET['sort'];
        // Descending order
        $sort == "ASC" ? $sort = "DESC" : $sort = "ASC";
    }
    $query = "SELECT * FROM contact_forms ORDER BY $column $sort";
    $sql = mysqli_query($connection, $query);

    if(isset($_POST['delete'])) {
        $contact_id = $_POST['contact_id'];

        $query2 = "DELETE from contact_forms WHERE contact_id='$contact_id'";
        $sql2 = mysqli_query($connection, $query2) OR trigger_error('Query failed ' . $query2);
        echo "<script> alert('Successfully updated') </script>";
        header('location: ./contact-forms.php');
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Contact Forms</title>

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
                            <!-- DATA TABLE -->
                            <div class="user-data table-responsive table-responsive-data2">
                                <h3 class="title-3 m-b-30">
                                            <i class="zmdi zmdi-email-open"></i>Contact Forms</h3>
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            <th><a class="text-dark" href="?column=date_created&sort=<?php echo $sort ?>"> Date <i class="fas fa-sort"></i></a></th>
                                            <th><a class="text-dark" href="?column=name&sort=<?php echo $sort ?>"> Name <i class="fas fa-sort"></i></a></th>
                                            <th><a class="text-dark" href="?column=email&sort=<?php echo $sort ?>"> Email <i class="fas fa-sort"></i></a></th>
                                            <th><a class="text-dark" href="?column=subject&sort=<?php echo $sort ?>"> Subject <i class="fas fa-sort"></i></a></th>
                                            <th><a class="text-dark" href="?column=message&sort=<?php echo $sort ?>"> Message <i class="fas fa-sort"></i></a></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while($row = mysqli_fetch_array($sql)) { ?>
                                        <tr class="border">
                                            <td class=""> <?php echo date("M d, Y", strtotime($row['date_created'])); ?> </td>
                                            <td class=""> <?php echo $row['name']; ?> </td>
                                            <td>
                                                <span class="block-email"> <a href = "mailto:<?php echo $row['email'];?>?subject=<?php echo $row['subject'];?>&body=">
                                                    <?php echo $row['email']; ?></a> </span>
                                            </td>
                                            <td class=""> <?php echo $row['subject']; ?> </td>
                                            <td class=""> <?php echo $row['message']; ?> </td>
                                            <td>
                                                <div class="table-data-feature">
                                                    <form class="pe-3" action="contact-forms.php" method="POST">
                                                        <button name="delete" class="item" data-toggle="tooltip" data-placement="top" title="Delete" onclick="return (confirm('Are you sure you want to delete?'));">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                        <input type="hidden" name="contact_id" value="<?php echo $row['contact_id']; ?>"/>
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