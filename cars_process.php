<?php
include('db_conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["create"])) {
    $brand = mysqli_real_escape_string($conn, $_POST["brand"]);
    $modelcar = mysqli_real_escape_string($conn, $_POST["modelcar"]);
    $registercar = mysqli_real_escape_string($conn, $_POST["registercar"]);
    $typecar = mysqli_real_escape_string($conn, $_POST["typecar"]);
    $colorcar = mysqli_real_escape_string($conn, $_POST["colorcar"]);
    $capacity = mysqli_real_escape_string($conn, $_POST["capacity"]);
    $price = mysqli_real_escape_string($conn, $_POST["price"]);

   
    // ตรวจสอบว่าไฟล์มีอยู่แล้วหรือไม่
    if (!empty($_FILES['image']['name']) && !empty($_FILES['image_1']['name']) && !empty($_FILES['image_2']['name'])) {
        $target_dir = "image/";  // โฟลเดอร์ที่เก็บไฟล์

        $target_file_1 = $target_dir . basename($_FILES["image"]["name"]);
        $target_file_2 = $target_dir . basename($_FILES["image_1"]["name"]);
        $target_file_3 = $target_dir . basename($_FILES["image_2"]["name"]);

        // ตรวจสอบขนาดของไฟล์ และกำหนดไฟล์ที่ยอมรับได้
        $uploadOk = 1;
        $allowedFormats = array('jpg', 'jpeg', 'png', 'gif');

        foreach ([$_FILES['image'], $_FILES['image_1'], $_FILES['image_2']] as $file) {
            $check = getimagesize($file["tmp_name"]);
            $imageFileType = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));

            if ($check === false) {
                echo "File is not an image.";
                $uploadOk = 0;
            }

            if (file_exists($target_dir . $file["name"])) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }

            if ($file["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            if (!in_array($imageFileType, $allowedFormats)) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
        }

        // ตรวจสอบว่า $uploadOk มีค่าเป็น 0 หรือไม่ หากเกิดข้อผิดพลาด ไม่ทำการอัปโหลดไฟล์
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            // ถ้าทุกรายการตรวจสอบผ่าน ให้ทำการอัปโหลดไฟล์
            if (
                move_uploaded_file($_FILES["image"]["tmp_name"], $target_file_1) &&
                move_uploaded_file($_FILES["image_1"]["tmp_name"], $target_file_2) &&
                move_uploaded_file($_FILES["image_2"]["tmp_name"], $target_file_3)
            ) {
                //insert data
                $sqlInsert = "INSERT INTO car(brand , modelcar , registercar , typecar , colorcar , capacity , price , image , image_1 , image_2) VALUES ('$brand','$modelcar','$registercar', '$typecar' , ' $colorcar' , '$capacity' , '$price' ,'$target_file_1' ,'$target_file_2' , '$target_file_3')";

                if (mysqli_query($conn, $sqlInsert)) {
                    session_start();
                    $_SESSION["create"] = "เพิ่มข้อมูลรถสำเร็จ";
                    header("Location:cars.php");
                } else {
                    die("เกิดข้อผิดพลาดบางอย่าง");
                }
            } else {
                echo "Sorry, there was an error uploading your files.";
            }
        }
    } else {
        echo "กรุณาเลือกไฟล์รูปภาพทั้ง 3 รูป";
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit"])) {
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $brand = mysqli_real_escape_string($conn, $_POST["brand"]);
    $modelcar = mysqli_real_escape_string($conn, $_POST["modelcar"]);
    $registercar = mysqli_real_escape_string($conn, $_POST["registercar"]);
    $typecar = mysqli_real_escape_string($conn, $_POST["typecar"]);
    $colorcar = mysqli_real_escape_string($conn, $_POST["colorcar"]);
    $capacity = mysqli_real_escape_string($conn, $_POST["capacity"]);
    $price = mysqli_real_escape_string($conn, $_POST["price"]);

    // Check if new images are provided
    $target_dir = "image/";

    if (!empty($_FILES['image']['name'])) {
        $target_file_1 = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file_1);
    } else {
        // If no new image is provided, use the existing image
        $target_file_1 = $_POST['old_image'];
    }

    if (!empty($_FILES['image_1']['name'])) {
        $target_file_2 = $target_dir . basename($_FILES["image_1"]["name"]);
        move_uploaded_file($_FILES["image_1"]["tmp_name"], $target_file_2);
    } else {
        $target_file_2 = $_POST['old_image_1'];
    }

    if (!empty($_FILES['image_2']['name'])) {
        $target_file_3 = $target_dir . basename($_FILES["image_2"]["name"]);
        move_uploaded_file($_FILES["image_2"]["tmp_name"], $target_file_3);
    } else {
        $target_file_3 = $_POST['old_image_2'];
    }

    // Update the car information in the database
    $sql = "UPDATE car SET brand='$brand', modelcar='$modelcar', registercar='$registercar', typecar='$typecar', colorcar='$colorcar', capacity='$capacity', price='$price', image='$target_file_1', image_1='$target_file_2', image_2='$target_file_3' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        session_start();
        $_SESSION["edit"] = "แก้ไขข้อมูลรถสำเร็จ";
        header("Location: cars.php");
        exit();
    } else {
        $error_message = "เกิดข้อผิดพลาดในการแก้ไขข้อมูลรถ: " . mysqli_error($conn);
        echo $error_message;
    }
}


?>
