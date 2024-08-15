<?php
include_once 'connection.php';
include 'navigation.php';
nav();
session_start();

if (!isset($_SESSION['userid'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['cow_id'])) {
    $cow_id = $_GET['cow_id'];

    // คำสั่ง SQL สำหรับดึงข้อมูลของวัวด้วย cow_id
    $sql = "SELECT * FROM cow WHERE cow_id = $cow_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $gender = $row['gender'];
        $birthdate = $row['date'];
        $age = $row['age'];
        $price = $row['price'];
        $picture = $row['picture'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายละเอียดวัว</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@300;600&family=Noto+Sans+Thai:wght@700&family=Pattaya&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="user_page.css">
    <style>
        body {
            font-family: 'IBM Plex Sans Thai', sans-serif;
        }
    </style>
</head>
<body> 
    <div class="container-fluid mt-1">
    <form  action="onecow.php" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-6 p-3">
                <div class="d-flex justify-content-center align-items-center m-3">
                    <!-- รูปภาพที่จะแสดง -->
                    <?php echo "<img  src=\"images/$picture\" style=\"width: 400px;\">"; ?>
                </div>     
            </div>
            <!-- คอลัมน์ขวา -->
            <div class="col-4 p-3">
    <div class="mb-3 mt-1">
        <?php echo "<h5 class='font-normal fs-4'> ชื่อ: $name</h5>"; ?>
    </div>
    <div class="mb-3">
        <?php echo "<h5 class='font-normal fs-4'>เพศ: $gender</h5>"; ?>
    </div>
    <div class="mb-3">
        <?php echo "<h5 class='font-normal fs-4'> วันเกิด: $birthdate</h5>"; ?>
    </div>
    <div class="mb-3">
        <?php echo "<h5 class='font-normal fs-4'>อายุ: $age ปี</h5>"; ?>
    </div>
    <div class="mb-3">
        <?php echo "<h5 class='font-normal fs-4'>ราคา: $price บาท</h5>"; ?>
    </div>
</div>

            </div>
        </div>
    </form>
</div>
</body>
</html>
