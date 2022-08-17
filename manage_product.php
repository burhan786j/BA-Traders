<?php
require('top.inc.php');
$categories_id = '';
$name = '';
$mrp = '';
$price = '';
$qty = '';
$image = '';
$short_desc = '';
$description = '';
$meta_title = '';
$meta_desc = '';
$meta_keyword = "";
$best_seller ="";

$msg = '';
$image_required = "required";
if (isset($_GET['id']) && $_GET['id'] != '') {
   $image_required = '';
   $id = get_safe_value($con, $_GET['id']);
   $res = mysqli_query($con, "select * from product where id = '$id'");
   $check = mysqli_num_rows($res);
   if ($check > 0) {
      $row = mysqli_fetch_assoc($res);
      $categories_id = $row['categories_id'];
      $name = $row['name'];
      $mrp = $row['mrp'];
      $price = $row['price'];
      $qty = $row['qty'];
      $short_desc = $row['short_desc'];
      $description = $row['description'];
      $meta_title = $row['meta_title'];
      $meta_desc = $row['meta_desc'];
      $meta_keyword = $row['meta_keyword'];
      $best_seller =$row['best_seller'];
   } else {
      header('location:admin_product.php');
      die();
   }
}
//SUBMIT VALIDATION
if (isset($_POST['submit'])) {
   $categories_id = get_safe_value($con, $_POST['categories_id']);
   $name = get_safe_value($con, $_POST['name']);
   $mrp = get_safe_value($con, $_POST['mrp']);
   $price = get_safe_value($con, $_POST['price']);
   $qty = get_safe_value($con, $_POST['qty']);
   $short_desc = get_safe_value($con, $_POST['short_desc']);
   $description = get_safe_value($con, $_POST['description']);
   $meta_title = get_safe_value($con, $_POST['meta_title']);
   $meta_desc = get_safe_value($con, $_POST['meta_desc']);
   $meta_keyword = get_safe_value($con, $_POST['meta_keyword']);
   $best_seller = get_safe_value($con, $_POST['best_seller']);

   $res = mysqli_query($con, "select * from product where name = '$name'");
   $check = mysqli_num_rows($res);
   if ($check > 0) {
      if (isset($_GET['id']) && $_GET['id'] != '') {
         $getData = mysqli_fetch_assoc($res);
         if ($id == $getData['id']) {
         } else {
            $msg = "Product already exists";
         }
      } else {
         $msg = "Product already exists";
      }
   }

   if ($_FILES['image']['type']!='image/jpeg' && $_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg') {
      $msg ="Please select only png , jpg , jpeg image format";
   }
   //update & insert validation
   if ($msg == '') {
      if (isset($_GET['id']) && $_GET['id'] != '') {
         if ($_FILES['image']['name'] !== '') {
            $image = rand(11111111, 99999999) . '_' . $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], '../uploaded products/' . $image);
            $update_sql = "UPDATE `product` SET categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',short_desc='$short_desc',description='$description',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword',image='$image' ,best_seller='$best_seller' where id='$id'";
         } else {
            $update_sql = "UPDATE `product` SET categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',short_desc='$short_desc',description='$description',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword',best_seller='$best_seller' where id='$id'";
         }
         $query = $update_sql;
         $con->query($query);
      } else {
         $image = rand(11111111, 99999999) . '_' . $_FILES['image']['name'];
         move_uploaded_file($_FILES['image']['tmp_name'], '../uploaded products/' . $image);
         $query = "INSERT INTO `product`(`categories_id`,`name`,`mrp`,`price`,`qty`,`short_desc`,`description`,`meta_title`,`meta_desc`,`meta_keyword`,`status`,`image`,`best_seller`) VALUES ('$categories_id','$name','$mrp','$price','$qty','$short_desc','$description','$meta_title','$meta_desc','$meta_keyword','1','$image','$best_seller')";
         $con->query($query);
      }
      header('location:admin_product.php');
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
               <div class="card-header"><strong>Products</strong><small> Form</small></div>
               <a href="admin_product.php">
                   <img src="https://img.icons8.com/material-rounded/24/000000/circled-left--v2.png" style="width: 27px;"></a>
               <form method="post" enctype="multipart/form-data">
                  <div class="card-body card-block">
                     <div class="form-group">
                        <label for="categories" class=" form-control-label">Categories</label>
                        <select class="form-control" name="categories_id">
                           <option>Select category</option>
                           <?php
                           $res = mysqli_query($con, "select id,categories from categories order by categories");
                           while ($row = mysqli_fetch_assoc($res)) {
                              if ($row['id'] == $categories_id) {
                                 echo "<option selected value=" . $row['id'] . ">" . $row['categories'] . "</option>";
                              } else {
                                 echo "<option value=" . $row['id'] . ">" . $row['categories'] . "</option>";
                              }
                           }
                           ?>
                        </select>
                     </div>
                     <div class="form-group"><label for="categories" class=" form-control-label">Product Name</label>
                        <input type="text" name="name" placeholder="Enter product name" class="form-control" required value="<?php echo $name ?>">
                     </div>
                     <div class="form-group">
                        <label for="categories" class=" form-control-label">Best_seller</label>
                        <select class="form-control" name="best_seller" required>
                           <option value="">Select</option>
                        <?php 
                           if($best_seller == 1){
                              echo '<option value="1" selected>Yes</option>
                                    <option value="0">No</option>';
                           }elseif($best_seller == 0){
                              echo '<option value="1">Yes</option>
                                    <option value="0" selected>No</option>';
                           }else{
                              echo '<option value="1">Yes</option>
                                    <option value="0">No</option>';
                           }
                        ?>
                           
                        </select>
                        </div>
                     <div class="form-group"><label for="categories" class=" form-control-label">MRP</label>
                        <input type="text" name="mrp" placeholder="Enter product mrp" class="form-control" required value="<?php echo $mrp ?>">
                     </div>
                     <div class="form-group"><label for="categories" class=" form-control-label">Product Price</label>
                        <input type="text" name="price" placeholder="Enter product price" class="form-control" required value="<?php echo $price ?>">
                     </div>
                     <div class="form-group"><label for="categories" class=" form-control-label">Product Qty</label>
                        <input type="text" name="qty" placeholder="Enter product qty" class="form-control" required value="<?php echo $qty ?>">
                     </div>
                     <div class="form-group"><label for="categories" class=" form-control-label">Product Image</label>
                        <input type="file" name="image" class="form-control" <?php echo $image_required ?>>
                     </div>
                     <div class="form-group"><label for="categories" class=" form-control-label">Short Description </label>
                        <textarea class="form-control" name="short_desc" placeholder="Enter product Short Description" required><?php echo $short_desc ?></textarea>
                     </div>

                     <div class="form-group"><label for="categories" class=" form-control-label">Description </label>
                        <textarea class="form-control" name="description" placeholder="Enter product Description" required><?php echo $description ?></textarea>
                     </div>

                     <div class="form-group"><label for="categories" class=" form-control-label">Meta Title </label>
                        <textarea class="form-control" name="meta_title" placeholder="Enter product Meta Title"><?php echo $meta_title ?></textarea>
                     </div>

                     <div class="form-group"><label for="categories" class=" form-control-label">Meta Description </label>
                        <textarea class="form-control" name="meta_desc" placeholder="Enter product Meta Description"><?php echo $meta_desc ?></textarea>
                     </div>

                     <div class="form-group"><label for="categories" class=" form-control-label">Meta Keyword </label>
                        <textarea class="form-control" name="meta_keyword" placeholder="Enter product Meta Keyword"><?php echo $meta_keyword ?></textarea>

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