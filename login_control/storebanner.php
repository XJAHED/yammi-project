<?php
session_start();
include "../database/database.php";

$title = $_REQUEST['title'];
$detail = $_REQUEST['detail'];
$cta_title = $_REQUEST['cta_title'];
$cta_link = $_REQUEST['cta_link'];
$video_link = $_REQUEST['video_link'];
$banner_img = $_FILES['banner_img'];
$error = [];

// banner image section
$img_type = ['jpg', 'png'];
$ext = pathinfo($banner_img['name'])['extension'];

if($banner_img['size'] == 0){
    $error['ext_error'] = "Enter your image";
}elseif(!in_array($ext, $img_type)){
    $error['ext_error'] = "enter jpg or png image";
}


if(count($error) > 0){
    $_SESSION['banner_error'] = $error;
     header("location:../Backend_file/addbanner.php");
}

$filename = "Banner-". uniqid() .".$ext";
$path = "../uplode_image/banner";

if(!is_dir($path)){
    mkdir($path);
}

$uplode = move_uploaded_file($banner_img['tmp_name'], "../uplode_image/banner/$filename");

if($uplode){
    $qurey = "INSERT INTO banners( title, detail, cta_title, cta_link, video_link, banner_img) VALUES ( '$title', '$detail', '$cta_title','$cta_link' ,'$video_link', '$filename')" ;

    $sqli = mysqli_query($connect, $qurey);
    

    if($sqli){
        $_SESSION['popup']= "Banner Update successful";
     header("location:../login_control/storebanner.php");   
    }
}






?>