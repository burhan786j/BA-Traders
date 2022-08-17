<!doctype html>
<html lang="en">
<?php
require('connection.inc.php');
require('functions.inc.php');
require('add_to_cart.inc.php');
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
    <!-- Bootstrap framework main css -->
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<style>
    body {
        background-color: rgba(231, 231, 226, 0.733);
    }

    .container {
        background-color: white;
        height: 100%;
    }
</style>

<body>
    <div class="container">
        <h3>Order Status</h3>
        <nav class="navbar navbar-light">
            <div class="container-fluid">
                <form class="d-flex">
                    <img src="https://img.icons8.com/material-rounded/24/000000/circled-left--v2.png" style="width: 27px;">
                    <a href="index.php" style="text-decoration: none; color: black; padding: 0px 8px;">Go Back</a>
                </form>
            </div>
        </nav>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class="product-thumbnail table-info">Order Details</th>
                    <th scope="col" class="product-name table-info"><span class="nobr">Order Date</span></th>
                    <th scope="col" class="product-price table-info"><span class="nobr"> Address</span></th>
                    <th scope="col" class="product-stock-stauts table-info"><span class="nobr"> Payment Type </span></th>
                    <th scope="col" class="product-stock-stauts table-info"><span class="nobr"> Payment Status </span></th>
                    <th scope="col" class="product-stock-stauts table-info"><span class="nobr"> Order Status </span></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $uid = $_SESSION['USER_ID'];
                //     SELECT
                //     product.name AS product_name,
                //     category.name AS category_name
                //   FROM product
                //   JOIN category ON product.category_id=category.id
                //   WHERE category.name != ’toys’;

                // $res=mysqli_query($con,"SELECT * from p_order where p_order.user_id='$uid' ");
                // $rev=mysqli_query($con,"SELECT * from order_status,p_order where order_status.id=p_order.order.s");


                $res = mysqli_query($con, "SELECT `p_order`.*,`order_status`.`name` AS order_stat FROM `p_order`,`order_status` WHERE p_order.user_id='$uid' AND `order_status`.`id`=`p_order`.`order_s`");
                while ($row = mysqli_fetch_assoc($res)) {
                ?>
                    <tr scope="row" class="table-primary">
                        <td class="product-add-to-cart"><a href="my_order_details.php?id=<?php echo $row['id'] ?>"><button type="button" class="btn btn-primary">Order Details</button></a>
                        <br>
                        <div class="pdf">
                        <a  href="order_pdf.php?id=<?php echo $row['id'] ?>"><button type="button" class="btn btn-success">PDF</button></a>
                        </div>
                    </td>
                        <td class="product-name"><?php echo $row['added_on'] ?></td>
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
</body>

</html>