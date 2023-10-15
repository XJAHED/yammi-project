<?php
include "./backend_inc/header.php";
include "../database/database.php";

$qurey = "SELECT * FROM book_table";
$sqli = mysqli_query($connect, $qurey);
$fatchs = mysqli_fetch_all($sqli, 1);


?>


<div class="container-fluid">
<table class="table  table-hover text-center ">
    <tr>
       <thead>
        <th>#</th>
        <th> Name</th>
        <th> Email</th>
        <th> phone</th>
        <th> Date</th>
        <th> Time</th>
        <th> People</th>
        <th>Massage</th>
        <th>Action</th>
       </thead>
    </tr>
   
      
 
    <?php
    
    foreach ($fatchs as $key=>$fatch){
        ?>
        <tr>
        <td><?= ++$key ?> </td>
        <td class="col-lg-2"><?= $fatch['name'] ?></td>
        <td class="col-lg-1"><?= $fatch['email'] ?></td>
        <td><?= $fatch['phone'] ?></td>
        <td><?= $fatch['date'] ?></td>
        <td ><?= $fatch['time'] ?></td>
        <td ><?= $fatch['people'] ?></td>
        <td class="col-lg-3"><?= $fatch['msg'] ?></td>
        


        
        <td >
          
            
            <a class=" btn btn-danger delete"  href="../login_control/book.php?id=<?= $fatch['id'] ?> ">Delete</a>
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