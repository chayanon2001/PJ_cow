<?php
include_once 'connection.php';
include 'navigation.php';
nav();
session_start();

if (!isset($_SESSION['userid'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@300;600&family=Noto+Sans+Thai:wght@700&family=Pattaya&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="user_page.css">
    <title>แก้ไขข้อมูลวัว</title>
    <style>
        body {
            font-family: 'IBM Plex Sans Thai', sans-serif;
        }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card col-8">
            <div class="card-body">
                <?php
                $cow_id = $_GET['cow_id'];
                require_once('connection.php');
                $query = "SELECT * FROM cow where cow_id = '$cow_id'";
                $result = $conn->query($query) or die("Query failed");
                $row = $result->fetch_array();
                $cow_id = $row["cow_id"];
                $name = $row["name"];
                $gender = $row["gender"];
                $date = $row["date"];
                $price = $row["price"];
                $age = $row["age"];
                echo "<p class=\"fs-2\">แก้ไขข้อมูล$name</p>";
                ?>
                <form action="edit_cow.php" method="POST">
                <input type="hidden" name = "cow_id" class="form-control" value = "<?php echo $cow_id;?>">
                    <label for="name" class="form-label">ชื่อวัว</label>
                    <input type="text" class="form-control" name="name"id="name" value = "<?php echo $name;?>">
                    <div class="mb-3 form-check">
                        <input type="radio" name="gender" value="เพศผู้" <?php echo ($gender === 'เพศผู้') ? 'checked' : ''; ?> required>
                        <label class="form-check-label" for="male">เพศผู้</label>
                        <br>
                        <input type="radio" name="gender" value="เพศเมีย" <?php echo ($gender === 'เพศเมีย') ? 'checked' : ''; ?> required>
                        <label class="form-check-label" for="female">เพศเมีย</label>
                    </div>
                    <label for="name" class="form-label">วันเกิด</label>
                    <input type="date" class="form-control" name="date"id="date" value = "<?php echo $date;?>">
                    <label for="name" class="form-label">อายุ</label>
                    <input type="age" class="form-control" name="age"id="age" value = "<?php echo $age;?>">
                    <label for="name" class="form-label">ราคา</label>
                    <input type="price" class="form-control" name="price"id="price" value = "<?php echo $price;?>">
                    </div>
                    <div class="mb-3 mt-3 text-center"> <!-- Added text-center class here -->
                        <input type="submit" class="btn btn-dark" name="update" value="แก้ไข">
                        <input type="button" class="btn btn-danger" value="กลับ" onclick="window.location.href='showcow.php'">
                    </div>
                </form>
                <?php
                $result->free();
                $conn->close();
                ?>
            </div>
        </div>
    </div>
</body>

</html>
