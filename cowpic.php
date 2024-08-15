<?php 
include 'navigation.php';
nav(); 
require_once "connection.php";
session_start();
    if (!$_SESSION['userid'])
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@300;600&family=Noto+Sans+Thai:wght@700&family=Pattaya&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="user_page.css">
    <title>บันทึกข้อมูล</title>
</head>
    <style>
        body {
            font-family: 'IBM Plex Sans Thai', sans-serif !important;
        }
        h5 {
            font-family: 'Noto Sans Thai', sans-serif !important;
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
        }
    </style>
<body>
<div class="flex-container">
    <a href="list_farm.php" class="align-left">
         ชื่อฟาร์ม: <span id="farmName"></span><i class="ri-refresh-line"></i>
    </a>
    <a href="me.php" class="align-right">
        ผู้ใช้งาน: <?php echo $_SESSION['user']; ?> <i class="ri-user-settings-line"></i>
    </a>
</div>
<div class="container-fluid mt-1">
    <form action="uploadcow.php" method="POST" enctype="multipart/form-data">
        <div class="row">
            <!-- คอลัมน์ซ้าย -->
            <div class="col-6 p-3">
                <div class="d-flex justify-content-center align-items-center m-3">
                    <!-- รูปภาพที่จะแสดง -->
                    <img id="previewImage" src="images/up.png" style="width: 400px;" />
                </div>

                <div class="text-center justify-content-center align-items-center">
                    <label for="file" class="btn btn-success custom-btn">อัพโหลดภาพ 
                        <input type="file" name="file" id="file" class="d-none" accept="image/gif, image/jpeg, image/png" onchange="previewFile()">
                    </label>
                </div>

                <script>
                    function previewFile() {
                        var preview = document.getElementById('previewImage');
                        var fileInput = document.getElementById('file');
                        var file = fileInput.files[0];

                        var reader = new FileReader();
                        reader.onloadend = function () {
                            preview.src = reader.result;
                        }

                        if (file) {
                            reader.readAsDataURL(file);
                        } else {
                            preview.src = "images/up.png"; // กำหนดให้แสดงรูปเริ่มต้นถ้าไม่มีไฟล์
                        }
                    }
                </script>
            </div>

            <!-- คอลัมน์ขวา -->
            <div class="col-5 p-3">
                <div class="mb-3">
                    <label for="name" class="form-label">ชื่อ</label>
                    <input type="text" class="form-control custom-form" name="name" require>
                </div>
                <label for="namegender" class="form-label">เพศ</label>
                <div class="mb-3 form-check">
                    <input type="radio" name="gender" value="เพศผู้" required>
                    <label class="form-check-label" for="male">เพศผู้</label>
                    <br>
                    <input type="radio" name="gender" value="เพศเมีย" required>
                    <label class="form-check-label" for="female">เพศเมีย</label>
                </div>
                <div class="mb-3">
                    <label for="datecow" class="form-label">วันเกิด</label>
                    <input type="date" class="form-control" name="date">
                </div>
                <div class="mb-3">
                    <label for="age" class="form-label">อายุ/เดือน</label>
                    <input type="number" class="form-control" name="age">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">ราคา</label>
                    <input type="number" class="form-control" name="price">
                </div>
                <div class="bottom">
                    <input type="submit" name="submit" value="บันทึก" class="btn btn-success">
                    <input type="reset" name="reset" value="ยกเลิก" class="btn btn-secondary">
                </div>
            </div>
        </div>
    </form>
</div>
</body>
</html>
<script>
    document.addEventListener("DOMContentLoaded", function() {
            // ดึงค่า selectedFarm จาก sessionStorage
    var selectedFarm = sessionStorage.getItem('selectedFarm');
            // นำค่ามาฟาร์มใส่
        if (selectedFarm) {
                document.getElementById("farmName").innerText = selectedFarm;
            }
        });
</script>