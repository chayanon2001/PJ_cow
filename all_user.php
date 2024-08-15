<?php
include 'navigation_admin.php';
require_once "connection.php";
nav();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมาชิกในระบบ</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@300;600&family=Noto+Sans+Thai:wght@700&family=Pattaya&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="admin_page.css">
    <style>
        .align-right {
            margin-bottom: 20px;
        }

        h5 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin-right: 8px;
            cursor: pointer;
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
    </style>
</head>
<body>
<div class="flex-container">
    <a href="resetpass_admin.php" class="align-right">
        ผู้ดูแลระบบ: <?php echo $_SESSION['user']; ?> <i class="ri-user-settings-line"></i>
    </a>
</div>
    <h5>ผู้ใช้งานในระบบ</h5>
    <div class="col-6 mx-auto">
        <table class="table text-center">
            <?php
            $sql = "SELECT * FROM member ORDER BY member_id";
            $query = mysqli_query($conn, $sql);

            while ($members = mysqli_fetch_assoc($query)) {
                echo "<tr>";
                echo "<td>" . $members['name'] . "</td>";
                echo '<td><a href="deleteuser.php?id=' . $members['member_id'] . '"><button class="btn btn-danger">ลบ</button></a></td>';
                echo '<td><a href="one_user.php?member_id=' . $members['member_id'] . '"><button class="btn btn-dark">ดู</button></td>';
                echo "</tr>";
            }
            mysqli_close($conn);
            ?>
        </table>
    </div>
</body>
</html>
