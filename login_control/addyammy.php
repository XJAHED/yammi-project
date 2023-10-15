<?php
include "../database/database.php";
session_start();

$title = $_REQUEST['title'];
$detail = $_REQUEST['detail'];

$qurey = "INSERT INTO why_yammy( title, detail) VALUES ('$title','$detail')";
$sqli = mysqli_query($connect, $qurey);

if($sqli){
    header("location:../Backend_file/allyammy.php");
    $_SESSION['update'] = "update";
}












?>