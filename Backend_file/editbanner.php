<?php
include "./backend_inc/header.php";
include "../database/database.php";


$id = $_REQUEST['id'];
$qurey = "SELECT * FROM banners where id ='$id' ";
$sqli = mysqli_query($connect, $qurey);
$fatch = mysqli_fetch_assoc($sqli);

?>



<div class="container-fluid">
    
    <form action="../login_control/banneredit.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?=$fatch['id']?>">
        <div class="card">

            <div class="card-header">Edit banner</div>
            <div class="card-body">
                <input value="<?= $fatch ['title'] ?>" name="title" type="text" class="form-control" placeholder="Title">
                <textarea  name="detail" class="form-control mt-3" placeholder="Details"  cols="1" rows="4"><?= $fatch ['detail'] ?></textarea>

                <div class="row mt-4 mx-0">
                    <input value="<?= $fatch ['cta_title'] ?>" name="cta_title" class="form-control col-lg-4 mr-4" style="width:340px ;" type="text">
                    <input value="<?= $fatch ['cta_link'] ?>" name="cta_link" class="form-control col-lg-4 mr-4" style="width: 330px;" type="text" >
                    <input value="<?= $fatch ['video_link'] ?>" name="video_link" class="form-control col-lg-4" style="width: 330px;" type="text" >

                </div>


                <input name="banner_img"  class="form-control mt-4 " type="file">
  
<br>
                <button class="btn btn-primary mt-4">Banner update</button>

            </div>


        </div>

    </form>


    



</div>







<?php

include "./backend_inc/footer.php";

?>