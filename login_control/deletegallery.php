<?php
include "../database/database.php";
$id= $_REQUEST['id'];


$qurey = "SELECT image from gallery where id = '$id'";
$sqli = mysqli_query($connect, $qurey);
$fatch = mysqli_fetch_assoc($sqli);

$path = "../uplode_image/Gallery/ " .$fatch['image'] ;
$file=file_exists($path);


if($file){
    unlink($path);
}

$qurey = "DELETE FROM gallery WHERE id = '$id'";
$sqli = mysqli_query($connect, $qurey);
header("location:../Backend_file/allgalleryimg.php");




?>