<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>แก้ไขข้อมูลรถ</title>

   <link rel="stylesheet" type="text/css" href="css/styles_menubar.css">

</head>
<body>
    <div class="container my-5">
    <header class="d-flex justify-content-between my-4">
            <h1>แก้ไขข้อมูลรถ</h1>
        
        </header>

        <form action="cars_process.php" method="post" enctype="multipart/form-data">
            <?php 
            
            if (isset($_GET['id'])) {
                include("db_conn.php");
                $id = $_GET['id'];
                $sql = "SELECT * FROM car WHERE id=$id";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_array($result);
                ?>
                
               <div class="row mb-3">
               <div class="col">
                  <label class="form-label">ยี่ห้อรถ :</label>
                  <select name="brand" class="form-control" required>
                    <i class="bx bx-chevron-down icon"></i>
                    <option value="">กรุณาเลือกยี่ห้อรถ</option>
                    <option value="Honda"<?php if($row["brand"]=="Honda"){echo "selected";} ?>>Honda</option>
                    <option value="Isuzu" <?php if($row["brand"]=="Isuzu"){echo "selected";} ?>>Isuzu</option>
                    <option value="Toyota"<?php if($row["brand"]=="Toyota"){echo "selected";} ?>>Toyota</option>
                    <option value="Suzuki"<?php if($row["brand"]=="Suzuki"){echo "selected";} ?>>Suzuki</option>
                    <option value="Mitsubishi"<?php if($row["brand"]=="Mitsubishi"){echo "selected";} ?>>Mitsubishi</option>
                    <option value="Nissan"<?php if($row["brand"]=="Nissan"){echo "selected";} ?>>Nissan</option>
                    <option value="Mazda"<?php if($row["brand"]=="Mazda"){echo "selected";} ?>>Mazda</option>
                    <option value="Ford"<?php if($row["brand"]=="Ford"){echo "selected";} ?>>Ford</option>
                </select>
               </div>

               <div class="col">
                  <label class="form-label">รุ่นรถ :</label>
                  <input type="text" class="form-control" name="modelcar" placeholder="รุ่นรถ" value="<?php echo $row["modelcar"]; ?>" required>
               </div>

                
            </div>
             <div class="row mb-3">
                <div class="col">
                  <label class="form-label">ทะเบียนรถ :</label>
                  <input type="text" class="form-control" name="registercar" placeholder="ทะเบียนรถ" value="<?php echo $row["registercar"]; ?>" required>
               </div>

               <div class="col">
                  <label class="form-label">ประเภทรถ :</label>
                   <select name="typecar" class="form-control" required>
                    <i class="bx bx-chevron-down icon"></i>
                    <option value="">ประเภทรถ</option>
                    <option value="รถเก๋ง" <?php if($row["typecar"]=="รถเก๋ง"){echo "selected";} ?>>รถเก๋ง </option>
                    <option value="รถยนต์" <?php if($row["typecar"]=="รถยนต์"){echo "selected";} ?>>รถยนต์ </option>
                    <option value="รถตู้" <?php if($row["typecar"]=="รถตู้"){echo "selected";} ?>>รถตู้ </option>
                    <option value="รถมอเตอร์ไซต์" <?php if($row["typecar"]=="รถมอเตอร์ไซต์"){echo "selected";} ?>>รถมอเตอร์ไซต์</option>
                </select>
               </div>

            </div>

             <div class="row mb-3">
                <div class="col">
                  <label class="form-label">สีรถ :</label>
                  <input type="text" class="form-control" name="colorcar" placeholder="สีรถ"  value="<?php echo $row["colorcar"]; ?>" required>
               </div>

                <div class="col">
                  <label class="form-label">ความจุ(คน) :</label>
                  <input type="text" class="form-control" name="capacity" placeholder="ความจุ" value="<?php echo $row["capacity"]; ?>" required>
               </div>

                <div class="col">
                  <label class="form-label">ราคาเช่าต่อวัน(บาท) :</label>
                  <input type="text" class="form-control" name="price" placeholder="ราคาเช่าต่อวัน" value="<?php echo $row["price"]; ?>" required>
               </div>


            </div>
           

            <div class="mb-3">
    <label for="image" class="form-label">รูปภาพ 1 :</label>
    <input type="file" class="form-control" id="image" name="image">
    <input type="hidden" name="old_image" value="<?php echo $row['image']; ?>">
</div>

<?php
       
        if (isset($row['image']) && !empty($row['image'])) {
            echo '<img src="' . $row['image'] . '" width="100" alt="Image 1">';
           
        } else {
            echo 'No images available';
        }
        ?>

<div class="mb-3">
    <label for="image_1" class="form-label">รูปภาพ 2 :</label>
    <input type="file" class="form-control" id="image_1" name="image_1">
    <input type="hidden" name="old_image_1" value="<?php echo $row['image_1']; ?>">
</div>

<?php
       
        if (isset($row['image_1']) && !empty($row['image_1'])) {
            echo '<img src="' . $row['image_1'] . '" width="100" alt="Image 2">';
           
        } else {
            echo 'No images available';
        }
        ?>

<div class="mb-3">
    <label for="image_2" class="form-label">รูปภาพ 3 :</label>
    <input type="file" class="form-control" id="image_2" name="image_2">
    <input type="hidden" name="old_image_2" value="<?php echo $row['image_2']; ?>">
</div>

<?php
       
        if (isset($row['image_2']) && !empty($row['image_2'])) {
            echo '<img src="' . $row['image_2'] . '" width="100" alt="Image 3">';
           
        } else {
            echo 'No images available';
        }
        ?>
          

            
            <input type="hidden" value="<?php echo $id; ?>" name="id">
            <div class="form-element my-4">
          <button type="submit" class="btn btn-success" name="edit">แก้ไขข้อมูลรถ</button>
          <a href="cars.php" class="btn btn-danger">ยกเลิก</a>
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