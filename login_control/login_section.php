<?php
session_start();
include "../database/database.php";




$email = $_REQUEST['email'];
$password = $_REQUEST['password'];
$error =[];

if(empty($email)){

    $error['email_error'] = "Enter your email addres";

}

if(empty($password)){

    $error['password_error'] = "Enter your password";

}

if(count($error) > 0){
    $_SESSION['login_error'] = $error;
    header("location:../Backend_file/login.php");
}else{

    $select= "SELECT * FROM yammi_login WHERE email = '$email'";
    $sqli= mysqli_query($connect, $select);
    $fatch = mysqli_fetch_assoc($sqli);
    

    if(mysqli_num_rows($sqli) > 0){
        
       $verify= password_verify($password, $fatch['password']);

        if($verify){
           $_SESSION['user_auth'] = $fatch;
            
            header("location:../Backend_file/index.php");
        }else{
            $error['password_error'] = "wrong password";
            $_SESSION['login_error'] = $error;
            header("location:../Backend_file/login.php");
        }

    }else{
        $error['email_error'] = "enter ture email";
        $_SESSION['login_error'] = $error;
        header("location:../Backend_file/login.php");
    }

}



















?>