<!doctype html>
<html lang="en">
<?php
require('connection.inc.php');
require('functions.inc.php');
require('add_to_cart.inc.php');

$cat_res = mysqli_query($con, "select * from categories where status = 1 ORDER BY `categories`ASC");
$cat_arr = array();
while ($row = mysqli_fetch_assoc($cat_res)) {
    $cat_arr[] = $row;
}

$product_id = mysqli_real_escape_string($con, $_GET['id']);
$get_product = get_product($con, '', $product_id);


//to update cart count 1-2-3-4 so on;
$obj = new add_to_cart();
$totalProduct = $obj -> totalProduct();


?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="favicon_io/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    require 'nav.php'
    ?>
    <nav class="navbar navbar-light">
        <div class="container-fluid">
            <form class="d-flex">
                <img src="https://img.icons8.com/material-rounded/24/000000/circled-left--v2.png" style="width: 27px;">
                <a href="users_categories.php?id=<?php echo $get_product['0']['categories_id'] ?>"
                    style="text-decoration: none; color: black; padding: 0px 8px;">Go Back</a>
            </form>
        </div>
    </nav>
    <div class="mb-2 ht__bradcaump__area">
    </div>
    <!-- End Bradcaump area -->
    <!-- Start Product Details Area -->
    <section class="htc__product__details bg__white ptb--100">
        <!-- Start Product Details Top -->
        <div class="htc__product__details__top">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                        <div class="htc__product__details__tab__content">
                            <!-- Start Product Big Images -->
                            <div class="mb-2 product__big__images">
                                <div class="">
                                    <a href="#"><img class="card-img-top" alt="Thumbnail [100%x225]" src="<?php echo 'uploaded products/' . $get_product['0']['image'] ?>" data-holder-rendered="true"></a>
                                </div>
                            </div>
                            <!-- End Product Big Images -->
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-40 xmt-40">
                        <div class="ht__product__dtl">
                            <h2>
                               <strong> <?php echo $get_product['0']['name'] ?></strong>
                            </h2>
                            <ul class="pro__prize my-4">
                            <strong> Price</strong><li class="old__prize">&#8377;
                                    <?php echo $get_product['0']['mrp'] ?>
                                </li>
                            </ul>
                            <strong> About Product: <br></strong>
                            <p class="pro__info"><?php echo $get_product['0']['short_desc'] ?></p>
                            <div class=ht_pro_desc>
                                <div class="sin__desc">
                                <?php 
                                 $productSoldQtyByProductId=productSoldQtyByProductId($con,$get_product['0']['id']);

                                 $pending_qty=$get_product['0']['qty']-$productSoldQtyByProductId;

                                 $cart_show='yes';
                                 if( $get_product['0']['qty']>$productSoldQtyByProductId){
                                    $stock='In Stock';    
                                 }else{
                                    $stock='Not in Stock';
                                    $cart_show='';
                                 }

                                ?>
                                <p><span>Availability:</span><?php echo $stock?></p>
                                </div>
                            </div>
                            <div>
                            <?php 
                                if($cart_show!=''){                            
                            ?>
                                <strong><span>Qty:</strong>
                                    <select id="qty">
                                        <?php 
                                            for($i=1 ; $i<=$pending_qty ; $i++){
                                                echo "<option>$i</option>";
                                            }
                                        ?>
                                        
                                        
                                    </select>
                                </p>
                                <?php } ?>
                            </div>
                            <?php 
                                IF($cart_show!=''){                            
                            ?>
                            <a class="btn btn-primary product" href="javascript:void(0)" onclick="manage_cart('<?php echo $get_product['0']['id'] ?>','add')">Add To Cart</a>
                            <a href="#" class="btn btn-primary product">Buy Now</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- End Product Details Top -->
    </section>
    <!-- Start Product Description -->
    <section class="htc__produc__decription bg__white">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <!-- Start List And Grid View -->
                    <ul class="pro__details__tab" role="tablist">
                        
                    </ul>
                    <!-- End List And Grid View -->
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="ht_prodetails_content">
                        <!-- Start Single Content -->
                        <div class="accordion" id="accordionPanelsStayOpenExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                        aria-controls="panelsStayOpen-collapseOne">
                                        About Product
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="panelsStayOpen-headingOne">
                                    <div class="accordion-body">


                                        <div role="tabpanel" id="description"
                                            class="pro_single_content tab-pane active">
                                            <div class="pro_tabcontent_inner">
                                                <p>The "BA TRADERS" has been developed to override the problems prevailing in the practicing manual system. This website is supported to eliminate and in some cases reduce the hardships faced by this existing system. Moreover this website is designed for every particular needy person where they can buy some unique items which they might be having difficulty to find.The website is reduced as much as possible to avoid errors while entering the data. It also provides error message while entering invalid data. No formal knowledge is needed for the user to use this system. Thus by this all it proves it is user-friendly. BA TRADERS, as described above, can lead to error free, secure, reliable and fast management system. It can assist the user to concentrate on their other activities rather to concentrate on the record keeping. Thus 0it will help organization in better utilization of resources.</p>
                                            </div>
                                        </div>
                                        <!-- End Single Content -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Product Description -->

  <!-- The Main Javascript file -->
  <script src="js/main.js" async></script>
  <script src="js/jquery-3.2.1.min.js" async></script>

</body>

</html>