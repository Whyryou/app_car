<?php
if (isset($_GET['id'])) {
    include("db_conn.php");
    $id = $_GET['id'];

    // Retrieve image file paths before deleting the car record
    $sql_select_images = "SELECT image, image_1, image_2 FROM car WHERE id='$id'";
    $result_select_images = mysqli_query($conn, $sql_select_images);

    if ($result_select_images) {
        $row_images = mysqli_fetch_assoc($result_select_images);

        // Delete car record
        $sql_delete_car = "DELETE FROM car WHERE id='$id'";
        if (mysqli_query($conn, $sql_delete_car)) {
            // Delete images from the 'image' folder
            foreach ($row_images as $image_path) {
                if (!empty($image_path) && file_exists($image_path)) {
                    unlink($image_path);
                }
            }

            session_start();
            $_SESSION["delete"] = "ลบข้อมูลรถเรียบร้อย";
            header("Location: cars.php");
        } else {
            die("เกิดข้อผิดพลาดในการลบข้อมูลรถ: " . mysqli_error($conn));
        }
    } else {
        die("เกิดข้อผิดพลาดในการดึงข้อมูลรูปภาพ: " . mysqli_error($conn));
    }
} else {
    echo "ข้อมูลรถไม่มี";
}
?>
