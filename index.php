<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ลงชื่อเข้าใช้</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@300;600&family=Noto+Sans+Thai:wght@700&family=Pattaya&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php if (isset($_SESSION['success'])) : ?>
    <script>
        var successMessage = "<?php echo $_SESSION['success']; ?>";
            alert(successMessage);
    </script>
    <?php endif; ?>
    <?php if (isset($_SESSION['error'])) : ?>
    <script>
         var successMessage = "<?php echo $_SESSION['error']; ?>";
            alert(successMessage);
                </script>
    <?php endif; ?>
 <div class="card">
    <body>
            <div class="container mt-3">
                <div class="logo"><img src="images/logo.jpg"></div>
                <form method="post" action="./login.php">
            <div class="input group mt-2">
                <input type="text" class="form-control custom-form" name="email" id="email"  placeholder="อีเมล"  required>
            </div>
            <div class="mb-3 mt-2">
                <input type="password" class="form-control custom-form" name="password" id="password"placeholder="รหัสผ่าน"  required>
                <a href="sendmail.php" class="text" style="float: right; font-size: 12px;">ลืมรหัสผ่าน</a>
                </div>
            </div>
            
            <div class="mb-3  text-center">
                <input type="submit" class="btn btn-success custom-btn" value="เข้าสู่ระบบ"><br>
            </div>
        </form>
        <form method="post" action="register.php">
            <div class="mb-3 text-center">
                <input type="submit" class="btn btn-warning custom-btn" value="สมัครสมาชิก" formaction="register.php">
            </div>
            </form>   
             </div>
        </body>
</body>
</html>
<?php 
    if (isset($_SESSION['success']) || isset($_SESSION['error'])) {
        session_destroy();
    }

?>