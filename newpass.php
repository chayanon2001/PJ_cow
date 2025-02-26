<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>เปลี่ยนรหัสผ่าน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@300;600&family=Noto+Sans+Thai:wght@700&family=Pattaya&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="style.css">

</head>
<body>
<div class="card">
    <div class="container mt-3">
    <div class="logo"><img src="images/logo.jpg" width="200" height="200"></div>
    <div class="mb-2 mt-3">
        <input type="password" class="form-control custom-form" name="password" id="password" placeholder="รหัสผ่านเก่า" required>
    </div>
    <div class="mb-2 mt-3">
        <input type="password" class="form-control custom-form" name="password" id="password" placeholder="รหัสผ่านใหม่" required>
    </div>
    <div class="mb-3  text-center">
    <form action="index.php" method="post">
        <input type="submit" class="btn btn-warning custom-btn" name="submit" value="ยืนยัน">
        </form>
    </div>
</div>
</div>
</body>
</html>