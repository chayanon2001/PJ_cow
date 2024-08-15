<?php 
include 'navigation_admin.php';
require_once "connection.php";
nav();
session_start();
if (!$_SESSION['userid']) {
} 
$sql = "SELECT COUNT(*) as totalMembers FROM member";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$totalMembers = $row['totalMembers'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@300;600&family=Noto+Sans+Thai:wght@700&family=Pattaya&display=swap"
        rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="admin_page.css">
    <title>หน้าหลัก</title>
    <style>
        .align-right,
        .align-right:hover,
        .align-right:active {
            text-decoration: none;
            color: #000;
            margin-left: auto; 
        }
        .flex-container {
            display: flex;
            justify-content: space-between;
            margin: 10px;
        }
</style>

</head>
<body>
<div class="flex-container">
    <a href="resetpass_admin.php" class="align-right">
        ผู้ดูแลระบบ: <?php echo $_SESSION['user']; ?> <i class="ri-user-settings-line"></i>
    </a>
</div>
    <h5 class="text-center">ข้อมูลในระบบ</h5>
    <div class="square-container">
        <a class="square" href="all_user.php">จำนวนสมาชิกทั้งหมด <?php echo $totalMembers; ?> คน</a>
        <a class="square" href="insert_vc.php">วัคซีน</a>
        <a class="square" href="insert_feed.php">อาหารเสริม</a>
    </div>
</body>
</html>
