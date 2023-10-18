<?php
include('db_conn.php');
if (isset($_POST["create"])) {
    $brand = mysqli_real_escape_string($conn, $_POST["brand"]);
    $modelcar = mysqli_real_escape_string($conn, $_POST["modelcar"]);
    $registercar = mysqli_real_escape_string($conn, $_POST["registercar"]);
    $typecar = mysqli_real_escape_string($conn, $_POST["typecar"]);
    $colorcar = mysqli_real_escape_string($conn, $_POST["colorcar"]);
    $capacity = mysqli_real_escape_string($conn, $_POST["capacity"]);
    $price = mysqli_real_escape_string($conn, $_POST["price"]);
    $sqlInsert = "INSERT INTO car(brand , modelcar , registercar , typecar , colorcar , capacity , price) VALUES (' $brand','$modelcar','$registercar', '$typecar' , ' $colorcar' , '$capacity' , '$price')";
    if(mysqli_query($conn,$sqlInsert)){
        session_start();
        $_SESSION["create"] = "เพิ่มข้อมูลรถสำเร็จ";
        header("Location:cars.php");
    }else{
        die("เกิดข้อผิดพลาดบางอย่าง");
    }
}
if (isset($_POST["edit"])) {
    $brand = mysqli_real_escape_string($conn, $_POST["brand"]);
    $modelcar = mysqli_real_escape_string($conn, $_POST["modelcar"]);
    $registercar = mysqli_real_escape_string($conn, $_POST["registercar"]);
    $typecar = mysqli_real_escape_string($conn, $_POST["typecar"]);
    $colorcar = mysqli_real_escape_string($conn, $_POST["colorcar"]);
    $capacity = mysqli_real_escape_string($conn, $_POST["capacity"]);
    $price = mysqli_real_escape_string($conn, $_POST["price"]);
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $sqlUpdate = "UPDATE car SET brand = '$brand', modelcar = '$modelcar', registercar = '$registercar', typecar = '$typecar', colorcar = '$colorcar', capacity = '$capacity', price = '$price' WHERE id='$id'";
    if(mysqli_query($conn,$sqlUpdate)){
        session_start();
        $_SESSION["update"] = "อัปเดตข้อมูลรถสำเร็จ";
        header("Location:cars.php");
    }else{
        die("เกิดข้อผิดพลาดบางอย่าง");
    }
}
?>