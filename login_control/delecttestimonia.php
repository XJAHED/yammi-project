<?php
include "../database/database.php";
$id= $_REQUEST['id'];
echo  $_REQUEST['id'];
$qurey = "SELECT image FROM testimonia where id = '$id'";
$sqli = mysqli_query($connect, $qurey);
$fatch = mysqli_fetch_assoc($sqli);

$path = "../uplode_image/Tesimonia/ " .$fatch['image'] ;
$file=file_exists($path);

if($file){
    unlink($path);
}

$qurey = "DELETE FROM testimonia WHERE id = '$id'";
$sqli = mysqli_query($connect, $qurey);
header("location:../Backend_file/alltestimonia.php");




?>
