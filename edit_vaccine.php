<?php
include 'navigation_admin.php';
require_once "connection.php";
session_start();
nav();
if (!isset($_SESSION['userid'])) {
    // ไปยังหน้าที่ต้องการหากไม่ได้เข้าสู่ระบบ
    header("Location: insert_vc.php");
    exit;
}

if (isset($_POST['update'])) {
    $vaccine_id = mysqli_real_escape_string($conn, $_POST['vaccine_id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $details = mysqli_real_escape_string($conn, $_POST['details']);
    $frequency = mysqli_real_escape_string($conn, $_POST['frequency']);

    $query = "UPDATE vaccine SET name = '$name', details= '$details',frequency='$frequency' WHERE vaccine_id = $vaccine_id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo '<script>alert("อัปเดตข้อมูลวัคซีนสำเร็จ");</script>';
        echo '<script>window.location.href = "insert_vc.php";</script>';
    } else {
        $_SESSION['error'] = "บางอย่างผิดพลาด";
        header("Location: insert_vc.php");
    }
}

if (isset($_GET['id'])) {
    $vaccine_id = $_GET['id'];
    $query = "SELECT * FROM vaccine WHERE vaccine_id = $vaccine_id";
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
    <title>แก้ไขข้อมูลวัคซีน</title>
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
        .custom-btn {
            background-color: #ffc107;
            color: #212529;
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
                <h3>แก้ไขข้อมูลวัคซีน</h3><br>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <input type="hidden" name="vaccine_id" value="<?php echo $row['vaccine_id']; ?>">
                    <div class="mb-3">
                        <label for="name" class="form-label">ชื่อวัคซีน</label>
                        <input type="text" class="form-control" name="name" id="name" value="<?php echo $row['name']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="details" class="form-label">รายละเอียดวัคซีน</label>
                        <input type="text" class="form-control" name="details" id="details" value="<?php echo $row['details']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="frequency" class="form-label">ความถี่ในการฉีด</label>
                        <input type="text" class="form-control" name="frequency" id="frequency" value="<?php echo $row['frequency']; ?>" required>
                    </div>
                    <div class="mb-3 text-center">
                        <input type="submit" class="btn btn-warning custom-btn" value="อัปเดตข้อมูล" name="update">
                        <input type="button" class="btn btn-danger" value="กลับ"onclick="window.location.href='insert_vc.php'">
                    </div>
                </form>    
            </div>
        </div>  
    </div>
</body>
</html>
