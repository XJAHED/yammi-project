<?php
session_start();
include "../database/database.php";


$category = $_REQUEST['category'];
$title = $_REQUEST['title'];
$detail = $_REQUEST['detail'];
$price = $_REQUEST['price'];
$food_img = $_FILES['food_img'];
$error = [];

// banner image section
$img_type = ['jpg', 'png'];
$ext = pathinfo($food_img['name'])['extension'];

if($food_img['size'] == 0){
    $error['ext_error'] = "Enter your image";
}elseif(!in_array($ext, $img_type)){
    $error['ext_error'] = "enter jpg or png image";
}


if(count($error) > 0){
    $_SESSION['food_error'] = $error;
     header("location:../Backend_file/addfoods.php");
}

print_r($error);

$filename = "Food-". uniqid() .".$ext";
$path = "../uplode_image/food";

if(!is_dir($path)){
    mkdir($path);
}

$uplode = move_uploaded_file($food_img['tmp_name'], "../uplode_image/food/$filename");

if($uplode){
    $qurey = "INSERT INTO all_food(category_id, title, detail, price, food_img) VALUES ('$category', '$title', '$detail', '$price', '$filename' )" ;

    $sqli = mysqli_query($connect, $qurey);
    var_dump($sqli);

    if($sqli){
         $_SESSION['food_pop']= "Banner Update successful";
        header("location:../login_control/storefood.php");   
    }
}






?>