<?php
session_start();
include "../database/database.php";

$id = $_SESSION['user_auth']['id'];
$frist_name = $_REQUEST['frist_name'];
$last_name  = $_REQUEST['last_name'];
$email = $_REQUEST['email'];
$image = $_FILES['image'];
$error = [];

$img_type = ['jpg','jpeg', 'png'];

$extention = pathinfo($image['name'])['extension'];



if($image['size'] == 0){
    $error['img_error'] = "Enter your image";
}elseif(!in_array($extention, $img_type)){
    $error['img_error'] = "Image type is jpg, png, svg";
}elseif($image['size'] > 5000000){
    $error['img_error'] = "Uplode your image within 5MB";
}

if(count($error) > 0){
    $_SESSION['profile_error'] = $error;
    header("location:../Backend_file/profile.php");
}else{

    $file_name = "user-" . uniqid() .".$extention";

      if(!is_dir("../uplode_image/user")){
        mkdir("../uplode_image/user");
      }

    $uplode_file = move_uploaded_file($image['tmp_name'], "../uplode_image/user/". $file_name);

    if($uplode_file){
        $query = "UPDATE yammi_login SET frast_name='$frist_name', last_name='$last_name', email='$email' , image='$file_name' WHERE id = '$id' " ;

        
       $sqli = mysqli_query($connect, $query);

          if($sqli){
            $_SESSION['popup'] = "Profile update successful";
          }
       
    
    //    session update
  
    $_SESSION['user_auth']['frast_name'] = $frist_name;
    $_SESSION['user_auth']['last_name'] = $last_name;
    $_SESSION['user_auth']['email'] = $email;
    $_SESSION['user_auth']['profile_pic'] = $file_name;
       

    header("location:../Backend_file/profile.php");
    }

}






?>