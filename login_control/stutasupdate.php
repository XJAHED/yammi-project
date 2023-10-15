<?php
include "../database/database.php";


$id = $_REQUEST['id'];
$qurey = "UPDATE banners SET status = 0";
$sqli =mysqli_query($connect, $qurey);


$update = " UPDATE banners set status = 1 where id = '$id' ";
$res = mysqli_query($connect, $update);

header("location:../Backend_file/allbanner.php");
?>