<?php
    session_start();
    if($_SESSION['status'] == 'invalid' || empty($_SESSION['status'])) {
        $_SESSION['status'] = 'invalid';
        unset($_SESSION['email']);
        header('location: login.php');
    }
?>