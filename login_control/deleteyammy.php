<?php
include "../database/database.php";

$id = $_REQUEST['id'];

$qurey = "DELETE FROM `why_yammy` WHERE id = '$id'";
$sqli = mysqli_query($connect, $qurey);

if($sqli){
    header("location:../Backend_file/allyammy.php");
}




?>