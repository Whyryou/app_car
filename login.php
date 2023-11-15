<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: index.php?error=กรุณาป้อนผู้ใช้งาน");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=กรุณาป้อนรหัสผ่าน");
	    exit();
	}else{
		// hashing the password
        $pass = md5($pass);

        
		$sql = "SELECT * FROM useradmin WHERE user_name='$uname' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['user_name'] === $uname && $row['password'] === $pass) {
            	$_SESSION['user_name'] = $row['user_name'];
            	$_SESSION['name'] = $row['name'];
				$_SESSION['email'] = $row['email'];
            	$_SESSION['id'] = $row['id'];
            	header("Location: menubar.php");
		        exit();
            }else{
				header("Location: index.php?error=ผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง");
		        exit();
			}
		}else{
			header("Location: index.php?error=ผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง");
	        exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}