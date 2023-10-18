<?php
if (isset($_GET['id'])) {
include("db_conn.php");
$id = $_GET['id'];
$sql = "DELETE FROM car WHERE id='$id'";
if(mysqli_query($conn,$sql)){
    session_start();
    $_SESSION["delete"] = "ลบข้อมูลรถเรียบร้อย";
    header("Location:cars.php");
}else{
    die("เกิดข้อผิดพลาดบางอย่าง");
}
}else{
    echo "ข้อมูลรถไม่มี";
}
?>