<?php
include('db_conn.php');
if (isset($_POST["create"])) {

     if(empty($_POST["brand"]) || empty($_POST["modelcar"]) || empty($_POST["registercar"]) || empty($_POST["typecar"]) || empty($_POST["colorcar"]) || empty($_POST["capacity"]) || empty($_POST["price"]) || empty($_FILES['image']['name'])){
        // กรณีพบค่าว่าง แสดงข้อความแจ้งเตือน
        echo "กรุณากรอกข้อมูลให้ครบทุกช่อง";
        exit();
    }

    $brand = mysqli_real_escape_string($conn, $_POST["brand"]);
    $modelcar = mysqli_real_escape_string($conn, $_POST["modelcar"]);
    $registercar = mysqli_real_escape_string($conn, $_POST["registercar"]);
    $typecar = mysqli_real_escape_string($conn, $_POST["typecar"]);
    $colorcar = mysqli_real_escape_string($conn, $_POST["colorcar"]);
    $capacity = mysqli_real_escape_string($conn, $_POST["capacity"]);
    $price = mysqli_real_escape_string($conn, $_POST["price"]);

    if(!empty($_FILES['image']['name'])){
        $filename = md5($_FILES['image']['name'].time());
        $ext = explode('.', $_FILES['image']['name']);
        $dest = __DIR__.DIRECTORY_SEPARATOR.'image'.DIRECTORY_SEPARATOR.$filename.'.'.$ext[1];
        if(!copy($_FILES['image']['tmp_name'],$dest)){
            echo 'Upload Error';
            exit();
        }
        $image = $filename.'.'.$ext[1];
    }
    //insert data
    $sqlInsert = "INSERT INTO car(brand , modelcar , registercar , typecar , colorcar , capacity , price , image) VALUES (' $brand','$modelcar','$registercar', '$typecar' , ' $colorcar' , '$capacity' , '$price' ,'$image')";
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

    
    if (!empty($_FILES['image']['name'])) {
    $filename = md5($_FILES['image']['name'] . time());
    $ext = explode('.', $_FILES['image']['name']);
    $dest = __DIR__ . DIRECTORY_SEPARATOR . 'image' . DIRECTORY_SEPARATOR . $filename . '.' . $ext[1];
    if (!copy($_FILES['image']['tmp_name'], $dest)) {
        echo 'Upload Error';
        exit();
    }
    $image = $filename . '.' . $ext[1];
    } 
 if (!empty($_FILES['image']['name'])) {
        // โค้ดสำหรับการอัปโหลดไฟล์รูปภาพใหม่
        // ...
    } else {
        // ในกรณีที่ไม่ได้อัปโหลดรูปภาพใหม่ ให้ใช้ค่ารูปภาพเดิม
        $image = mysqli_real_escape_string($conn, $_POST["old_image"]); // ใช้ค่ารูปภาพเดิมที่เก็บไว้
    }


    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $sqlUpdate = "UPDATE car SET brand = '$brand', modelcar = '$modelcar', registercar = '$registercar', typecar = '$typecar', colorcar = '$colorcar', capacity = '$capacity', price = '$price' , image = '$image' WHERE id='$id'";
    if(mysqli_query($conn,$sqlUpdate)){
        session_start();
        $_SESSION["update"] = "อัปเดตข้อมูลรถสำเร็จ";
        header("Location:cars.php");
    }else{
        die("เกิดข้อผิดพลาดบางอย่าง");
    }
}
?>

