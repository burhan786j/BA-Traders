<?php
include('vendor/autoload.php');
require('connection.inc.php');
require('functions.inc.php');

if(!isset($_SESSION['USER_ID'])){
    die();
}

$order_id=get_safe_value($con,$_GET['id']);

$css=file_get_contents('style.css');

$html ='<div class="wishlist-table table-responsive">
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
<tbody>';
$uid = $_SESSION['USER_ID'];
$res = mysqli_query($con, "SELECT distinct(order_detail.id), order_detail.*,product.name,product.image from order_detail,product,p_order where order_detail.order_id='$order_id' and p_order.user_id='$uid' and product.id=order_detail.product_id");
if(mysqli_num_rows($res)==0){
    die();
}
while ($row = mysqli_fetch_assoc($res)) {
    $html.='<tr>
    <td class="product-add-to-cart">'.$row['name'].'</td>
    <td class="product-name">
    <img class="order-img" alt="Thumbnail [100%x225]" src="'.'uploaded products/' . $row['image'].'">
</td>
    <td class="product-name"> '.$row['qty'].'</td>
    <td class="product-name"> '.$row['price'].'</td>
    <td class="product-name">'.$row['qty']*$row['price'].'</td>
</tr>';
                                        }
                                        $html.='</tbody>
</table>
</div>';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($css,1);
$mpdf->WriteHTML($html);
$file=time().'.pdf';
$mpdf->output($file,'D');
?>