<?php
include "./backend_inc/header.php";
include "../database/database.php";

$qurey = "SELECT id, image FROM gallery ";
$sqli = mysqli_query($connect, $qurey);
$fatchs = mysqli_fetch_all($sqli, 1);


?>


<div class="container-fluid">
<table class="table  table-hover text-center ">
    <tr>
       <thead>
        <th>#</th>
        <th> Imange</th>
        <th>Action</th>
       </thead>
    </tr>
   
      
 
    <?php
    
    foreach ($fatchs as $key=>$fatch){
        ?>
        <tr>
        <td > <?= ++$key ?> </td>
        <td > <img src="../uplode_image/Gallery/<?=$fatch['image']?>" width="200px" alt=""></td>
        
        <td >

            <a class=" mt-5 btn btn-danger delete"  href="../login_control/deletegallery.php?id=<?= $fatch['id'] ?> ">Delete</a>
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