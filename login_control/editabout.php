<?php
include "../database/database.php";
session_start();

$con_name = $_REQUEST['con_name'];
$contract = $_REQUEST['contract'];
$detail = $_REQUEST['detail'];
$video_link = $_REQUEST['video_link'];
$banner_img = $_FILES['banner_img'];
$id = $_REQUEST['id'];
$error = [];

// img uplode sectiopn

if($banner_img['size'] > 0){
    
    $img_type = ['jpg' , 'png'];
    $ext = pathinfo($banner_img['name'])['extension'];
    $file_name = "About-". uniqid() .".$ext";
    $path = "../uplode_image/About";

    if(!is_dir($path)){
        mkdir($path);
    }

    $uplode = move_uploaded_file($banner_img['tmp_name'], "../uplode_image/about/".$file_name);
    
    if($uplode){
        $qurey = "SELECT banner_img FROM about WHERE id = '$id'";
        $sqli = mysqli_query($connect, $qurey);
        $old_img = mysqli_fetch_assoc($sqli);


        $file = "../uplode_image/about/".$old_img['banner_img'];
       
        if(file_exists($file)){
            unlink($file);
        }

        $update_qurey = "UPDATE about SET con_name='$con_name',contract='$contract',detail='$detail',video_link='$video_link',banner_img='$file_name' WHERE id = '$id'";
        $update_sqli = mysqli_query($connect, $update_qurey);
        header("location:../Backend_file/allabout.php");

         $_SESSION['update'] = "update";
    }

}else{
    $update_qurey = "UPDATE about SET con_name='$con_name',contract='$contract',detail='$detail',video_link='$video_link',banner_img='$file_name' WHERE id = '$id'";
        $update_sqli = mysqli_query($connect, $update_qurey);
        header("location:../Backend_file/allabout.php");
         $_SESSION['update'] = "update";
}





?>