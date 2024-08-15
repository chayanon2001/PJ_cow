<?php 
session_start();
include_once 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>เพิ่มฟาร์ม</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@300;600&family=Noto+Sans+Thai:wght@700&family=Pattaya&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        .bg {
            width: 100%;
            background: #D3D3D3;
            border-radius: 10px;
            text-align: center;
            margin: auto;
            height: 80px;
        }
        a:link {   
            color: green;
            background-color: transparent;
            text-decoration: none;
            text-align: center;
        }
        a:visited {
            color: black;
            background-color: transparent;
            text-decoration: none;
        }
        a:hover {
            color: red;
            background-color: transparent;
            text-decoration: none;
        }
        a:active {
            color: yellow;
            background-color: transparent;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="align-right"> </div>
    <div class="card mt-3">
        <div class="logo"><img src="images/logo.jpg"></div>
        <div class="text-center mt-2" >
            <form method="post" action="index.php">
                <?php echo $_SESSION['user']; ?>
            </form>
        </div> 
        <div class="row">
            <div class="col-5 p-3 ">
                <ul>
                    <?php
                    $sql = "SELECT farm_id, name FROM farm WHERE member_id = '" . $_SESSION['userid'] . "' ORDER BY farm_id";
                    $query = mysqli_query($conn, $sql);
                    $no = 1;
                        while ($farm = mysqli_fetch_assoc($query)) {
                            echo "<br><td><a href='user_page.php' onclick=\"sessionStorage.setItem('selectedFarm', '" . $farm['name'] . "');\">" . $farm['name'] . "</a></td>";
                            $no++;
                        }                        
                        $no++;            
                    ?>
                </ul>
        
            </div>
            <div class="mb-3 text-center">
                <a href="regisfarm.php">
                    <input type="submit" class="btn btn-warning custom-btn"  value="เพิ่มฟาร์ม">
                </a>
            </div>
        </div>
    </div>
</body>
</html>
