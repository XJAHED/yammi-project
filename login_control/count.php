<?php
session_start();
include "../database/database.php";

$title_a = $_REQUEST['title_a'];
$title_b = $_REQUEST['title_b'];
$title_c = $_REQUEST['title_c'];
$title_d = $_REQUEST['title_d'];
$num_a = $_REQUEST['num_a'];
$num_b = $_REQUEST['num_b'];
$num_c = $_REQUEST['num_c'];
$num_d = $_REQUEST['num_d'];
$id = $_REQUEST['id'];


$qurey = "SELECT * FROM counter";
$sqli = mysqli_query($connect, $qurey);
$fatch = mysqli_fetch_assoc($sqli);


$qureyupdate = "UPDATE counter SET num_a='$num_a',title_a='$title_a',num_b='$num_b',title_b='$title_b',num_c='$num_c',title_c='$title_c',num_d='$num_d',title_d='$title_d' where id = '$id' ";
$sqliupdate = mysqli_query($connect, $qureyupdate);
if($sqliupdate){
     
    $_SESSION['update'] = "update";   
    header("location:../Backend_file/counter.php");
}
?>