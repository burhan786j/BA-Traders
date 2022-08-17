<?php
require('top.inc.php');
$order_id = get_safe_value($con, $_GET['id']);
if(isset($_POST['update_order_status'])){
     $update_order_status=$_POST['update_order_status'];
     mysqli_query($con, "UPDATE `p_order` SET order_s='$update_order_status' WHERE id='$order_id'");
}
?>
<div class="content pb-0">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Order Details </h4>
                    </div>
                    <a href="order_master.php">
                        <img src="https://img.icons8.com/material-rounded/24/000000/circled-left--v2.png" style="width: 27px;"></a>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">Product Name</th>
                                        <th class="product-name">Product Image</th>
                                        <th class="product-price">Qty</th>
                                        <th class="product-price"> Price</th>
                                        <th class="product-price">Total Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $res = mysqli_query($con, "SELECT DISTINCT(order_detail.id), order_detail.*,product.name,product.image FROM order_detail,product,p_order WHERE order_detail.order_id='$order_id' AND order_detail.product_id=product.id");
                                    $total_price = 0;
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        $total_price = $total_price + ($row['qty'] * $row['price']);
                                    ?>
                                        <tr>
                                            <td class="product-add-to-cart"><?php echo $row['name'] ?></td>
                                            <td class="product-name">
                                                <img class="order-img" style="max-width: 100px;" alt="Thumbnail [100%x225]" src="<?php echo '../uploaded products/' . $row['image'] ?>" data-holder-rendered="true">
                                            </td>
                                            <td class="product-name"><?php echo $row['qty'] ?></td>
                                            <td class="product-name"><?php echo $row['price'] ?></td>
                                            <td class="product-name"><?php echo $row['qty'] * $row['price'] ?></td>
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <td colspan="3"></td>
                                        <td class="product-name">Total price</td>
                                        <td class="product-name"><?php echo $total_price ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div id="addredd_details">
                                <strong>Order Status:</strong>
                                <?php $order_status_arr = mysqli_fetch_assoc(mysqli_query($con, "select order_status.name from order_status,p_order where p_order.id='$order_id' and p_order.order_s=order_status.id"));
                                echo $order_status_arr['name'];
                                ?>

                                <div>
                                    <form action="" method="post">
                                        <select class="form-control" name="update_order_status">
                                            <option>Select Status</option>
                                            <?php
                                            $res = mysqli_query($con, "select * from order_status");
                                            while ($row = mysqli_fetch_assoc($res)) {
                                                if ($row['id'] == $categories_id) {
                                                    echo "<option selected value=" . $row['id'] . ">" . $row['name'] . "</option>";
                                                } else {
                                                    echo "<option value=" . $row['id'] . ">" . $row['name'] . "</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                        <input type="submit" class="form-control">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require('footer.inc.php');
?>