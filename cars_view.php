<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>รายละเอียดรถ</title>
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
    <link rel="stylesheet" type="text/css" href="css/styles_menubar.css">
</head>
<body>
    <div class="container my-4">
        <header class="d-flex justify-content-between my-4">
            <h1>รายละเอียดรถ</h1>
            <div>
                <a href="cars.php" class="btn btn-primary">กลับ</a>
            </div>
        </header>
        <div class="car-chiangrai p-5 my-4">
            <?php
            include("db_conn.php");
            $id = $_GET['id'];
            if ($id) {
                $sql = "SELECT * FROM car WHERE id = $id";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
                 ?>
                 <h3>ยี่ห้อรถ:</h3>
                 <p><?php echo $row["brand"]; ?></p>
                 <h3>รุ่นรถ:</h3>
                 <p><?php echo $row["modelcar"]; ?></p>
                 <h3>ทะเบียนรถ:</h3>
                 <p><?php echo $row["registercar"]; ?></p>
                 <h3>ประเภทรถ:</h3>
                 <p><?php echo $row["typecar"]; ?></p>
                 <h3>สีรถ:</h3>
                 <p><?php echo $row["colorcar"]; ?></p>
                 <h3>ความจุ(คน):</h3>
                 <p><?php echo $row["capacity"]; ?></p>
                 <h3>ราคาเช่าต่อวัน(บาท):</h3>
                 <p><?php echo $row["price"]; ?></p>

                 <h3>รูปภาพ 1:</h3>
                 <?php
       
        if (isset($row['image']) && !empty($row['image'])) {
            echo '<img src="' . $row['image'] . '" width="100" alt="Image 1">';
           
        } else {
            echo 'No images available';
        }
        ?>
                <h3>รูปภาพ 2:</h3>
                <?php
       
        if (isset($row['image_1']) && !empty($row['image_1'])) {
            echo '<img src="' . $row['image_1'] . '" width="100" alt="Image 1">';
           
        } else {
            echo 'No images available';
        }
        ?>

                <h3>รูปภาพ 3:</h3>
               <?php
       
        if (isset($row['image_2']) && !empty($row['image_2'])) {
            echo '<img src="' . $row['image_2'] . '" width="100" alt="Image 1">';
           
        } else {
            echo 'No images available';
        }
        ?>
                 <?php
                }
            }
            else{
                echo "<h3>ไม่พบข้อมูลรถ</h3>";
            }
            ?>
        </div>
    </div>
</body>
</html>
