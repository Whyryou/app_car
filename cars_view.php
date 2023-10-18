<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>รายละเอียดรถ</title>
    <style>
        .book-details{
            background-color:#f5f5f5;
        }
    </style>
</head>
<body>
    <div class="container my-4">
        <header class="d-flex justify-content-between my-4">
            <h1>รายละเอียดรถ</h1>
            <div>
            <a href="cars.php" class="btn btn-primary">กลับ</a>
            </div>
        </header>
        <div class="book-details p-5 my-4">
            <?php
            include("db_conn.php");
            $id = $_GET['id'];
            if ($id) {
                $sql = "SELECT * FROM car WHERE id = $id";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
                 ?>
                 <h3>brand:</h3>
                 <p><?php echo $row["brand"]; ?></p>
                 <h3>modelcar:</h3>
                 <p><?php echo $row["modelcar"]; ?></p>
                 <h3>registercar:</h3>
                 <p><?php echo $row["registercar"]; ?></p>
                 <h3>typecar:</h3>
                 <p><?php echo $row["typecar"]; ?></p>
                 <h3>colorcar:</h3>
                 <p><?php echo $row["colorcar"]; ?></p>
                 <h3>capacity:</h3>
                 <p><?php echo $row["capacity"]; ?></p>
                 <h3>price:</h3>
                 <p><?php echo $row["price"]; ?></p>
                
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