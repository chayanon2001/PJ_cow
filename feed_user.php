<?php
require_once 'connection.php';
include 'navigation.php';
nav();
session_start();

if (!isset($_SESSION['userid'])) {
    header("Location: login.php"); 
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit'])) { 
        $cowIds = $_POST['cow_id'];
        $feedIds = $_POST['feed_id'];
        $dates = $_POST['date'];
        foreach ($cowIds as $key => $cowId) {
            $feedId = $feedIds[$key];
            $date = $dates[$key];
            $insertQuery = "INSERT INTO feeding (cow_id, feed_id, member_id, date)
                            VALUES ('$cowId', '$feedId', '{$_SESSION['userid']}', '$date')";
            $result = mysqli_query($conn, $insertQuery);
            if ($result) {
                echo '<script>alert("เพิ่มข้อมูลรายการวัคซีนสำเร็จ");</script>';
                echo '<script>window.location.href = "feed_user.php";</script>';
            } else {
                echo '<script>alert("ขออภัย เกิดข้อผิดพลาดในการเพิ่มข้อมูลรายการวัคซีนคุณ");</script>';
                echo '<script>window.location.href = "feed_user.php";</script>';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายการอาหารเสริม</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@300;600&family=Noto+Sans+Thai:wght@700&family=Pattaya&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="user_page.css">
    <style>
        .container{
            margin-top: 50px;
        }
        .align-left,
        .align-left:hover,
        .align-left:active {
            text-decoration: none;
            color: #000;
            margin-right: 20px; 
        }

        .flex-container {
             display: flex;
            justify-content: space-between;
            margin: 10px;
        }

        .align-right,
        .align-right:hover,
        .align-right:active {
            text-decoration: none;
            color: #000;
            margin-left: 20px; 
        }

        body{
            font-family: 'IBM Plex Sans Thai', sans-serif !important;
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
    <div class="container">
        <form method="post">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th></th>
                    <th>รายชื่อวัว</th>
                    <th>อาหารเสริม</th>
                    <th>วันที่ให้อาหารเสริม</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result_cow = mysqli_query($conn, "SELECT cow_id, name, gender, age FROM cow WHERE member_id = '" . $_SESSION['userid'] . "' ORDER BY cow_id");
                $result_feed = mysqli_query($conn, "SELECT 	feed_id, name FROM feed");

                while ($row_cow = mysqli_fetch_assoc($result_cow)) {
                    echo '<tr>';
                    echo '<td><input type="checkbox" name="cow_id[]" value="' . $row_cow['cow_id'] . '"></td>';
                    echo '<td>' . $row_cow['name'] . '</td>';

                    echo '<td><select name="feed_id[]" class="form-control">';
                    while ($row_feed = mysqli_fetch_assoc($result_feed)) {
                        echo '<option value="' . $row_feed['feed_id'] . '">' . $row_feed['name'] . '</option>';
                    }
                    echo '</select></td>';

                    echo '<td><input type="date" name="date[]" class="form-control"></td>';
                    echo '</tr>';

                    mysqli_data_seek($result_feed, 0);
                }

                mysqli_close($conn);
                ?>
            </tbody>
        </table>
        <div class="text-center">
            <input type="submit" name="submit" class="btn btn-success" value="ยืนยัน">
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