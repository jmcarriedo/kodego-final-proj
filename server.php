<?php

    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "hiraya";
    $port = 3307;

    // Function to open a connection to MySQl server
    $connection = mysqli_connect($host, $user, $password, $database, $port);

    // if(mysqli_connect_error()) {
    //     echo "Unable to connect to MySQL" . mysqli_connect_error();
    // } else {
    //     echo "db connected successfully";
    // }

?>