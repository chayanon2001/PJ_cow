<?php
include_once 'connection.php';
include 'navigation.php';
nav();
session_start();

if (!isset($_SESSION['userid'])) {
    header("Location: login.php");
    exit();
}
// Fetch user data based on session userid
$user_id = $_SESSION['userid'];
$query = "SELECT * FROM member WHERE member_id = $user_id";
$result = mysqli_query($conn, $query);

if (!$result) {
    echo "<div class='alert alert-danger' role='alert'>Error fetching user information: " . mysqli_error($conn) . "</div>";
    exit();
}
$user_data = mysqli_fetch_assoc($result);
$name = $user_data['name'];
$phone = $user_data['phone'];
$email = $user_data['email'];

// Close the result set
mysqli_free_result($result);

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
    <title>แก้ไขข้อมูลส่วนตัว</title>
    <style>
        body {
            font-family: 'IBM Plex Sans Thai', sans-serif;
        }
    </style>
</head>

<div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card col-8">
            <div class="card-body">
                <?php
                if (isset($_POST['update'])) {
                    $name = mysqli_real_escape_string($conn, $_POST['name']);
                    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
                    $email = mysqli_real_escape_string($conn, $_POST['email']);
                    $member_id = mysqli_real_escape_string($conn, $_POST['member_id']);

                    // Update the user's information
                    $update_query = "UPDATE member SET name = '$name', phone = '$phone', email = '$email' WHERE member_id = '$member_id'";
                    if ($conn->query($update_query) === TRUE) {
                        // Success message or redirect to profile page
                        header("Location: me.php");
                        exit();
                    } else {
                        // Display an error message
                        echo "<div class='alert alert-danger' role='alert'>Error updating information: " . $conn->error . "</div>";
                    }
                }

                echo "<p class=\"fs-2\">แก้ไขข้อมูล $name</p>";
                ?>
                <form action="edit_profile.php" method="POST">
                    <input type="hidden" name="member_id" class="form-control" value="<?php echo $user_id; ?>">
                    <label for="name" class="form-label">ชื่อ</label>
                    <input type="text" class="form-control" name="name" id="name" value="<?php echo $name; ?>">
                    <label for="name" class="form-label">หมายเลขโทรศัพท์</label>
                    <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $phone; ?>">
                    <label for="name" class="form-label">อีเมล</label>
                    <input type="text" class="form-control" name="email" id="email" value="<?php echo $email; ?>">
                    </div>
                    <div class="mb-3 mt-3 text-center">
                        <input type="submit" class="btn btn-dark" name="update" value="แก้ไข">
                        <input type="button" class="btn btn-danger" value="กลับ" onclick="window.location.href='me.php'">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
