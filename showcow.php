<?php
include 'navigation.php';
nav();
session_start();
if (!$_SESSION['userid'])
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@300;600&family=Noto+Sans+Thai:wght@700&family=Pattaya&display=swap"
        rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="user_page.css">
    <title>รายละเอียดวัว</title>
    </head>
    <style>
        body {
        font-family: 'IBM Plex Sans Thai', sans-serif;
    }

    h5 {
        font-family: 'Noto Sans Thai', sans-serif;
    }

    .flex-container {
        display: flex;
        justify-content: space-between;
        margin: 10px;
    }
    a {
    text-decoration: none;
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
    <div class="container mt-3">
            <div class="row">
                <form method="post" class="row g-3">
                <div class="mb-3 col-4">
                    <select class="form-select" name="field" size="1">
                        <option value="gender">เพศ</option>
                        <option value="age">อายุ</option>
                    </select>
                </div>
                <div class="mb-3 col-4">
                    <input type="text" name="textSearch" class="col form-control"size="30">
                </div>
                <div class="mb-3 col-4">
                    <input type=submit name="searchBtn" class="btn btn-dark" value="ค้นหา" formaction = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                </div>
            </form>
        </div>
    <?php
    include "cow_list.php";
    ?>
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