<?php 
include 'navigation_admin.php';
require_once "connection.php";
session_start();
nav();
if (!isset($_SESSION['userid'])) {
    // Redirect or handle not logged in case
}

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $details = mysqli_real_escape_string($conn, $_POST['details']);
    
    $query = "INSERT INTO feed (name, details) VALUES ('$name', '$details')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo '<script>alert("เพิ่มข้อมูลอาหารเสริมสำเร็จ");</script>';
        echo '<script>window.location.href = "insert_feed.php";</script>';
    } else {
        $_SESSION['error'] = "บางอย่างผิดพลาด";
        header("Location: insert_feed.php");
    }
}
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
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="admin_page.css">
    <title>เพิ่มอาหารเสริม</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .row {
            margin-top: 20px;
        }
        .col-4 {
            background-color: #DBDBDB;
            border-radius: 10px;
            padding: 20px;
            margin-right: 10px;
            margin-left: 10px;
        }
        .col-3 {
            background-color: #DBDBDB;
            border-radius: 10px;
            padding: 20px;
            margin-left: 300px;
            margin-right: 10px;
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
        }
        a{
            text-decoration: none;
        }
    </style>
    <title>หน้าหลัก</title>
</head>
<body>
<div class="flex-container">
    <a href="resetpass_admin.php" class="align-right">
        ผู้ดูแลระบบ: <?php echo $_SESSION['user']; ?> <i class="ri-user-settings-line"></i>
    </a>
</div>
    <div class="container-fluid row">
        <div class="col-3 p-3">   
            <h5>ข้อมูลอาหารเสริมในระบบ</h5>
            <?php
    $sql = "SELECT * FROM feed ORDER BY feed_id";
    $query = mysqli_query($conn, $sql);
?>
<table>
    <tr>
        <th>ชื่ออาหารสัตว์</th>
        <th>รายการ</th>
    </tr>
    <?php
        while ($feeds = mysqli_fetch_assoc($query)) {
            echo "<tr>";
            echo "<tr>";
            echo "<td>" . $feeds['name'] . "</td>";
            echo '<td><a href="edit_feed.php?id=' . $feeds['feed_id'] . '">แก้ไข</a></td>';
            echo "</tr>";
        }
    ?>
</table>
<?php
    mysqli_close($conn);
?>

        </div>
        <div class="col-4 p-3"> 
            <div class="vac"> 
                <p>เพิ่มข้อมูลอาหารเสริม</p><br>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <input type="text" class="form-control" name="name" placeholder="กรอกชื่ออาหารเสริม" id="name" required><br>
                    <input type="text" class="form-control" name="details" placeholder="รายละเอียดอาหารเสริม" id="details" required><br>
                    <div class="mb-3 text-center">
                        <input type="submit" class="btn btn-warning custom-btn" value="เพิ่มอาหารเสริม" name="submit" style="background-color: #776663; color: #ffffff;">
                    </div>
                </form>    
            </div>
        </div>  
    </div>
</body>
</html>



