<?php
include('db_conn.php');

// Assuming you have an "id" parameter in the URL
$id = isset($_GET["id"]) ? $_GET["id"] : die("Invalid customer ID");

// Fetch customer data based on the provided ID
$sql = "SELECT * FROM usercustomer WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    die("Customer not found");
}

if (isset($_POST["update"])) {
    // Update existing customer
    $id = $_GET["id"]; // Validate and sanitize this value
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $lastname = mysqli_real_escape_string($conn, $_POST["lastname"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $status = mysqli_real_escape_string($conn, $_POST["status"]);

    $stmt = $conn->prepare("UPDATE usercustomer SET name=?, lastname=?, email=?, password=?, status=? WHERE id=?");
    $stmt->bind_param("sssssi", $name, $lastname, $email, $password, $status, $id);

    if ($stmt->execute()) {
        session_start();
        header("Location: user_customer.php?msg=แก้ไขข้อมูลเรียบร้อย");
        exit();
    } else {
        die("เกิดข้อผิดพลาดบางอย่าง: " . $stmt->error);
    }

    $stmt->close();
}

// ... The rest of your PHP code for handling form submissions
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>เเก้ไขข้อมูลลูกค้า</title>
    <link rel="stylesheet" type="text/css" href="css/styles_menubar.css">
</head>

<body>
    <div class="container">
        <div class="text-center my-5">
            <h3>แก้ไขข้อมูลลูกค้า</h3>
        </div>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width:300px;" enctype="multipart/form-data" onsubmit="return checkEmpty()">
                 <div class="row mb-3">
               

               <div class="col">
                  <label class="form-label">ชื่อ :</label>
                  <input type="text" class="form-control" name="name" placeholder="ชื่อลูกค้า" value="<?php echo $row['name'] ?>" required>
               </div>

                <div class="col">
                  <label class="form-label">นามสกุล :</label>
                  <input type="text" class="form-control" name="lastname" placeholder="นามสกุล" value="<?php echo $row['lastname'] ?>" required>
               </div>
                
            </div>
             <div class="row mb-3">
                <div class="col">
                  <label class="form-label">อีเมล :</label>
                  <input type="text" class="form-control" name="email" placeholder="อีเมล" value="<?php echo $row['email'] ?>" required>
               </div>

              <div class="col">
                  <label class="form-label">รหัสผ่าน :</label>
                  <input type="text" class="form-control" name="password" placeholder="รหัสผ่าน" value="<?php echo $row['password'] ?>" required>
               </div>

            </div>

             <div class="form-group mb-3">
               <label>สถานะ :</label>
               &nbsp;
               <input type="radio" class="form-check-input" name="status" id="ลูกค้า" value="ลูกค้า" <?php echo ($row['status']=='ลูกค้า')?"checked":""; ?>>
               <label for="ลูกค้า" class="form-input-label">ลูกค้า</label>
               
            </div>

           
            

            
             <input type="hidden" name="update" value="1">

    <div>
        <button type="submit" class="btn btn-success">บันทึก</button>
        <a href="user_customer.php" class="btn btn-danger">ยกเลิก</a>
    </div>
            </form>
        </div>
    </div>
</body>

</html>
