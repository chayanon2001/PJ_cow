<?php 

    session_start();

    if (isset($_POST['email'])) {

        include('connection.php');

        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordenc = md5($password);

        $query = "SELECT member_id, email, password, name, phone, userstatus FROM member
                  WHERE email = '$email' AND password = '$passwordenc'
                  UNION
                  SELECT admin_id, email, password, name, phone, userstatus FROM admin
                  WHERE email = '$email' AND password = '$passwordenc'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $_SESSION['userid'] = $row['member_id'];
            $_SESSION['user'] = $row['name'];
            $_SESSION['userstatus'] = $row['userstatus'];

            if ($_SESSION['userstatus'] == 'admin') {
                header("Location: admin_page.php");
            }

            if ($_SESSION['userstatus'] == 'user') {
                header("Location: list_farm.php");
            }
        } else {
            echo '<script>alert("User หรือ Password ไม่ถูกต้อง");</script>';
            echo '<script>window.location.href = "index.php";</script>';
        }

    } else {
        header("Location: index.php");
    }


?>