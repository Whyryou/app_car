<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>ข้อมูลรถ</title>
    <style>
        table  td, table th{
        vertical-align:middle;
        text-align:center;
        padding:20px!important;
        }
    </style>
    
</head>
<body>

    <div class="container my-4">
        <header class="d-flex justify-content-between my-4">
            <h1>ข้อมูลรถ</h1>
            <div>
                <a href="cars_create.php" class="btn btn-primary">เพิ่มข้อมูลรถ</a>
            </div>
        </header>
        <?php
        session_start();
        if (isset($_SESSION["create"])) {
        ?>
        <div class="alert alert-success">
            <?php 
            echo $_SESSION["create"];
            ?>
        </div>
        <?php
        unset($_SESSION["create"]);
        }
        ?>
         <?php
        if (isset($_SESSION["update"])) {
        ?>
        <div class="alert alert-success">
            <?php 
            echo $_SESSION["update"];
            ?>
        </div>
        <?php
        unset($_SESSION["update"]);
        }
        ?>
        <?php
        if (isset($_SESSION["delete"])) {
        ?>
        <div class="alert alert-success">
            <?php 
            echo $_SESSION["delete"];
            ?>
        </div>
        <?php
        unset($_SESSION["delete"]);
        }
        ?>
        
        <table class="table table-bordered">
        <thead>
            <tr>
                <th>ลำดับ</th>
                <th>ยี่ห้อรถ</th>
                <th>รุ่นรถ</th>
                <th>ทะเบียนรถ</th>
                <th>ประเภทรถ</th>
                <th>ราคาเช่าต่อวัน</th>
            </tr>
        </thead>
        <tbody>
        
        <?php
        include('db_conn.php');
        $sqlSelect = "SELECT * FROM car";
        $result = mysqli_query($conn,$sqlSelect);
        while($data = mysqli_fetch_array($result)){
            ?>
            <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['brand']; ?></td>
                <td><?php echo $data['modelcar']; ?></td>
                <td><?php echo $data['registercar']; ?></td>
                <td><?php echo $data['typecar']; ?></td>
                <td><?php echo $data['price']; ?></td>
                <td>
                    <a href="cars_view.php?id=<?php echo $data['id']; ?>" class="btn btn-info">รายละเอียด</a>
                    <a href="cars_edit.php?id=<?php echo $data['id']; ?>" class="btn btn-warning">แก้ไข</a>
                    <a href="cars_delete.php?id=<?php echo $data['id']; ?>" class="btn btn-danger">ลบข้อมูล</a>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
        </table>
    </div>
</body>
</html>
<?php include "menubar.php";