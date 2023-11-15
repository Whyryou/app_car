<?php
session_start();
include "db_conn.php";

if (isset($_SESSION['user_name']) && isset($_SESSION['name']) && isset($_SESSION['email']) && isset($_SESSION['id'])) {

    $user_name = $_SESSION['user_name'];
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $id = $_SESSION['id'];

    // แสดงข้อมูลโปรไฟล์
    echo "<h1>โปรไฟล์ของคุณ</h1>";
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
