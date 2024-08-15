<?php
require_once('connection.php');
$cow_id = $_GET['cow_id'];
$sql_delete_foreign_key = "DELETE FROM injection WHERE cow_id='$cow_id'";
$conn->query($sql_delete_foreign_key);
// 2. ลบข้อมูลในตารางหลัก
$sql_delete_main = "DELETE FROM cow WHERE cow_id='$cow_id'";
if ($conn->query($sql_delete_main)) {
    echo '<script>alert("ข้อมูลวัวถูกลบแล้ว");</script>';
    echo '<script>window.location.href = "showcow.php";</script>';
} else {
    echo '<script>alert("เกิดข้อผิดพลาด");</script>' . $conn->error;
    echo '<script>window.location.href = "showcow.php";</script>';
}

$conn->close();
?>
