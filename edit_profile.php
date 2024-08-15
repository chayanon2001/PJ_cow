<?php
require_once('connection.php');
$member_id = $_POST["member_id"];
$name = $_POST["name"];
$phone = $_POST["phone"];
$email = $_POST["email"];

$sql = "UPDATE member SET name='$name', phone='$phone', email='$email' WHERE member_id='$member_id'";

if ($conn->query($sql)) {
    echo "<p class=\"fs-3\">แก้ไขข้อมูล $name แล้ว</p>";
    $conn->close();
    echo "<script>alert('แก้ไขข้อมูล $name แล้ว'); window.location.href = 'me.php';</script>";
} else {
    echo "<script>alert('$conn->error'); window.location.href = 'me.php';</script>";
    $conn->close();
}
?>
