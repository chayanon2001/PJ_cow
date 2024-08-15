<?php 
include 'navigation.php';
nav(); 
include_once 'connection.php';
session_start();
if (!$_SESSION['userid']) {
  // Handle the case when the user is not logged in
  // Redirect or show an error message, as needed
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@300;600&family=Noto+Sans+Thai:wght@700&family=Pattaya&display=swap"
        rel="stylesheet">
  <link rel="stylesheet" href="qrcode.css">
  <title>QR-Code</title>
</head>
<body>
  <div class="container"> 
    <div class="header">
      <center><h1>สร้างรหัส QR Code</h1></center>
      <p>ป้อนข้อมูลเพื่อสร้าง QR Code</p>
    </div>
    <div class="input-form ">
      <input type="text" class="qr-input">
      <button class="Create-btn">สร้าง</button>
      <a href="" class="Download-btn">ดาวน์โหลด QR Code</a>
    </div>
    <div class="qr-code">
      <img src="images/qrcode.png" class="qr-image" id="downloadQrCode">
    </div>
  </div>

  <script>
    var container = document.querySelector(".container");
    var CreateBtn = document.querySelector(".Create-btn");
    var qrInput = document.querySelector(".qr-input");
    var qrImg = document.querySelector(".qr-image");
    var downloadBtn = document.querySelector(".Download-btn");

    CreateBtn.onclick = function () {      
      if(qrInput.value.length > 0){ 
        CreateBtn.innerText = "สร้าง QR Code..."       
        qrImg.src = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data="+qrInput.value;
        qrImg.onload = function () {
        container.classList.add("active");
        CreateBtn.innerText = "สร้าง QR Code";
        downloadBtn.href = qrImg.src;  // Update the href attribute
        downloadBtn.style.display = "inline-block";
      }
      }
    }
  </script>
</body>
</html>
