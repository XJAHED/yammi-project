<?php
include "./backend_inc/header.php";
include "../database/database.php";

$qurey = "SELECT * FROM counter";
$sqli = mysqli_query($connect, $qurey);
$fatch = mysqli_fetch_assoc($sqli);



?>

<div class="container-fluid">
  <div class="row">
    <form action="../login_control/count.php" method="get">
        <div class="card-body">
            <input type="hidden" name="id" value="<?= $fatch['id'] ?>">
            
           
              <tr>
                <td>
                  <input name="title_a" class="col-lg-4 mt-3 mr-2 p-2" type="text" value="<?= $fatch['title_a'] ?>">
                  <input name="num_a" class="col-lg-4 mt-3 mr-2 p-2" type="text" value="<?= $fatch['num_a'] ?>">
                  <input name="title_b" class="col-lg-4 mt-3 mr-2 p-2" type="text" value="<?= $fatch['title_b'] ?>">
                  <input name="num_b" class="col-lg-4 mt-3 mr-2 p-2" type="text" value="<?= $fatch['num_b'] ?>">
                </td>
     
                <td>
                  <input name="title_c" class="col-lg-4 mt-3 mr-2 p-2" type="text" value="<?= $fatch['title_c'] ?>">
                  <input  name="num_c"class="col-lg-4 mt-3 mr-2 p-2" type="text" value="<?= $fatch['num_c'] ?>">
                  <input name="title_d" class="col-lg-4 mt-3 mr-2 p-2" type="text" value="<?= $fatch['title_d'] ?>">
                  <input name=" num_d" class="col-lg-4 mt-3 mr-2 p-2" type="text" value="<?= $fatch['num_d'] ?>">
                </td>
            </tr>
        <br>
            <button class="btn btn-primary mt-4">Banner update</button>
            
        </div>

    </form>

    </div>
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
  title: 'Successfully Update'
})
</script>

<?php
}

?>

<?php
unset($_SESSION['update']);
include "./backend_inc/footer.php";
?>