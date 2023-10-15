<?php
include "../database/database.php";
session_start();


$name = $_REQUEST['name'];
$detail = $_REQUEST['detail'];
$owner = $_REQUEST['owner'];
$banner_img = $_FILES['banner_img'];
$id = $_REQUEST['id'];
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
    header("location:../Backend_file/addtestimonia.php");
}


$filename = "Chefs-". uniqid() .".$ext";
$path = "../uplode_image/Chefs";

if(!is_dir($path)){
    mkdir($path);
}

$uplode = move_uploaded_file($banner_img['tmp_name'], "../uplode_image/Chefs/$filename");


if($uplode){
   $qurey = "SELECT image FROM chefs WHERE id = '$id'";
   $sqli = mysqli_query($connect, $qurey);
   $oldimg = mysqli_fetch_assoc($sqli);


   $file = "../uplode_image/Chefs/".$oldimg['image'];
   
   if(file_exists($file)){
    unlink($file);
   }

$update = "UPDATE chefs SET name='$name',detail='$detail',owner='$owner',image='$filename' WHERE id = '$id'";
$updatesqli = mysqli_query($connect, $update);
header("location:../Backend_file/allchefs.php");
$_SESSION['update'] = "update";
}else{
    $update = "UPDATE chefs SET name='$name',detail='$detail',owner='$owner' WHERE id = '$id'";
    $updatesqli = mysqli_query($connect, $update);
    header("location:../Backend_file/allchefs.php");
    $_SESSION['update'] = "update";
}
?>