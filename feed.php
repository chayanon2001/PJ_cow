<?php
    session_start();
    require_once "connection.php";

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $detail = $_POST['details'];

        $name_check_query = "SELECT * FROM feed WHERE name='$name' LIMIT 1";
        $result = mysqli_query($conn, $name_check_query);
        $existingFeed = mysqli_fetch_assoc($result);

        if ($existingFeed) {
            echo "<script>alert('มีข้อมูลอาหารเสริมชนิดนี้ในระบบ');</script>";
        } else {
            $insert_query = "INSERT INTO feed (name, details) VALUES ('$name', '$detail')";
            $insert_result = mysqli_query($conn, $insert_query);

            if ($insert_result) {
                echo '<script>alert("เพิ่มข้อมูลอาหารเสริมสำเร็จ");</script>';
                echo '<script>window.location.href = "insert_feed.php";</script>';
            } else {
                $_SESSION['error'] = "บางอย่างผิดพลาด";
                header("Location: insert_vc.php");
            }
        }
    }
?>
