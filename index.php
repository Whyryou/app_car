<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
     <form action="login.php" method="post">
     	<h2>เข้าสู่ระบบ</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>ชื่อผู้ใช้งาน</label>
     	<input type="text" name="uname" placeholder=""><br>

     	<label>รหัสผ่าน</label>
     	<input type="password" name="password" placeholder=""><br>

     	<button type="submit">เข้าสู่ระบบ</button>
          <a href="signup.php" class="ca">สร้างบัญชีใหม่</a>
     </form>
</body>
</html>