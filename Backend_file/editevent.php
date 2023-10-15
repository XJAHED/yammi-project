<?php
include "./backend_inc/header.php";
include  "../database/database.php";
$id = $_REQUEST['id'];
$qurey = "SELECT * FROM event where id = '$id' ";
$sqli = mysqli_query($connect, $qurey);
$fatch = mysqli_fetch_assoc($sqli);

?>

<div class="container-fluid">
    
    <form action="../login_control/eventedit.php" method="post" enctype="multipart/form-data">

        <div class="card">

            <div class="card-header">Edit event</div>
            <div class="card-body">
                <input type="hidden" name="id" value="<?= $fatch['id'] ?>">
                <input value="<?= $fatch['name'] ?>" name="name" type="text" class="form-control" placeholder="Event name">
                <textarea  value="<?= $fatch['detail'] ?>" name="detail" class="form-control mt-3" placeholder="Event Details"  cols="1" rows="4"><?= $fatch['detail'] ?></textarea>

                 <input  value="<?= $fatch['price'] ?>" name="price" class="form-control col-lg-4 mt-3 mr-4" style="width:340px ;" type="text" placeholder="Price">

                <input name="banner_img"  class="form-control mt-4 " type="file">
                
                <span class="text-danger"> <?= isset($_SESSION['banner_error']['ext_error']) ? $_SESSION['banner_error']['ext_error']: '' ?> </span>
 
          
<br>
                <button class="btn btn-primary mt-4">Update</button>

            </div>


        </div>

    </form>


</div>


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
  title: 'Add successfully'
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