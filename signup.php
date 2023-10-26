<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
     <form action="signup-check.php" method="post">
     	<h2>ลงทะเบียน</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

          <label>ชื่อ-นามสกุล</label>
          <?php if (isset($_GET['name'])) { ?>
               <input type="text" 
                      name="name" 
                      placeholder=""
                      value="<?php echo $_GET['name']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="name" 
                      placeholder=""><br>
          <?php }?>

          <label>ชื่อผู้ใช้งาน</label>
          <?php if (isset($_GET['uname'])) { ?>
               <input type="text" 
                      name="uname" 
                      placeholder=""
                      value="<?php echo $_GET['uname']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="uname" 
                      placeholder=""><br>
          <?php }?>


     	<label>รหัสผ่าน</label>
     	<input type="password" 
                 name="password" 
                 placeholder=""><br>

          <label>ยืนยันรหัสผ่านอีกครั้ง</label>
          <input type="password" 
                 name="re_password" 
                 placeholder=""><br>

     	<button type="submit">ลงทะเบียน</button>
          <a href="index.php" class="ca">คุณลงทะเบียนเข้าใช้งานแล้ว?</a>
     </form>
</body>
</html>