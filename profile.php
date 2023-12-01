<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>โปรไฟล์</title>
     <style>
        .car-chiangrai{
            background-color:#fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
       h3{
        font-size: 24px;
        margin-top: 20px;
       }
       img {
        max-width: 100%;
        height: auto;
        margin-top: 10px;
       }
    </style>
    <link rel="stylesheet" type="text/css" href="css/style_menuber.css">

</head>

<boby>
    <div class="container my-4">
        <header class="d-flex justify-content-between my-4">
            <h1>โปรไฟล์ของคุณ</h1>
            <div>
                <a href="menubar.php" class="btn btn-primary">กลับ</a>
            </div>
        </header>
        <div class="car-chiangrai p-5 my-4">
<?php
session_start();
include "db_conn.php";

if (isset($_SESSION['user_name']) && isset($_SESSION['name']) && isset($_SESSION['email']) && isset($_SESSION['id'])) {

    $user_name = $_SESSION['user_name'];
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $id = $_SESSION['id'];

    // แสดงข้อมูลโปรไฟล์
   
    echo "<p>ชื่อผู้ใช้งาน: $user_name</p>";
    echo "<p>ชื่อ-นามสกุล: $name</p>";
    echo "<p>อีเมล: $email</p>";
    

    // เพิ่มลิงก์ที่ช่วยให้ผู้ใช้ออกจากระบบ
    
} else {
    // หากไม่มีการเข้าสู่ระบบ
    header("Location: index.php");
    exit();
}
?>
 </div>
    </div>
</boby>
</html>
