<?php
include "./backend_inc/header.php";
include "../database/database.php";

$qurey = "SELECT * FROM category";
$sqli = mysqli_query($connect, $qurey);
$categorys = mysqli_fetch_all($sqli, 1);



?>

<div class="container-fluid">
    
    <form action="../login_control/storefood.php" method="post" enctype="multipart/form-data">

        <div class="card">

            <div class="card-header">Add Food</div>


<div class="form-floating mt-4 col-lg-6">
  <select name="category" class="form-select" id="floatingSelect" aria-label="Floating label select example">
    
    <?php
    foreach($categorys as $category){
        ?>
         <option value="<?= $category['id'] ?>"> <?= $category['title'] ?> </option>

    <?php     
    }
    ?>

  </select>
  <label for="floatingSelect">Select Category</label>
</div>

            <div class="card-body">
                <input name="title" type="text" class="form-control" placeholder="Title">
                <textarea name="detail" class="form-control mt-3" placeholder="Details"  cols="1" rows="4"></textarea>

                <div class="row mt-4 mx-0">
                    <input name="price" class="form-control col-lg-4 mr-4" style="width:340px ;" type="text" placeholder="Price">
                </div>
      
                <input name="food_img"  class="form-control mt-4 " type="file">

               
<br>
                <button class="btn btn-primary mt-4">Add</button>

            </div>


        </div>

    </form>



</div>



<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php

if(isset($_SESSION['food_pop'])){
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
unset($_SESSION['food_pop']);
include "./backend_inc/footer.php";

?>