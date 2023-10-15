<?php
include "./backend_inc/header.php";

?>

<div class="container-fluid">
    
    <form action="../login_control/storecategory.php" method="post" >

        <div class="card">

            <div class="card-header">Add Category</div>
            <div class="card-body">
                <input name="title" type="text" class="form-control" placeholder="Title">
               
                <button class="btn btn-primary mt-4">update</button>

            </div>


        </div>

    </form>


</div>


<?php

include "./backend_inc/footer.php";

?>