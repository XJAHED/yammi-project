<?php
include "../database/database.php";

$id = $_REQUEST['id'];

$qurey = "SELECT  banner_img FROM event WHERE id = '$id'";
$sqli = mysqli_query($connect, $qurey);
$fatch = mysqli_fetch_assoc($sqli);

$file = "../uplode_image/Event/".$fatch['banner_img'];

if(file_exists($file)){
    unlink($file);
}

$delete= "DELETE FROM event WHERE id = '$id'";
$del_sqli = mysqli_query($connect, $delete);
header("location:../Backend_file/allevent.php");





?>