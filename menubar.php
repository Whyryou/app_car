<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Sidebar Menu</title>

     <!-- css -->
	<link rel="stylesheet" type="text/css" href="css/style_menuber.css">

      <!-- Boxicons CSS -->
    <link
      href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
      rel="stylesheet"
    />
</head>


<body>
     <?php echo $_SESSION['name']; ?>
     <a href="logout.php">Logout</a>
     <nav>
      <div class="logo">
        <i class="bx bx-menu menu-icon"></i>
        <span class="logo-name">เช่ารถเชียงราย</span>
      </div>

      <div class="sidebar">
        <div class="logo">
          <i class="bx bx-menu menu-icon"></i>
          <span class="logo-name">เช่ารถเชียงราย</span>
        </div>

        <div class="sidebar-content">
          <ul class="lists">
            <li class="list">
              <a href="#" class="nav-link">
                <i class="bx bx-home-alt icon"></i>
                <span class="link">แดชบอร์ด</span>
              </a>
            </li>
            <li class="list">
              <a href="#" class="nav-link">
              <i class="bx bx-user icon"></i>
                <span class="link">ลูกค้า</span>
              </a>
            </li>
            <li class="list">
              <a href="#" class="nav-link">
              <i class="bx bx-user icon"></i>
                <span class="link">พนักงาน</span>
              </a>
            </li>
            <li class="list">
              <a href="cars.php" class="nav-link">
              <i class="bx bx-car icon"></i>
                <span class="link">รถ</span>
              </a>
            </li>
            <li class="list">
              <a href="#" class="nav-link">
              <i class="bx bx-car icon"></i>
                <span class="link">เช่ารถ</span>
              </a>
            </li>
            <li class="list">
              <a href="#" class="nav-link">
               <i class="bx bx-car icon"></i>
                <span class="link">คืนรถ</span>
              </a>
            </li>
            <li class="list">
              <a href="#" class="nav-link">
                <i class="bx bx-folder-open icon"></i>
                <span class="link">ประวัติการเช่า-คืนรถ</span>
              </a>
            </li>
          </ul>

          <div class="bottom-cotent">
            <li class="list">
              <a href="#" class="nav-link">
                <i class="bx bx-cog icon"></i>
                <span class="link">โปรไฟล์</span>
              </a>
            </li>
            <li class="list">
              <a href="#" class="nav-link">
                <i class="bx bx-log-out icon"></i>
                <span class="link">ออกจากระบบ</span>
              </a>
            </li>
          </div>
        </div>
      </div>
    </nav>

    <section class="overlay"></section>

    <script>
      const navBar = document.querySelector("nav"),
        menuBtns = document.querySelectorAll(".menu-icon"),
        overlay = document.querySelector(".overlay");

      menuBtns.forEach((menuBtn) => {
        menuBtn.addEventListener("click", () => {
          navBar.classList.toggle("open");
        });
      });

      overlay.addEventListener("click", () => {
        navBar.classList.remove("open");
      });
    </script>
</body>
</html>




<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>