<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>แก้ไขข้อมูลรถ</title>
</head>
<body>
    <div class="container my-5">
    <header class="d-flex justify-content-between my-4">
            <h1>แก้ไขข้อมูลรถ</h1>
            <div>
            <a href="cars.php" class="btn btn-primary">กลับ</a>
            </div>
        </header>
        <form action="cars_process.php" method="post">
            <?php 
            
            if (isset($_GET['id'])) {
                include("db_conn.php");
                $id = $_GET['id'];
                $sql = "SELECT * FROM car WHERE id=$id";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_array($result);
                ?>
                
                <div class="form-elemnt my-4">
                <select name="brand" class="form-control">
                    <option value="">ยี่ห้อรถ</option>
                    <option value="Isuzu" <?php if($row["brand"]=="Isuzu"){echo "selected";} ?>>Isuzu</option>
                    <option value="Toyota" <?php if($row["brand"]=="Toyota"){echo "selected";} ?>>Toyota</option>
                    <option value="Suzuki" <?php if($row["brand"]=="Suzuki"){echo "selected";} ?>>Suzuki</option>
                    <option value="Mitsubishi" <?php if($row["brand"]=="Mitsubishi"){echo "selected";} ?>>Mitsubishi</option>
                    <option value="Nissan" <?php if($row["brand"]=="Nissan"){echo "selected";} ?>>Nissan</option>
                    <option value="Mazda" <?php if($row["brand"]=="Mazda"){echo "selected";} ?>>Mazda</option>
                    <option value="Ford" <?php if($row["brand"]=="Ford"){echo "selected";} ?>>Ford</option>
                </select>
            </div>
                     <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="modelcar" placeholder="รุ่นรถ" value="<?php echo $row["modelcar"]; ?>">
            </div>
            <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="registercar" placeholder="รุ่นรถ" value="<?php echo $row["registercar"]; ?>">
            </div>
            <div class="form-elemnt my-4">
                <select name="typecar" class="form-control">
                    <option value="">ยี่ห้อรถ</option>
                    <option value="รถเก๋ง" <?php if($row["typecar"]=="รถเก๋ง"){echo "selected";} ?>>รถเก๋ง</option>
                    <option value="รถยนต์" <?php if($row["typecar"]=="รถยนต์"){echo "selected";} ?>>รถยนต์</option>
                    <option value="รถตู้" <?php if($row["typecar"]=="รถตู้"){echo "selected";} ?>>รถตู้</option>
                    <option value="รถมอเตอร์ไซต์" <?php if($row["typecar"]=="รถมอเตอร์ไซต์"){echo "selected";} ?>>รถมอเตอร์ไซต์</option>
                </select>
            </div>
            <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="colorcar" placeholder="สีรถ" value="<?php echo $row["colorcar"]; ?>">
            </div>
            <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="capacity" placeholder="ความจุรถ" value="<?php echo $row["capacity"]; ?>">
            </div>
            <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="price" placeholder="ราคาต่อวัน" value="<?php echo $row["price"]; ?>">
            </div>
            <input type="hidden" value="<?php echo $id; ?>" name="id">
            <div class="form-element my-4">
                <input type="submit" name="edit" value="แก้ไขข้อมูลรถ" class="btn btn-primary">
            </div>
                <?php
            }else{
                echo "<h3>ไม่มีข้อมูลรถ</h3>";
            }
            ?>
           
        </form>
        
        
    </div>
</body>
</html>