<?php
include "./backend_inc/header.php";
include "../database/database.php";

$qurey = "SELECT * FROM contact";
$sqli = mysqli_query($connect, $qurey);
$fatch = mysqli_fetch_assoc($sqli);



?>


<div class="container-fluid">
    
    <table class="table  table-hover text-center ">
    <tr>
       <thead>
        <th> Name</th>
        <th>Massage</th>
        <th>Action</th>
       </thead>
    </tr>
   
      
    <form action="../login_control/edit_contact.php" method="post"> 
    <div class="card-body">
        <input type="hidden" name="id" value="<?=$fatch['id']?>">
    <tr>
        <th> Map Location : </th> <td><input name="map"  value="<?=$fatch['map']?>" type="text" class="form-control"></td>
     
        <td >
            <button class="btn btn-primary"> update</button>
            <!-- <a class=" btn btn-danger "  href="../login_control/edit_contact.php?id=<?= $fatch['id'] ?> ">Update</a> -->
            
        </td>
    </tr>

    <tr>
        <th> Store Address: </th> <td><input name="address" value="<?=$fatch['address']?>" type="text" class="form-control"></td>
     
        <td >
            <button class="btn btn-primary"> update</button>
            <!-- <a class=" btn btn-danger "  href="../login_control/edit_contact.php?id=<?= $fatch['id'] ?> ">Update</a> -->
           
        </td>
    </tr>

    <tr>
        <th>Store Email : </th> <td><input name="email" value="<?=$fatch['email']?>" type="email" class="form-control"></td>
     
        <td >
            <button class="btn btn-primary"> update</button>
            <!-- <a class=" btn btn-danger "  href="../login_control/edit_contact.php?id=<?= $fatch['id'] ?> ">Update</a> -->
            
        </td>
    </tr>

    <tr>
        <th>Store Phone : </th> <td><input name="coll" value="<?=$fatch['coll']?>" type="text" class="form-control"></td>
     
        <td >
            <button class="btn btn-primary"> update</button>
            <!-- <a class=" btn btn-danger "  href="../login_control/edit_contact.php?id=<?= $fatch['id'] ?> ">Update</a> -->
            
        </td>
    </tr>

    <tr>
        <th> Opening hours : </th> <td><input name="opening" value="<?=$fatch['opening']?>" type="text" class="form-control"></td>
     
        <td >
            <button class="btn btn-primary"> update</button>
            <!-- <a class=" btn btn-danger "  href="../login_control/edit_contact.php?id=<?= $fatch['id'] ?> ">Update</a> -->
            
        </td>
    </tr>

    </div>
    </form>
  
   

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