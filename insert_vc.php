<?php 
include 'navigation_admin.php';
require_once "connection.php";
nav();
    session_start();
    if (!$_SESSION['userid']) {
        header("Location: index.php");
    }
    if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $frequency=$_POST['frequency'];
        $details=$_POST['details'];   
        $query = "INSERT INTO vaccine (name, frequency, details ) VALUES
         ('$name', '$frequency', '$details ')";
             $result = mysqli_query($conn, $query);
             if ($result) {
                echo '<script>alert("เพิ่มข้อมูลอาหารเสริมสำเร็จ");</script>';
                echo '<script>window.location.href = "insert_vc.php";</script>';
            } else {
                $_SESSION['error'] = "บางอย่างผิดพลาด";
                header("Location: insert_vc.php");
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
    <title>เพิ่มวัคซีน</title>
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
            <h5>ข้อมูลวัคซีนในระบบ</h5>
            <?php
    $sql = "SELECT * FROM vaccine ORDER BY vaccine_id";
    $query = mysqli_query($conn, $sql);
?>
<table>
    <tr>
        <th>ชื่อวัคซีน</th>
        <th>รายการ</th>
    </tr>
    <?php
        while ($vaccines = mysqli_fetch_assoc($query)) {
            echo "<tr>";
            echo "<td>" . $vaccines['name'] . "</td>";
            echo '<td><a href="edit_vaccine.php?id=' . $vaccines['vaccine_id'] . '">แก้ไข</a></td>';
            echo "</tr>";
        }
    ?>
</table>

        </div>
        <div class="col-4 p-3"> <!-- เพิ่ม mx-auto ที่นี่ -->
            <div class="vac"> 
                <p>เพิ่มข้อมูลวัคซีน</p><br>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <input type="text" class="form-control" name="name" placeholder="กรอกชื่อวัคซีน" id="name" required><br>
                    <input type="text" class="form-control" name="details" placeholder="รายละเอียดวัคซีน" id="details" required><br>
                    <input type="text" class="form-control" name="frequency" placeholder="ความถี่ในการฉีดต่อเดือน" id="frequency" required><br>
                    <div class="mb-3 text-center">
                        <input type="submit" class="btn btn-warning custom-btn" value="เพิ่มวัคซีน" name="submit" style="background-color: #776663; color: #ffffff;">
                    </div>
                </form>    
            </div>
        </div>  
    </div>
</body>
</html>



