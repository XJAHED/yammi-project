<?php
session_start();
include "../database/database.php";

$map = $_REQUEST['map'];
$address = $_REQUEST['address'];
$email = $_REQUEST['email'];
$coll = $_REQUEST['coll'];
$opening = $_REQUEST['opening'];
$id = $_REQUEST['id'];


$qurey = "SELECT * FROM contact";
$sqli = mysqli_query($connect, $qurey);
$fatch = mysqli_fetch_assoc($sqli);

$qureyUpdate = "UPDATE contact SET map='$map',address='$address',email='$email',coll='$coll',opening='$opening' WHERE id= '$id'";
$sqliUpdate = mysqli_query($connect, $qureyUpdate);

if($sqliUpdate){
    header("location:../Backend_file/add_contact.php");
    $_SESSION['update'] = "update";
}

?>

