<?php
include 'navigation.php';
require_once "connection.php";
nav();
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
    <title>เปลี่ยนรหัสผ่าน</title>
    <style>

        body {
            background-color: #f8f9fa;
            font-family: 'IBM Plex Sans Thai', sans-serif !important;
        }
        .row {
            margin-top: 20px;
        }
        .pass {
            border: 1px solid #e9ecef;
            border-radius: 10px;
            padding: 20px;
        }

        .custom-btn {
            background-color: #ffc107;
            color: #212529;
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
</head>
<body>
<div class="flex-container">
        <a href="list_farm.php" class="align-left">
            <i class="ri-home-8-line"></i> ชื่อฟาร์ม: <span id="farmName"></span>
        </a>
        <a href="me.php" class="align-right">
       ผู้ใช้งาน: <?php echo $_SESSION['user']; ?> <i class="ri-user-settings-line"></i>
</div>
        <div class="container-fluid mt-1">
        <div class="row">
            <!-- คอลัมน์ซ้าย -->
            <div class="col-4 p-3">  
            </div>

            <!-- คอลัมน์ขวา -->
            <div class="bg-light col-4 p-3">
                <div class="pass"> 
                <p class="text-center">เปลี่ยนรหัสผ่าน</p><br>
                    <input type="text" class="form-control" name="" placeholder="รหัสผ่านเก่า" ><br>
                    <input type="text" class="form-control" name="" placeholder="รหัสผ่านใหม่" ><br>
                    <input type="text" class="form-control" name="" placeholder="ยืนยันรหัสผ่าน" ><br>
                    <div class="mb-3 text-center">
                        <input type="submit" class="btn btn-warning custom-btn" value="ยืนยัน" name="submit" style="background-color: #776663; color: #ffffff;">
                    </div>
                </form>    
            </div>

                <div class="col-4 p-3">  
                </div>

            </div>
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
    </script>
</body>
</html>
