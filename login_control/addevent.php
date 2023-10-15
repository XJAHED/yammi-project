<?php
session_start();
include "../database/database.php";

$name = $_REQUEST['name'];
$detail = $_REQUEST['detail'];
$price = $_REQUEST['price'];
$banner_img = $_FILES['banner_img'];
$error = [];


// img process
$img_type = ['jpg', 'png'];
$ext = pathinfo($banner_img['name'])['extension'];

if($banner_img['size'] == 0){
    $error['ext_error'] = "Enter your image";
}elseif(!in_array($ext, $img_type)){
    $error['ext_error'] = "enter jpg or png image";
}


if(count($error) > 0){
    $_SESSION['banner_error'] = $error;
     header("location:../Backend_file/addevent.php");
}

$filename = "Event-" . uniqid() .".$ext";
$path = "../uplode_image/Event";

if(!is_dir($path)){
    mkdir($path);
}

$uplode = move_uploaded_file($banner_img['tmp_name'], "../uplode_image/Event/$filename" );

if($uplode){
    $qurey = "INSERT INTO event(name, detail, price, banner_img) VALUES ('$name','$detail','$price','$filename')";
    $sqli = mysqli_query($connect, $qurey);

    if($sqli){
        header("location:../Backend_file/allevent.php");
        $_SESSION['update']="update";
    }
}


?>