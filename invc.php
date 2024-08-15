<?php
    session_start();
    require_once "connection.php";

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $frequency = $_POST['frequency'];
        $detail = $_POST['details'];

        $name_check_query = "SELECT * FROM vaccine WHERE name='$name' LIMIT 1";
        $result = mysqli_query($conn, $name_check_query);
        $existingvaccine = mysqli_fetch_assoc($result);

        if ($existingvaccine) {
            echo "<script>alert('มีข้อมูลวัคซีนชนิดนี้ในระบบ');</script>";
        } else {
            $insert_query = "INSERT INTO vaccine (name, details,frequency) VALUES ('$name', '$frequency','$detail')";
            $insert_result = mysqli_query($conn, $insert_query);

            if ($insert_result) {
                echo '<script>alert("เพิ่มข้อมูลวัคซีนสำเร็จ");</script>';
                echo '<script>window.location.href = "insert_vc.php";</script>';
            } else {
                $_SESSION['error'] = "บางอย่างผิดพลาด";
                header("Location: insert_vc.php");
            }
        }
    }
?>
