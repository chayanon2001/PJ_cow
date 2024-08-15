<?php
require_once('connection.php');

if(isset($_GET['id'])) {
    $member_id = $_GET['id'];
    $sql = "DELETE FROM member WHERE member_id='$member_id'";
    if ($conn->query($sql)) {
        echo '<script>alert("ข้อมูลสมาชิกถูกลบแล้ว");</script>';
        echo '<script>window.location.href = "all_user.php";</script>';
    } else {
        echo '<script>alert("เกิดข้อผิดพลาด");</script>' . $conn->error;
        echo '<script>window.location.href = "all_user.php";</script>';
    }
    }
$conn->close();
?>
