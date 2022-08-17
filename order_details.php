<?php
require('top.inc.php');
$sql = "select * from users order by id desc";
$res = mysqli_query($con, $sql);

$sub_sql = "";
$to = $from = "";
if (isset($_POST['submit'])) {
    $from = $_POST['from'];
    $fromArr = explode('/', $from);
    $from = $fromArr['2'] . '-' . $fromArr['1'] . '-' . $fromArr['0'];
    $from = $from . " 00:00:00";
    $to = $_POST['to'];
    $toArr = explode('/', $to);
    $to = $toArr['2'] . '-' . $toArr['1'] . '-' . $toArr['0'];
    $to = $to . " 23:59:59";

    $sub_sql = "where added_on >= '$from' && added_on <= '$to'";
}

?>
<div class="content pb-0">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <h4 class="box-title">Order Details </h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="product-thumbnail table-info">Order Details</th>
                                        <th scope="col" class="product-name table-info"><span class="nobr">Order Date</span></th>
                                        <th scope="col" class="product-name table-info"><span class="nobr">Name</span></th>
                                        <th scope="col" class="product-price table-info"><span class="nobr"> Address</span></th>
                                        <th scope="col" class="product-stock-stauts table-info"><span class="nobr"> Payment Type </span></th>
                                        <th scope="col" class="product-stock-stauts table-info"><span class="nobr"> Payment Status </span></th>
                                        <th scope="col" class="product-stock-stauts table-info"><span class="nobr"> Order Status </span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // $res = mysqli_query($con, "select p_order.*,order_status.name as order_status_str from p_order,order_status where order_status.id=p_order.order_status");
                                    $res = mysqli_query($con, "SELECT `p_order`.*,`order_status`.`name` AS order_stat FROM `p_order`,`order_status` WHERE `order_status`.`id`=`p_order`.`order_s`");

                                    while ($row = mysqli_fetch_assoc($res)) {
                                    ?>
                                        <tr scope="row" class="table-primary">
                                            <td class="product-add-to-cart"><a href="order_master_details.php?id=<?php echo $row['id'] ?>"><button type="button" class="btn btn-primary">Order Details</button></a>
                                                <br>
                                                <div class="pdf">
                                                    <a href="../order_pdf.php?id=<?php echo $row['id'] ?>"><button type="button" class="btn btn-success">PDF</button></a>
                                                </div>
                                            </td>
                                            <td class="product-name"><?php echo $row['added_on'] ?></td>
                                            <td class="product-name"><?php echo $row['first_name'] ?></td>
                                            <td class="product-name">
                                                <?php echo $row['address'] ?><br>
                                                <?php echo $row['country'] ?><br>
                                                <?php echo $row['state'] ?><br>
                                                <?php echo $row['zip'] ?><br>
                                            </td>
                                            <td class="product-name"><?php echo $row['payment_type'] ?></td>
                                            <td class="product-name"><?php echo $row['payment_status'] ?></td>
                                            <td class="product-name"><?php echo $row['order_stat'] ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
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