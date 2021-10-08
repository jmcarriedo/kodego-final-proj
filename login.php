<?php
    require('server.php');
    // Start Session
    session_start();
    if($_SESSION['status'] == 'invalid' || empty($_SESSION['status'])) {
        $_SESSION['status'] = 'invalid';
    }
    if($_SESSION['status'] == 'valid') {
        header('location: ./dashboard.php');
    }
    // Session Variables
    if(isset($_POST['login'])) {
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        if(empty($email) || empty($password)) {
            echo "Fields cannot be empty";
        } else {
            if($query = "SELECT * FROM users WHERE email='$email'") {
                $sql = mysqli_query($connection, $query);
                $row = mysqli_fetch_assoc($sql);
                $currentPass = $row['password'];
                if(password_verify($password, $currentPass)) {
                    // If Password is Valid
                    $_SESSION['user_id'] = $row['user_id'];
                    header('location: dashboard.php');
                } else {
                    $errMessage = "Login failed. Wrong email or password";
                    echo "<script> alert($errMessage) </script>";
                }
                if(mysqli_num_rows($sql)>0 && password_verify($password, $currentPass)) {
                    $_SESSION['status'] = 'valid';
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['accessRole'] = $row['accessRole'];
                    header('location: ./dashboard.php');
                } else {
                    $_SESSION['status'] = 'invalid';
                    echo "Invalid credentials";
                }
            } 
        };
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Login</title>

    <!-- Bootstrap CSS-->
    <link href="dashboardassets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="dashboardassets/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="title-1 text-center m-b-50">
                            LOG IN
                        </div>
                        <div class="login-form">
                            <form action="login.php" method="POST">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password" required>
                                </div>
                                <!-- <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="remember">Remember Me
                                    </label>
                                    <label>
                                        <a href="#">Forgotten Password?</a>
                                    </label>
                                </div> -->
                                <input type="submit" name="login" value="Log In" class="au-btn au-btn--block au-btn--blue2 m-b-20" />
                                <!-- <div class="social-login-content">
                                    <div class="social-button">
                                        <button class="au-btn au-btn--block au-btn--blue m-b-20">sign in with facebook</button>
                                        <button class="au-btn au-btn--block au-btn--blue2">sign in with twitter</button>
                                    </div>
                                </div> -->
                            </form>
                            <div class="register-link">
                                <p>
                                    Don't you have account?
                                    <a href="./register.php" class="text-info">Register Here</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
<body>
    <div class="mt-5 container">
        <a href="./register.php" class="mb-5"> Register </a>  

        <form class="mt-6" action="login.php" method="POST">
            <h6>Login</h6>
            <i class="far fa-envelope"></i>
            <input type="email" name="email" placeholder="Email" />
            <i class="fas fa-lock"></i>
            <input type="password" name="password" placeholder="Password" /> 
            <input type="submit" name="login" value="Login"/>
        </form>
    </div>

</body>
</html>