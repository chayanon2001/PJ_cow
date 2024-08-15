<?php
include 'navigation_admin.php';
require_once "connection.php";
nav();
session_start();
if (!$_SESSION['userid']) {
    exit();
} 
if (isset($_GET['member_id'])) {
    $member_id = $_GET['member_id'];

    $member_sql = "SELECT * FROM member WHERE member_id = $member_id";
    $member_result = $conn->query($member_sql);
    
    if ($member_result->num_rows > 0) {
        $member_row = $member_result->fetch_assoc();
        $name = $member_row['name'];
        $email = $member_row['email'];
        $phone = $member_row['phone'];
        $farm_sql = "SELECT * FROM farm WHERE member_id = $member_id";
        $farm_result = $conn->query($farm_sql);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลสมาชิก</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@300;600&family=Noto+Sans+Thai:wght@700&family=Pattaya&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="admin_page.css">
    <style>
        body {
            font-family: 'IBM Plex Sans Thai', sans-serif;
        }

        .container-fluid {
            margin-top: 20px;
        }

        .card {
            border: none;
            background: #59380E;
        }

        .card-body {
            padding: 20px;
            color: #fff;
        }

        .mb-3 {
            margin-bottom: 15px;
        }

        .font-normal {
            font-weight: normal;
        }

        .fs-4 {
            font-size: 1.5rem;
        }
    </style>
</head>
<body> 
    <div class="container-fluid">
        <form action="onecow.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-4 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3 mt-1">
                                <?php echo "<h5 class='font-normal fs-4'> ชื่อ: $name</h5>"; ?>
                            </div>
                            <div class="mb-3">
                                <?php echo "<h5 class='font-normal fs-4'>อีเมล: $email</h5>"; ?>
                            </div>
                            <div class="mb-3">
                                <?php echo "<h5 class='font-normal fs-4'> หมายเลขโทรศัพท์: $phone</h5>"; ?>
                            </div>
                            <?php
                            while ($farm_row = $farm_result->fetch_assoc()) {
                                $farm_name = $farm_row['name'];
                                echo "<div class='mb-3'>";
                                echo "<h5 class='font-normal fs-4'> ชื่อฟาร์ม: $farm_name</h5>";
                                echo "</div>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>

