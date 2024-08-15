<?php 
include 'navigation.php';
nav();
session_start();
if (!$_SESSION['userid']) 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@300;600&family=Noto+Sans+Thai:wght@700&family=Pattaya&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="user_page.css">
    <title>หน้าหลัก</title>
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
        margin-left: auto;
    }
    .nontifly {
        position: absolute;
        bottom: 0;
        right: 220;
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
<div class="text-center fs-1">
    <div class="row container-fluid mt-3">
        <div class="col-8 p-3 bg-light text-dark mx-auto">
            <p class="m-1" style="font-size: 70px;"></p>
            <div class="w3-content w3-display-container">
                <div class="div">
                    <a href="https://www.thairath.co.th/tags/%E0%B8%A7%E0%B8%B1%E0%B8%A7?fbclid=IwAR0kIBuhr7USsuBROt1WrNfJAwXdpe-9EtzxmlI92217QZ2IMg36JKDZT1g" target="_blank">
                        <img class="mySlides" src="images/5.jpg" style="width: 100%;">
                    </a>
                </div>
                <div class="div">
                    <a href="https://www.thairath.co.th/tags/เลี้ยงวัว" target="_blank">
                        <img class="mySlides" src="images/cow99.png" style="width: 100%;">
                    </a>
                </div>
            </div>
        </div>  
    </div>
    <div class="nontifly" onclick="showAlert()">
  <img src="images/non.png" style="width: 100px;">
</div>
</div>


<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}
    x[myIndex-1].style.display = "block";
    setTimeout(carousel, 3000); 
}
</script>
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
