<?php
session_start();
include_once 'connection.php';

// File upload path
$targetDir = "images/";
if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $vaccine_ids = isset($_POST['vaccine_id']) ? $_POST['vaccine_id'] : array();
    if (!empty($_FILES["file"]["name"])) {
        $fileType = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

        // Allow certain file formats
        $allowTypes = array('jpg', 'png', 'jpeg');
        if (in_array($fileType, $allowTypes)) {
            $picture = uniqid() . '.' . $fileType;
            $targetFilePath = $targetDir . $picture;

            if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {
                // เพิ่มข้อมูลลง database
                $query = "INSERT INTO cow (name, picture, gender, date, age, price, member_id)
                VALUES ('$name', '$picture', '$gender', '$date', '$age', '$price', '" . $_SESSION['userid'] . "')";        
                 $result = mysqli_query($conn, $query);
                 if ($result) {
                    echo '<script>alert("เพิ่มข้อมูลวัวสำเร็จ");</script>';
                    echo '<script>window.location.href = "cowpic.php";</script>';
                } else {
                    echo "เกิดข้อผิดพลาด: " . $query . "<br>" . mysqli_error($conn);
                }
            } else {
                echo '<script>alert("ขออภัย เกิดข้อผิดพลาดในการอัปโหลดไฟล์ของคุณ");</script>';
            }
        } else {
            echo '<script>alert("ขออภัย อนุญาตให้ใช้เฉพาะไฟล์ JPG, JPEG, PNG");</script>';
        }
    }
}
?>
