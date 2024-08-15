<?php
if (!function_exists('nav')) {
    function nav() {
        echo '
        <nav>
        <a href="user_page.php">หน้าหลัก</a>
        <a href="cowpic.php">บันทึกข้อมูล</a>
        <a href="showcow.php">รายละเอียด</a>
        <a href="vaccine_user.php">วัคซีน</a>
        <a href="feed_user.php">อาหารเสริม</a>
        <a class="logout" href="logout.php">ลงชื่อออก</a>
        </nav>
        ';
    }
}
?>
