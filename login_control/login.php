<?php
session_start();

include "../database/database.php";



$frist_name = $_REQUEST['frist_name'];

$last_name  = $_REQUEST['last_name'];
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];
$hash= password_hash($password, PASSWORD_BCRYPT);

$con_password = $_REQUEST['con_password'];

$error=[];



if(empty($frist_name)){
    $error['name_error'] = "Enter your name";
}

if(empty($last_name)){
    $error['lname_error'] = "Enter your full name";
}

if(empty($email)){
    $error['email_error'] = "Enter your email";
}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $error['email_error'] = "Invalid email address";
}

if(empty($password)){
    $error['password_error'] = "Enter your password";
}elseif(strlen($password) < 8){
    $error['password_error'] = "Most type 8 character" ;
}elseif($password != $con_password){
    $error['password_error'] = " Your password not match";
}


if(count($error) > 0){
    $_SESSION['login_error'] = $error;
    header("location:../Backend_file/register.php");

} else{
    
   $qurey = "INSERT INTO `yammi_login`(`frast_name`, `last_name`, `email`, `password`) VALUES ('$frist_name' , '$last_name', '$email','$hash')";
    
   $sqli= mysqli_query($connect, $qurey);


     if($sqli){
       header("location:../Backend_file/login.php");
      }

}







?>


