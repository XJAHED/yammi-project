<?php
include "./backend_inc/header.php";
include "../database/database.php";



?>

<div class="container-fluid">
    
    <form action="../login_control/gallery.php" method="post" enctype="multipart/form-data">

        <div class="card">

            <div class="card-header"> ADD Gallery Image</div>
            <div class="card-body">
               

                <input name="image"  class="form-control mt-4 " type="file">

                <span class="text-danger"><?= isset($_SESSION['banner_error']['ext_error']) ?  $_SESSION['banner_error']['ext_error'] : '' ?></span>
                
        <br>
                <button class="btn btn-primary mt-4">update</button>

            </div>


        </div>

    </form>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php

if(isset($_SESSION['update'])){
    ?>

<script>
    const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: 'Successfully Update'
})
</script>

<?php
}

?>

<?php
unset($_SESSION['banner_error']['ext_error']);
unset($_SESSION['update']);
include "./backend_inc/footer.php";
?>