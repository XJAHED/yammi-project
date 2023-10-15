<?php
include "../database/database.php";
$id = $_REQUEST['id'];

$qurey = "DELETE FROM book_table WHERE id = '$id'";
$sqli = mysqli_query($connect, $qurey);
if($sqli){
    header("location:../Backend_file/all_table.php");
}

?>