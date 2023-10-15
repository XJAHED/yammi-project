<?php


include "../database/database.php";
session_start();


$name = $_REQUEST['name'];
$detail = $_REQUEST['detail'];
$owner = $_REQUEST['owner'];
$banner_img = $_FILES['banner_img'];
$error = [];


// img uplode sectiopn

$img_type = ['jpg', 'png'];
$ext = pathinfo($banner_img['name'])['extension'];

if($banner_img['size'] == 0){
    $error['ext_error'] = "Enter your image";
}elseif(!in_array($ext, $img_type)){
    $error['ext_error'] = "enter jpg or png image";
}


if(count($error) > 0){
    $_SESSION['banner_error'] = $error;
     header("location:../Backend_file/addchefs.php");
}


$filename = "Chefs-". uniqid() .".$ext";
$path = "../uplode_image/Chefs";

if(!is_dir($path)){
    mkdir($path);
}

$uplode = move_uploaded_file($banner_img['tmp_name'], "../uplode_image/Chefs/$filename");


if($uplode){
   $qurey = "INSERT INTO chefs(name, detail, owner, image) VALUES ('$name', '$detail', '$owner', '$filename');";
   $sqli = mysqli_query($connect, $qurey);
   
   if($sqli){
    header("location:../Backend_file/allchefs.php");
    $_SESSION['update'] = "update";
   }
}
?>