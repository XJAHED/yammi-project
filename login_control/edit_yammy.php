<?php
include "../database/database.php";
session_start();

$id = $_REQUEST['id'];
$title = $_REQUEST['title'];
$detail = $_REQUEST['detail'];

$qurey = "UPDATE why_yammy SET title='$title',detail='$detail' WHERE id ='$id'";
$sqli = mysqli_query($connect, $qurey);

if($sqli){
    header("location:../Backend_file/allyammy.php");
    $_SESSION['update'] = "update";
}



?>