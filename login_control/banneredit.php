<?php
include "../database/database.php";
session_start();


$title = $_REQUEST['title'];
$detail = $_REQUEST['detail'];
$cta_title = $_REQUEST['cta_title'];
$cta_link = $_REQUEST['cta_link'];
$video_link = $_REQUEST['video_link'];
$banner_img = $_FILES['banner_img'];
$id = $_REQUEST['id'];


// img uplode sectiopn

if($banner_img['size'] > 0){
    
    $img_type = ['jpg' , 'png'];
    $ext = pathinfo($banner_img['name'])['extension'];
    $file_name = "Banner-". uniqid() .".$ext";
    $path = "../uplode_image/banner";

    if(!is_dir($path)){
        mkdir($path);
    }

    $uplode = move_uploaded_file($banner_img['tmp_name'], "../uplode_image/banner/".$file_name);
    
    if($uplode){
        $qurey = "SELECT banner_img FROM banners WHERE id = '$id'";
        $sqli = mysqli_query($connect, $qurey);
        $fatch= mysqli_fetch_assoc($sqli);

        // $file_img = $fatch['banner_img'];
        $paths = "../uplode_image/banner/".$fatch['banner_img'];
       
        if(file_exists($paths)){
            unlink($paths);
        }
        

        $update_qurey = "UPDATE banners SET title='$title',detail='$detail',cta_title='$cta_title', cta_link='$cta_link', video_link='$video_link',banner_img='$file_name' WHERE id = '$id'";
        $qurey = mysqli_query($connect, $update_qurey);
        header("location:../Backend_file/allbanner.php");

        $_SESSION['update'] = "update";
    }

}else{
    $update_qurey = "UPDATE banners SET title='$title',detail='$detail',cta_title='$cta_title', cta_link='$cta_link', video_link='$video_link' WHERE id = '$id'";
    $qurey = mysqli_query($connect, $update_qurey);
    var_dump($qurey);
    header("location:../Backend_file/allbanner.php");

    $_SESSION['update'] = "update";
}



?>