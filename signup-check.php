<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])
    && isset($_POST['name']) && isset($_POST['re_password']) && isset($_POST['email'])) {

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
	$email = validate($_POST['email']);
	$user_data = 'uname='. $uname. '&name='. $name;


	if (empty($uname)) {
		header("Location: signup.php?error=กรุณาป้อนชื่อผู้ใช้งาน&$user_data");
	    exit();
	}else if(empty($pass)){
        header("Location: signup.php?error=กรุณาป้อนรหัสผ่าน&$user_data");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: signup.php?error=กรุณายืนยันรหัสผ่านอีกครั้ง&$user_data");
	    exit();
	}
	else if(empty($email)){
        header("Location: signup.php?error=กรุณาป้อนอีเมล&$user_data");
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

	    $sql = "SELECT * FROM useradmin WHERE user_name='$uname' OR email='$email'  ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			 $row = mysqli_fetch_assoc($result);
        if ($row['user_name'] === $uname) {
            header("Location: signup.php?error=ชื่อผู้ใช้ถูกใช้ไปแล้ว&$user_data");
            exit();
        } else if ($row['email'] === $email) {
            header("Location: signup.php?error=อีเมลถูกใช้ไปแล้ว&$user_data");
            exit();
        }
    } 
		else {
           $sql2 = "INSERT INTO useradmin(user_name, password, name , email , status) VALUES('$uname', '$pass', '$name', '$email', '$status')";
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

