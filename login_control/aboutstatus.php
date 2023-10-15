<?php
include "../database/database.php";

$id= $_REQUEST['id'];

$quret = "UPDATE about set status = 0";
$sqli = mysqli_query($connect, $quret);


$update = "UPDATE about set status = 1 where id = $id";
$updateQurey= mysqli_query($connect, $update);
header("location:../Backend_file/allabout.php");
?>