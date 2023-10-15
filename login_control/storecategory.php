<?php
include "../database/database.php";


$title = $_REQUEST['title'];

$qurey = "INSERT INTO category(title) VALUES ('$title')";
$sqli = mysqli_query($connect, $qurey);

if($sqli){
    header("location:../Backend_file/addcategory.php");
}

?>