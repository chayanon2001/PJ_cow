<?php 

    $conn = mysqli_connect("localhost", "root", "", "pj_cow");

    if (!$conn) {
        die("Failed to connect to the database: " . mysqli_connect_error());
    }

?>