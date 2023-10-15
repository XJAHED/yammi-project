<?php

include "./backend_inc/header.php";

?>



<div class="container-fluid">
  <div class="row">
     <div class="col-lg-8">

     <form action="../login_control/profileupdate.php" method="post" enctype="multipart/form-data">
    
      
    <div class="row">
        <div class=" col-lg-4">

        <label  for="profileImage" class="mt-4">
          
          <img class="profile_image rounded-circle" style="width: 200px; height: 200px; "
          src=" <?= isset($_SESSION['user_auth']['profile_pic'])? "../uplode_image/user/".$_SESSION['user_auth']['profile_pic'] : " https://api.dicebear.com/7.x/initials/svg?seed=".$_SESSION['user_auth']['frast_name'] ?> ">
                                
        </label>
        <input name="image" type="file"  id="profileImage" class="select_profile_img d-none">

        <span class="text-danger"> <?= isset($_SESSION['profile_error']['img_error']) ? $_SESSION['profile_error']['img_error']: '' ?> </span>


       
        
        </div>

        <div class=" col-lg-7 mt-3">
        
         
             <input name="frist_name" value="<?=$_SESSION['user_auth']['frast_name']?>" type="text" class="form-control mt-3" placeholder="First name" aria-label="First name">
           
             <input name="last_name" value="<?=$_SESSION['user_auth']['last_name']?>" type="text" class="form-control mt-3" placeholder="Last name" aria-label="Last name">
           
             <input name="email" value="<?=$_SESSION['user_auth']['email']?>" type="text" class="form-control mt-3" placeholder="Email address" aria-label="email">
         

           <button class="btn btn-primary mt-3 ml-3" >UPDATE</button>
    </div>
    </div>
           </form>
          
     </div>


     <div class="col-lg-4 mt-3 " >
      <form action="../login_control/cng_password.php" method="post">
                    <input name="old_password" type="password" class="form-control my-3" placeholder="Old Password">

                  

                    <?php
                    if(isset($_SESSION['form_error']['old_error'])){
                      ?>
                      <span class="text-danger"><?=$_SESSION['form_error']['old_error']?></span>
                      <?php
                    }
                    ?>



                    <input name="new_password" type="password" class="form-control my-3" placeholder="New Password">
                    <input name="con_password" type="password" class="form-control my-3" placeholder="Confirm Password">

                    <span class="text-danger"><?= isset($_SESSION['form_error']['con_error']) ?  $_SESSION['form_error']['con_error'] : '' ?></span>
                    
                    <button class="btn testBtn btn-primary w-100">Update</button>
      </form>        
     </div>

  </div>


  <div class="toast  <?=isset($_SESSION['popup']) ? "show" : ""?>"  style="position: absolute; top:20px; right:50px;" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header" style="background-color:aquamarine;">
  <i class="far fa-check-circle fa-spin fa-lg rounded me-2"></i>  
    <strong class="me-auto"> <i><b>UPDATE</b></i> </strong>
    <small>30s ago</small>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">
    <b> <?= isset($_SESSION['popup'])? $_SESSION['popup'] : "" ?> </b>
  </div>
</div>
</div>


       



<?php
unset($_SESSION['profile_error']);
unset($_SESSION['form_error']);
unset($_SESSION['popup']);
 include "./backend_inc/footer.php";

?>




<script>
    let profileInput = document.querySelector('.select_profile_img')
    let profileImage = document.querySelector('.profile_image')

    function updateImage(event){
        let url = URL.createObjectURL(event.target.files[0])
        profileImage.src = url
    }
    profileInput.addEventListener('change',updateImage)


</script>