<?php
session_start();

include "../database/database.php";

$old_password = $_REQUEST['old_password'];
$new_password = $_REQUEST['new_password'];
$con_password = $_REQUEST['con_password'];
$encpass = password_hash($new_password, PASSWORD_BCRYPT);
$error = [];
$id = $_SESSION['user_auth']['id'];

$qurey =" SELECT * FROM yammi_login WHERE id = '$id' ";

$result = mysqli_query($connect, $qurey);
$fatch = mysqli_fetch_assoc($result);
$verify = password_verify($old_password, $fatch['password']);


if($verify){

    if($new_password == $con_password){


    $update= "UPDATE yammi_login SET password ='$encpass' WHERE id = '$id'";
     $sqli = mysqli_query($connect, $update);
    
     if($sqli){
         $_SESSION['popup'] = "Password update successful";
        header("location:../Backend_file/profile.php");
     }

    }else{
          $error['con_error'] = "enter your correct password"; 
         header("location:../Backend_file/profile.php");
    }



}else{
    $error['old_error'] = "Password did not match";
}



if(count($error) > 0){
    $_SESSION['form_error'] = $error;
   
    header("location:../Backend_file/profile.php");
    


}




?>