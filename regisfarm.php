<?php 
session_start();
require_once "connection.php"; 
$member_id = $_SESSION['userid'];
    if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $query = "INSERT INTO farm (name, member_id) VALUES ('$name', '$member_id')";
    $result = mysqli_query($conn, $query);
        if ($result) {
        header('location: list_farm.php');
    } else {
        echo "มีข้อผิดพลาดในการเพิ่มฟาร์ม: " . mysqli_error($conn);
    }
              }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>สร้างฟาร์ม</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@300;600&family=Noto+Sans+Thai:wght@700&family=Pattaya&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
       .btn-custom {
        background-color: #59380E;
        color: white;
        }

        .btn-custom:hover {
        background-color: #dd973c;
        }
    </style>

</head>
<body>
<div class="card">
    <div class="container mt-3">
    <div class="logo text-center"><img src="images/logo.jpg" width="200" height="200"></div>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="mb-3 mt-3">
    <?php echo $_SESSION['user']; ?>
    </div>
    <div class="mb-3 mt-3">
    <label for="name" class="form-label text-center">ชื่อฟาร์ม</label>
    <input type="text" name="name" id="name" class="form-control" placeholder="ชื่อฟาร์ม" required>
    </div>
    <div class="mb-3 text-center">
        <button type="submit" class="btn btn-custom" name="submit">สร้างฟาร์ม</button>
        <a href="list_farm.php" class="btn btn-secondary">ย้อนกลับ</a>
    </div>
</body>
</html>