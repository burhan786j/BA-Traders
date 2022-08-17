<!doctype html>
<html lang="en">
<?php
require('connection.inc.php');
require('functions.inc.php');
require('add_to_cart.inc.php');
$order_id=get_safe_value($con,$_GET['id']);

?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>BA Traders | The Best Shopping Website</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" href="apple-touch-icon.png">


    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Owl Carousel min css -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="css/custom.css">


    <!-- Modernizr JS -->
    <script src="js/modernizr-3.5.0.min.js"></script>
</head>

<style>
    body {
        background-color: rgba(231, 231, 226, 0.733);
    }

    .container {
        background-color: white;
    }
</style>

<body>
    <div class="wishlist-area ptb--100 bg__white">
        <div class="container">
        <h1><b>Order Details</b></h1>
        <nav class="navbar navbar-light">
            <div class="container-fluid">
                <form class="d-flex">
                    <img src="https://img.icons8.com/material-rounded/24/000000/circled-left--v2.png" style="width: 27px;">
                    <a href="my_order.php" style="text-decoration: none; color: black; padding: 0px 8px;">Go Back</a>
                </form>
            </div>
        </nav>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="wishlist-content">
                        <form action="#">
                            <div class="wishlist-table table-responsive">
                                <table>
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
                                        $uid = $_SESSION['USER_ID'];
                                        $res = mysqli_query($con, "SELECT distinct(order_detail.id), order_detail.*,product.name,product.image from order_detail,product,p_order where order_detail.order_id='$order_id' and p_order.user_id='$uid' and product.id=order_detail.product_id");

                                        while ($row = mysqli_fetch_assoc($res)) {
                                        ?>
                                            <tr>
                                                <td class="product-add-to-cart"><?php echo $row['name'] ?></td>
                                                <td class="product-name">
                                                <img class="order-img" alt="Thumbnail [100%x225]" src="<?php echo 'uploaded products/' . $row['image'] ?>" data-holder-rendered="true">
                                            </td>
                                                <td class="product-name"><?php echo $row['qty'] ?></td>
                                                <td class="product-name"><?php echo $row['price'] ?></td>
                                                <td class="product-name"><?php echo $row['qty']*$row['price'] ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>