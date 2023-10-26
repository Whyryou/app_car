<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])
    && isset($_POST['name']) && isset($_POST['re_password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	$re_pass = validate($_POST['re_password']);
	$name = validate($_POST['name']);

	$user_data = 'uname='. $uname. '&name='. $name;


	if (empty($uname)) {
		header("Location: signup.php?error=กรุณาป้อนชื่อผู้ใช้งาน&$user_data");
	    exit();
	}else if(empty($pass)){
        header("Location: signup.php?error=กรุณาป้อนรหัสผ่าน&$user_data");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: signup.php?error=กรุณาป้อนรหัสผ่านอีกครั้ง&$user_data");
	    exit();
	}

	else if(empty($name)){
        header("Location: signup.php?error=กรุณาป้อนข้อมูลชื่อและนามสกุล&$user_data");
	    exit();
	}

	else if($pass !== $re_pass){
        header("Location: signup.php?error=รหัสผ่านยืนยันไม่ตรงกัน&$user_data");
	    exit();
	}

	else{

		// hashing the password
        $pass = md5($pass);

	    $sql = "SELECT * FROM useradmin WHERE user_name='$uname' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: signup.php?error=ชื่อผู้ใช้งานถูกใช้ไปแล้ว ลองใช้ชื่อผู้ใช้อื่น&$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO useradmin(user_name, password, name) VALUES('$uname', '$pass', '$name')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: signup.php?success=บัญชีของคุณถูกสร้างขึ้นเรียบร้อยแล้ว");
	         exit();
           }else {
	           	header("Location: signup.php?error=เกิดข้อผิดพลาดที่ไม่ทราบสาเหตุ&$user_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location: signup.php");
	exit();
}