<?php
include "./backend_inc/header.php";
include "../database/database.php";

$qurey = "SELECT id, con_name, contract, detail, banner_img, status FROM about ";
$sqli = mysqli_query($connect, $qurey);
$fatchs = mysqli_fetch_all($sqli, 1);


?>


<div class="container-fluid">
<table class="table  table-hover text-center ">
    <tr>
        <thead>
        <th>#</th>
        <th>Banner Imange</th>
        <th>Image Text</th>
        <th>Contract</th>
        <th>Details</th>
        <th>Featured</th>
        <th>Action</th>
        </thead>
    </tr>
   
      
 
    <?php
    
    foreach ($fatchs as $key=>$fatch){
        ?>
        <tr>
        <td> <?= ++$key ?> </td>
        <td> <img src="../uplode_image/about/<?=$fatch['banner_img']?>" width="100px" alt=""></td>
        <td> <?= $fatch['con_name'] ?> </td>
        <td><?= $fatch['contract'] ?> </td>
        <td class="col-lg-3"><?= $fatch['detail'] ?></td>
        <td>
            <a href="../login_control/aboutstatus.php?id=<?= $fatch['id'] ?>">
            <span class="text-warning">
                <i class=" <?= $fatch['status'] == 1 ?" fas fa-circle " :"far fa-circle" ?>" ></i>

            </span>
            </a>
            
        </td>
        <td>
            <a class="btn  btn-primary" href="./editaboutbanner.php?id=<?=$fatch['id']?>">Edit</a>
            <a class="btn btn-danger delete"  href="../login_control/deleteabout.php?id=<?= $fatch['id'] ?> ">Delete</a>
        </td>
    </tr>
    <?php
    }

    ?>

    </tr>


</table>



</div>




<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
    $('.delete').click(function (evnt){
        event.preventDefault()
        Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    
   
    window.location.href = $(this).attr('href');
  }
})
    })
</script>


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
  title: 'Successfully'
})
</script>

<?php
}

?>




<?php
unset($_SESSION['update']);
include "./backend_inc/footer.php";

?>