<?php 
    session_start();
    require_once "connection.php";
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $confirmpassword = $_POST['confirmpassword'];
        $user_check = "SELECT * FROM member WHERE email = '$email' LIMIT 1";
        $result = mysqli_query($conn, $user_check);
        if ($result) {
            $user = mysqli_fetch_assoc($result);
            if ($user && $user['email'] === $email) {
                echo "<script>alert('ชื่อผู้ใช้มีอยู่แล้ว');</script>";
            } elseif ($password == $confirmpassword) {
                $passwordenc = md5($password);
                $query = "INSERT INTO member (email, password, name, phone, userstatus)
                            VALUE ('$email', '$passwordenc', '$name', '$phone', 'user')";
                $result = mysqli_query($conn, $query);

                if ($result) {
                    $_SESSION['success'] = "สมัครสมาชิกสำเร็จ";
                    header("Location: index.php");
                } else {
                    $_SESSION['error'] = "บางอย่างผิดพลาด";
                    header("Location: index.php");
                }
            } else {
                echo "<script>alert('รหัสผ่านไม่ตรงกัน');</script>";
            }
        } else {  
            echo "Error: " . mysqli_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>สมัครสมาชิก</title>
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
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="mb-2 mt-3">
        <input type="text" class="form-control custom-form" name="name" id="name"  placeholder="ชื่อ-นามสกุล" require>
    </div>
    <div class="mb-2 mt-3">
        <input type="text" class="form-control custom-form" name="email" id="email" placeholder="อีเมล" required>
    </div>
    <div class="mb-2 mt-3">
        <input type="text" class="form-control custom-form" name="phone" id="phone" placeholder="หมายเลขโทรศัพท์" required>
    </div>
    <div class="mb-2 mt-3">
        <input type="password" class="form-control custom-form" name="password" id="password" placeholder="สร้างรหัสผ่าน" required>
    </div>
    <div class="mb-2 mt-3">
        <input type="password" class="form-control custom-form" name="confirmpassword" id="confirmpassword" placeholder="ยืนยันรหัสผ่าน" required>
    </div>
    <div class="mb-3  text-center">
        <input type="submit" class="btn btn-warning custom-btn" name="submit" value="สมัครสมาชิก">
    </div>
    <p class="text-center"style="font-size: 16px;">เป็นสมาชิกอยู่แล้ว? <a href="index.php" class="text" style="font-size: 16px;">เข้าสู่ระบบ</a>
    </form>
</div>
</div>
</body>
</html>