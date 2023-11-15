<?php
if (isset($_GET['id'])) {
    include("db_conn.php");
    $id = $_GET['id'];
    $sql = "DELETE FROM useradmin WHERE id='$id'";
    if(mysqli_query($conn,$sql)){
        session_start();
        $_SESSION["delete"] = "ลบข้อมูลพนักงานเรียบร้อย";
        header("Location:admin_user.php");

    } else {
        die("เกิดข้อผิดพลาดบางอย่าง");
    }
} else {
    echo "ข้อมูลพนักงานไม่มี";
}
?>