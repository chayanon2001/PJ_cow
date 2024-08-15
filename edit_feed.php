<?php
include 'navigation_admin.php';
require_once "connection.php";
session_start();
nav();
if (!isset($_SESSION['userid'])) {
    // ไปยังหน้าที่ต้องการหากไม่ได้เข้าสู่ระบบ
    header("Location: insert_feed.php");
    exit;
}

if (isset($_POST['update'])) {
    $feed_id = mysqli_real_escape_string($conn, $_POST['feed_id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $details = mysqli_real_escape_string($conn, $_POST['details']);

    $query = "UPDATE feed SET name = '$name', details = '$details' WHERE feed_id = $feed_id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo '<script>alert("อัปเดตข้อมูลอาหารเสริมสำเร็จ");</script>';
        echo '<script>window.location.href = "insert_feed.php";</script>';
    } else {
        $_SESSION['error'] = "บางอย่างผิดพลาด";
        header("Location: insert_feed.php");
    }
}

if (isset($_GET['id'])) {
    $feed_id = $_GET['id'];
    $query = "SELECT * FROM feed WHERE feed_id = $feed_id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@300;600&family=Noto+Sans+Thai:wght@700&family=Pattaya&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="admin_page.css">
    <title>แก้ไขข้อมูลอาหารเสริม</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .bg {
            background-color: #DBDBDB;
            border-radius: 10px;
            padding: 20px;
            margin: 20px;
        }
        .vac {
            border: 1px solid #e9ecef;
            border-radius: 10px;
            padding: 20px;
        }
       
       
    </style>
</head>
<body>
    <div class="container-fluid row">
        <div class="col-4 p-3">   
            <!-- แสดงข้อมูลที่ต้องการในหน้าแก้ไข -->
        </div>
        <div class="bg col-4 p-3"> 
            <div class="vac"> 
                <h3>แก้ไขข้อมูลอาหารเสริม</h3><br>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <input type="hidden" name="feed_id" value="<?php echo $row['feed_id']; ?>">
                    <div class="mb-3">
                        <label for="name" class="form-label">ชื่ออาหารเสริม</label>
                        <input type="text" class="form-control" name="name" id="name" value="<?php echo $row['name']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="details" class="form-label">รายละเอียดอาหารเสริม</label>
                        <input type="text" class="form-control" name="details" id="details" value="<?php echo $row['details']; ?>" required>
                    </div>
                    <div class="mb-3 text-center">
                        <input type="submit" class="btn btn-danger" value="อัปเดตข้อมูล" name="update">
                        <input type="button" class="btn btn-success" value="กลับ"onclick="window.location.href='insert_feed.php'">
                    </div>
                </form>    
            </div>
        </div>  
    </div>
</body>
</html>

