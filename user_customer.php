<?php
include "db_conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="css/styles_meunbar.css">
    <title>ข้อมูลลูกค้า</title>
     <style>
        table  td, table th{
        vertical-align:middle;
        text-align:center;
        padding:20px!important;
        }
    </style>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
                    class="fas fa-user-secret me-2"></i>เช่ารถเชียงราย</div>
            <div class="list-group list-group-flush my-3">
                <a href="dashboard.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-tachometer-alt me-2"></i>แดชบอร์ด</a>
                <a href="user_customer.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-solid fa-user me-2"></i>ลูกค้า</a>
                <a href="admin_user.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-solid fa-user-tie me-2"></i>พนักงาน</a>
                <a href="cars.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-solid fa-car me-2"></i>รถ</a>
                <a href="rentcar.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-shopping-cart me-2"></i>เช่ารถ</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-shopping-cart me-2"></i>คืนรถ</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-solid fa-book me-2"></i>ประวัติการเช่า-คืน</a>
                <a href="logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>ออกจากระบบ</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">ข้อมูลลูกค้า</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>แอดมิน
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="profile.php">โปรไฟล์</a></li>
                                <li><a class="dropdown-item" href="logout.php">ออกจากระบบ</a></li>
                               
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

        <?php /* ตารางจัดการลูกค้า */?>
            <div class="container-fluid px-4">
                <?php
    if (isset($_GET["msg"])) {
      $msg = $_GET["msg"];
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      ' . $msg . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
        <div class="row my-2">
        
        <div>
                <a href="usercus_create.php" class="btn btn-primary my-4">เพิ่มข้อมูลลูกค้า</a>

            </div>
            
            <div class="col">
                <table class="table bg-white rounded shadow-sm  table-hover">
                   <thead>
            <tr>
                <th>ลำดับ</th>
                <th>ชื่อ</th>
                <th>นามสกุล</th>
                <th>อีเมล</th>
                <th>สถานะ</th>
                <th>จัดการ</th>
            </tr>
        </thead>
        <tbody>
        
        <?php
       
        $sqlSelect = "SELECT * FROM usercustomer";
        $result = mysqli_query($conn,$sqlSelect);
        while($data = mysqli_fetch_array($result)){
            ?>
            <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['name']; ?></td>
                <td><?php echo $data['lastname']; ?></td>
                <td><?php echo $data['email']; ?></td>
                <td><?php echo $data['status']; ?></td>
                
            </td>

                <td>
                    <a href="usercus_view.php?id=<?php echo $data['id']; ?>" class="btn btn-info">ดูข้อมูลลูกค้า</a>
                    <a href="usercus_edit.php?id=<?php echo $data['id']; ?>" class="btn btn-warning">แก้ไข</a>
                    <a href="usercus_delete.php?id=<?php echo $data['id']; ?>" class="btn btn-danger" onclick="return confirm('คุณแน่ใจหรือว่าต้องการลบข้อมูลนี้?')">ลบข้อมูล</a>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
        </tbody>
                           
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>

    
    
</body>

</html>