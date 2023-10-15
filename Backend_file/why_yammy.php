<?php
include "./backend_inc/header.php";
include "../database/database.php";


?>

<div class="container-fluid">
    
    <form action="../login_control/addyammy.php" method="post" enctype="multipart/form-data">

        <div class="card">

            <div class="card-header"> ADD Yammy </div>
            <div class="card-body">
               

                <input name="title" class="form-control" type="text">
                <textarea class="form-control mt-3" name="detail"  rows="5"></textarea>
                
            
        <br>
                <button class="btn btn-primary mt-2">ADD</button>

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
  title: 'Successfully '
})
</script>

<?php
}

?>

<?php

unset($_SESSION['update']);
include "./backend_inc/footer.php";
?>