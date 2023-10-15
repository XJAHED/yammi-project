<?php
include "../database/database.php";
$id= $_REQUEST['id'];

$qurey = "SELECT banner_img from about where id = '$id'";
$sqli = mysqli_query($connect, $qurey);
$fatch = mysqli_fetch_assoc($sqli);
$path = "../uplode_image/about/".$fatch['banner_img'];

if(file_exists($path)){
    unlink($path);
}

$deletequrey = "DELETE FROM `about` WHERE id = '$id'";
$deletesqli = mysqli_query($connect, $deletequrey);
header("location:../Backend_file/allabout.php");
?>