<?php
include "./backend_inc/header.php";
include "../database/database.php";

$id = $_REQUEST['id'];
$qurey = "SELECT * FROM about WHERE id = $id";
$sqli = mysqli_query($connect, $qurey);
$fatch = mysqli_fetch_assoc($sqli);

?>

<div class="container-fluid">
    
    <form action="../login_control/editabout.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?=$fatch['id']?>">
        <div class="card">

            <div class="card-header">Edit about banner</div>
            <div class="card-body">
                
                <input name="con_name" type="text" class="form-control " value="<?= $fatch['con_name'] ?>">
                <input name="contract" type="text" class="form-control mb-3 mt-3" value="<?= $fatch['contract'] ?>">
                <textarea name="detail" id="summernote" class="form-control mt-3" value="<?= $fatch['detail'] ?>" > <?= $fatch['detail'] ?> </textarea>

                <div class="row mt-4 mx-0">
                   
                    <input name="video_link" class="form-control col-lg-4" style="width: 330px;" type="text" value="<?= $fatch['video_link'] ?>">

                </div>


                <input name="banner_img"  class="form-control mt-4 " type="file">

                
                
<br>
                <button class="btn btn-primary mt-4">Update</button>

            </div>


        </div>

    </form>


</div>





<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php

if(isset($_SESSION['about_pop'])){
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
unset($_SESSION['about_pop']);

include "./backend_inc/footer.php";

?>