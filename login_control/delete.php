<?php
include "../database/database.php";
$id= $_REQUEST['id'];

$qurey = "SELECT banner_img from banners where id = '$id'";
$sqli = mysqli_query($connect, $qurey);
$fatch = mysqli_fetch_assoc($sqli);

$path = "../uplode_image/banner/ " .$fatch['banner_img'] ;
$file=file_exists($path);


if($file){
    unlink($path);
}

$qurey = "DELETE FROM `banners` WHERE id = '$id'";
$sqli = mysqli_query($connect, $qurey);
header("location:../Backend_file/allbanner.php");




?>
