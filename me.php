<?php 
include 'navigation.php';
include_once 'connection.php';
nav();
session_start();
if (!$_SESSION['userid']) 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลผู้ใช้</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@300;600&family=Noto+Sans+Thai:wght@700&family=Pattaya&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="user_page.css">
    <link rel="stylesheet" href="user_page.css">
    <title>หน้าหลัก</title>
    <style>
         body {
            font-family: 'IBM Plex Sans Thai', sans-serif !important;
        }
        .table {
            margin-top: 20px;
            }

        body {
                background-color: #f8f9fa; /* สีพื้นหลังของหน้าเว็บ */
            }

        .container {
                margin-top: 50px;
            }

        .card {
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }
        .font-normal {
                font-weight: normal;
            }

        .fs-4 {
                font-size: 1.5rem;
            }
        .flex-container {
            display: flex;
            justify-content: space-between;
            margin: 10px;
        }
        .align-left,
        .align-left:hover,
        .align-left:active {
            text-decoration: none; 
            color: #000; 
        }
        .align-right,
        .align-right:hover,
        .align-right:active {
            text-decoration: none; 
            color: #000;
            margin-left: auto;
        }
    </style>
</head>
<body>
<div class="flex-container">
    <a href="list_farm.php" class="align-left">
         ชื่อฟาร์ม: <span id="farmName"></span><i class="ri-refresh-line"></i>
    </a>
    <a href="me.php" class="align-right">
        ผู้ใช้งาน: <?php echo $_SESSION['user']; ?> <i class="ri-user-settings-line"></i>
    </a>
</div>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <?php
            if (isset($_SESSION['userid']) && !empty($_SESSION['userid'])) {
                $sql = "SELECT * FROM member WHERE member_id = " . $_SESSION['userid'] . " ORDER BY member_id;";
            } else {
                echo "<div class='alert alert-danger' role='alert'>ไม่พบข้อมูลผู้ใช้</div>";
            }
            $query = mysqli_query($conn, $sql);
            while ($members = mysqli_fetch_assoc($query)) {
                echo "<div class='col-md-6'>";
                echo "<div class='card mb-3'>";
                echo "<div class='card-header text-center'><h2>ข้อมูลส่วนตัว</h2></div>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>ชื่อ: " . $members['name'] . "</h5>";
                echo "<h5 class='card-text'>หมายเลขโทรศัพท์: " . $members['phone'] . "</h5>";
                echo "<h5 class='card-text'>อีเมล: " . $members['email'] . "</h5>";

                // ปุ่มแก้ไขโปรไฟล์
                echo "<a href='editform_profile.php' class='btn btn-warning ms-1 me-1'>แก้ไขโปรไฟล์</a>";

                // ปุ่มเปลี่ยนรหัสผ่าน
                echo "<a href='resetpass.php' class='btn btn-dark ms-1 me-1'>เปลี่ยนรหัสผ่าน</a>";

                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            mysqli_close($conn);
            ?>
        </div>
    </div>
    <script>
document.addEventListener("DOMContentLoaded", function() {
    // ดึงค่า selectedFarm จาก sessionStorage
    var selectedFarm = sessionStorage.getItem('selectedFarm');
    // นำค่ามาฟาร์มใส่
    if (selectedFarm) {
        document.getElementById("farmName").innerText = selectedFarm;
    }
});
    function showAlert() {
        alert('ระบบกำลังพัฒนา');
        }
</script>
</body>
</html>
