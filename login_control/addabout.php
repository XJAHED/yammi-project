<?php

include "../database/database.php";
session_start();


$con_name = $_REQUEST['con_name'];
$contract = $_REQUEST['contract'];
$detail = $_REQUEST['detail'];
$video_link = $_REQUEST['video_link'];
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
    $_SESSION['food_error'] = $error;
     header("location:../Backend_file/addaboutbanner.php");
}


$filename = "About-". uniqid() .".$ext";
$path = "../uplode_image/about";

if(!is_dir($path)){
    mkdir($path);
}

$uplode = move_uploaded_file($banner_img['tmp_name'], "../uplode_image/about/$filename");

if($uplode){
    $qurey = "INSERT INTO about( con_name, contract, detail, video_link, banner_img) VALUES ('$con_name','$contract', '$detail','$video_link', '$filename') ";
    $sqli= mysqli_query($connect, $qurey);
    
    if($sqli){
        
        header("location:../Backend_file/addabout.php");
        $_SESSION['about_pop']= " successful";
}
}
?>