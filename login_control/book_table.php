<?php
include "../database/database.php";
session_start();

$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$phone = $_REQUEST['phone'];
$date = $_REQUEST['date'];
$time = $_REQUEST['time'];
$people = $_REQUEST['people'];
$message = $_REQUEST['message'];

$qurey =  "INSERT INTO book_table(name, email, phone, date, time, people, msg) VALUES ('$name','$email','$phone','$date','$time','$people','$message')";
$sqli = mysqli_query($connect, $qurey);

if($sqli){
    $_SESSION['update'] = "update";
    header("location:../index.php");
   
}

?>