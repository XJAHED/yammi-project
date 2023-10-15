<?php
include "../database/database.php";
session_start();

$image = $_FILES['image'];
$error = [];


$img_type = ['jpg', 'png'];
$ext = pathinfo($image['name'])['extension'];

if($image['size'] == 0){
    $error['ext_error'] = "Enter your image";
}elseif(!in_array($ext, $img_type)){
    $error['ext_error'] = "Enter JPG or PNG image";
}
if(count($error) > 0){
    $_SESSION['banner_error'] = $error;
    header("location:../Backend_file/addgalleryimg.php");
}

$filename = "Gallery-". uniqid() .".$ext";
$path = "../uplode_image/Gallery";

if(!is_dir($path)){
    mkdir($path);
}

$uplode = move_uploaded_file($image['tmp_name'], "../uplode_image/Gallery/$filename");


if($uplode){
    $qurey ="INSERT INTO gallery (image) VALUES ('$filename')";
    $sqli = mysqli_query($connect, $qurey);

    if($sqli){
        $_SESSION['update'] = "update";
        header("location:../Backend_file/allgalleryimg.php");
    }
}

?>