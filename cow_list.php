<?php
    require_once('connection.php');
    $searchField = isset($_POST['field']) ? $_POST['field'] : NULL; 
    $textSearch = isset($_POST["textSearch"]) ? $_POST["textSearch"] : NULL; 
    if (!isset($textSearch)) {
        $query = "SELECT cow_id, name, gender, age FROM cow WHERE member_id = '" . $_SESSION['userid'] . "' ORDER BY age";
    } else {
        $query = "SELECT * FROM cow WHERE member_id = '" . $_SESSION['userid'] . "' AND $searchField LIKE '%$textSearch%' ORDER BY cow_id";
    }
    $result = $conn->query($query) or die("เกิดข้อผิดพลาดในการค้นหา");
    if($result->num_rows == 0){ 
        die("ไม่มีวัวในฟาร์ม"); 
    } 
    print "<table class='table table-striped' style='text-align: center;'>";
    echo "<tr><th>ชื่อวัว</th><th>เพศ</th><th>อายุ/เดือน</th><th colspan='4'>เลือกทำงาน</th></tr>";
    while ($row = $result->fetch_array()) {
        echo "<tr>"; 
        echo "<td> ", $row["name"], "</td>";
        echo "<td> ", $row["gender"], "</td>";
        echo "<td> ", $row["age"], "</td>";
        $cow_id = $row["cow_id"];
        echo "<td> <a href=\"onecow.php?cow_id=$cow_id\" class='btn btn-primary'>ดู</a></td>";
        echo "<td> <a href=\"editform_cow.php?cow_id=$cow_id\" class='btn btn-warning'>แก้ไข</a></td>";
        echo "<td> <a href=\"deletecow.php?cow_id=$cow_id\" class='btn btn-danger'>ลบ</a></td>";
        echo "<td> <a href=\"qr.php?cow_id=$cow_id\" class='btn btn-success'>สร้าง</a></td>";        
        echo "</tr>";
    }
    echo "</table>";
    echo "จำนวนวัวทั้งหมด ", $result->num_rows, " รายการ<br>";
    $result->free_result();
    $conn->close();
?>
