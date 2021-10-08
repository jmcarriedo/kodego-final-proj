<?php
    require('server.php');

    if(isset($_POST['contact'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        $query = "INSERT INTO contact_forms (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
        $sql = mysqli_query($connection, $query) OR trigger_error('Query failed ' . $query);;
        echo "<script> alert('Contact form submitted!') </script>";
        header('location: ./index.php');
    }
?>