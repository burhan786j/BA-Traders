<?php
require('top.inc.php');
$categories = '';
$msg = "";
if (isset($_GET['id']) && $_GET['id'] != '') {
   $id = get_safe_value($con, $_GET['id']);
   $res = mysqli_query($con, "select * from categories where id = '$id'");
   $check = mysqli_num_rows($res);
   if ($check > 0) {
      $row = mysqli_fetch_assoc($res);
      $categories = $row['categories'];
   } else {
      header('location:admin_categories.php');
      die();
   }
}

if (isset($_POST['submit'])) {
   $categories = get_safe_value($con, $_POST['categories']);
   $res = mysqli_query($con, "select * from categories where categories = '$categories'");
   $check = mysqli_num_rows($res);
   if ($check > 0) {
      if (isset($_GET['id']) && $_GET['id'] != '') {
         $getData=mysqli_fetch_assoc($res);
         if($id==$getData['id']) {

         }else {
            $msg = "Category already exists";
         }
      } else {
         $msg = "Category already exists";
      }
   } 
   if($msg ==''){
      if (isset($_GET['id']) && $_GET['id'] != '') {
         $query = "UPDATE `categories` SET categories='$categories' where id='$id'";
         $con->query($query);
      } else {
         $query = "INSERT INTO `categories`(`categories`, `status`) VALUES ('$categories','1')";
         $con->query($query);
      }
      header('location:admin_categories.php');
      die();
   }
}



?>
<style>
   .field_error {
      color: red;
      margin-top: 15px;
   }
</style>
<div class="content pb-0">
   <div class="animated fadeIn">
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-header"><strong>Categories</strong><small> Form</small></div>
               <a href="admin_categories.php" >
                   <img src="https://img.icons8.com/material-rounded/24/000000/circled-left--v2.png" style="width: 27px;"></a>
               <form method="post">
                  <div class="card-body card-block">
                     <div class="form-group"><label for="categories" class=" form-control-label">Categories</label>
                        <input type="text" name="categories" placeholder="Enter Categories name" class="form-control" required value="<?php echo $categories ?>">
                     </div>
                     <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
                        <span id="payment-button-amount">Submit</span>
                     </button>
                     <div class="field_error"><?php echo $msg ?></div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<?php
require('footer.inc.php');
?>