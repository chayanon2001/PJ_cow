<?php
require_once('connection.php');
$cow_id = $_POST["cow_id"];
$name = $_POST["name"];
$gender = $_POST["gender"];
$date = $_POST["date"];
$price = $_POST["price"];
$age = $_POST["age"];

$sql = "UPDATE cow SET name='$name', gender='$gender', date='$date', price='$price', age='$age' WHERE cow_id='$cow_id'";

if ($conn->query($sql)) {
    echo "<p class=\"fs-3\">แก้ไขข้อมูล $name แล้ว</p>";
    $conn->close();
    echo "<script>alert('แก้ไขข้อมูล $name แล้ว'); window.location.href = 'showcow.php';</script>";
} else {
    echo "<p class=\"fs-3 text-danger\">Error: ", $conn->error, "</p>";
    $conn->close();
}
?>
