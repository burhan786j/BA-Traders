<!doctype html>
<html lang="en">
<?php
require('connection.inc.php');
require('functions.inc.php');
require('add_to_cart.inc.php');
// prx($_SESSION)
//to get categories from database to main page navbar
$cat_res = mysqli_query($con, "select * from categories where status = 1 ORDER BY `categories`ASC");
$cat_arr = array();
while ($row = mysqli_fetch_assoc($cat_res)) {
  $cat_arr[] = $row;
}

//to update cart count 1-2-3-4 so on;
$obj = new add_to_cart();
$totalProduct = $obj->totalProduct();

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
  <?php
  require 'nav.php'
  ?>
  <!-- cart-main-area start -->
  <div class="cart-main-area ptb--100 bg__white">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <form action="#">
            <div class="table-content table-responsive">
              <table>
                <thead>
                  <tr>
                    <th class="product-thumbnail">products</th>
                    <th class="product-name">name of products</th>
                    <th class="product-price">Price</th>
                    <th class="product-quantity">Quantity</th>
                    <th class="product-subtotal">Total</th>
                    <th class="product-remove">Remove</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($_SESSION['cart'] as $key => $val)
                  {
                    $productArr = get_product($con,'', $key);
                    $pname=$productArr['0']['name'];
                    $mrp=$productArr['0']['mrp'];
                    $price=$productArr['0']['price'];
                    $image=$productArr['0']['image'];
                    $qty=$val['qty']
                    
                    ?>
                    <tr>
                      <td class="product-thumbnail">
                        <a href="#">
                          <img src="<?php echo 'uploaded products/'.$image?>" />
                        </a>
                      </td>
                      <td class="product-name"><a href="#"><?php echo $pname?></a>
                        <ul class="pro__prize">
                          <li class="old__prize"><?php echo $mrp?></li>
                          <li><?php echo $price?></li>
                        </ul>
                      </td>
                      <td class="product-price"><span class="amount"></span><?php echo $price?></td>
                      <td class="product-quantity"><input type="number" id="<?php echo $key?>qty" value="<?php echo $qty?>" />
                      <br/><a class="text-dark" href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','update')">update</a>
                    </td>
                      <td class="product-subtotal"><?php echo $qty*$price?></td>
                      <td class="product-remove"><a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','remove')"><i class="icon-trash icons"></i></a></td>
                    </tr>
                  <?php } ?>
                </tbody> 
              </table>
            </div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="buttons-cart--inner">
                  <div class="buttons-cart">
                    <a href="index.php">Continue Shopping</a>
                  </div>
                  <div class="buttons-cart checkout--btn">
                    
                    <a href="checkout.php">checkout</a>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="js/jquery-3.2.1.min.js"></script>
  <!-- Bootstrap framework js -->
  <script src="js/bootstrap.min.js"></script>
  <!-- All js plugins included in this file. -->
  <script src="js/plugins.js"></script>
  <script src="js/slick.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <!-- Waypoints.min.js. -->
  <script src="js/waypoints.min.js"></script>
  <!-- Main js file that contents all jQuery plugins activation. -->
  <script src="js/main.js"></script>
</body>

</html>