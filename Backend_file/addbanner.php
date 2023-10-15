<?php
include "./backend_inc/header.php";

?>

<div class="container-fluid">
    
    <form action="../login_control/storebanner.php" method="post" enctype="multipart/form-data">

        <div class="card">

            <div class="card-header">Add banner</div>
            <div class="card-body">
                <input name="title" type="text" class="form-control" placeholder="Title">
                <textarea name="detail" class="form-control mt-3" placeholder="Details"  cols="1" rows="4"></textarea>

                <div class="row mt-4 mx-0">
                    <input name="cta_title" class="form-control col-lg-4 mr-4" style="width:340px ;" type="text" placeholder="CTA title">
                    <input name="cta_link" class="form-control col-lg-4 mr-4" style="width: 330px;" type="text" placeholder="CTA link">
                    <input name="video_link" class="form-control col-lg-4" style="width: 330px;" type="text" placeholder="video link">

                </div>



           

                <input name="banner_img"  class="form-control mt-4 " type="file">

                <span class="text-danger"><?=isset($_SESSION['banner_error']['ext_error']) ?  $_SESSION['banner_error']['ext_error'] : '' ?></span>
                
               
<br>
                <button class="btn btn-primary mt-4">update</button>

            </div>


        </div>

    </form>


  



</div>







<?php


include "./backend_inc/footer.php";

?>