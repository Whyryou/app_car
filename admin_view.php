<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>รายละเอียดพนักงาน</title>
    <<style>
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
    </>
    <link rel="stylesheet" type="text/css" href="css/styles_menubar.css">


</head>
<body>
    <div class="container my-4">
        <header class="d-flex justify-content-between my-4">
            <h1>รายละเอียดพนักงาน</h1>
            <div>
            <a href="admin_user.php" class="btn btn-primary">กลับ</a>
            </div>
        </header>
        <div class="car-chiangrai p-5 my-4">
            <?php
            include("db_conn.php");
            $id = $_GET['id'];
            if ($id) {
                $sql = "SELECT * FROM useradmin WHERE id = $id";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
                 ?>
                 <h3>ชื่อ-นามสกุล:</h3>
                 <p><?php echo $row["name"]; ?></p>
                 <h3>ชื่อผู้ใช้งาน:</h3>
                 <p><?php echo $row["user_name"]; ?></p>
                 
                  
                 <?php
                }
            }
            else{
                echo "<h3>ไม่พบข้อมูลพนักงาน</h3>";
            }
            ?>
            
        </div>
    </div>
</body>
</html>