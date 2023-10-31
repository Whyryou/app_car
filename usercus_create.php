<?php
include('db_conn.php');
if (isset($_POST["create"])) {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $lastname = mysqli_real_escape_string($conn, $_POST["lastname"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    
    $sqlInsert = "INSERT INTO usercustomer(name , lastname , email , password) VALUES (' $name','$lastname','$email', '$password')";
    if(mysqli_query($conn,$sqlInsert)){
        session_start();
        header("Location:user_customer.php");
    }else{
        die("เกิดข้อผิดพลาดบางอย่าง");
    }
}
?>