<!doctype html>
<html lang="en">
<?php
require('connection.inc.php');
require('functions.inc.php');
require('add_to_cart.inc.php');


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
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="shortcut icon" href="favicon_io/favicon.ico" type="image/x-icon">
  <link rel="shortcut icon" href="#">
  <link rel="stylesheet" href="css/style.css">
  <!-- <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <link rel="shortcut icon" href="#">
  <link rel="shortcut icon" href="favicon_io/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="style.css">
  <script src="main.js" async></script> -->

  <title>BA Traders | The Best Shopping Website</title>
</head>


<body>

  <?php
  require 'nav.php'
  ?>

  <nav class="navbar navbar-light">
    <div class="container-fluid justify-content-center">
      <form class="d-flex" action="search.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" name="str" aria-label="Search">
        <button class="btn btn-light " type="submit">Search</button>
      </form>
    </div>
  </nav>
  <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/carosuel/1.jpeg" class="d-block w-100" alt="..." style="height: 75vh">
      </div>
      <div class="carousel-item">
        <img src="img/carosuel/2.jpg" class="d-block w-100" alt="..." style="height: 75vh">
      </div>
      <div class="carousel-item">
        <img src="img/carosuel/3.jpg " class="d-block w-100" alt="..." style="height: 75vh">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <!--first section  -->
  <div class="container my-3">
    <div class="row">
      <div class="heading">
        <h2>Featured</h2>
      </div>
      <br>
      <hr>
      <!-- <div class="htc__select__option">
        <select class="ht__select" onchange="sort_product_drop(<?php echo $cat_id ?>)" id="sort_product_id">
          <option value="">Default sorting</option>
          <option value="price_high">Sort by price low to high</option>
          <option value="price_low">Sort by price high to low </option>
          <option value="new">Sort by new first</option>
          <option value="old">Sort by old first</option>
        </select>
      </div> -->
      <br>
      <?php
      $get_product = get_product($con);
      foreach ($get_product as $list) {
      ?>
        <div class="col-md-4">
          <div class="card mb-4 box-shadow">
            <a href="users_product.php?id=<?php echo $list['id'] ?>"><img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" src="<?php echo 'uploaded products/' . $list['image'] ?>" data-holder-rendered="true">
              <img class="hover-img" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" src="<?php echo 'uploaded products/' . $list['image'] ?>" data-holder-rendered="true"></a>
            <div class="card-body" style="text-align: center;">
              <h5 class="card-title"><?php echo $list['name'] ?></h5>
              <p class="card-text">&#8377;<?php echo $list['mrp'] ?>/-</p>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>

<!-- BEST SELLER SECTION -->
  <div class="container my-3">
    <div class="row">
      <div class="heading">
        <h2>Best Seller</h2>
      </div>
      <br>
      <hr>
      <!-- <div class="htc__select__option">
        <select class="ht__select" onchange="sort_product_drop(<?php echo $cat_id ?>)" id="sort_product_id">
          <option value="">Default sorting</option>
          <option value="price_high">Sort by price low to high</option>
          <option value="price_low">Sort by price high to low </option>
          <option value="new">Sort by new first</option>
          <option value="old">Sort by old first</option>
        </select>
      </div> -->
      <br>
      <?php
      $get_product = get_product($con,'','','',"yes");
      foreach ($get_product as $list) {
      ?>
        <div class="col-md-4">
          <div class="card mb-4 box-shadow">
            <a href="users_product.php?id=<?php echo $list['id'] ?>"><img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" src="<?php echo 'uploaded products/' . $list['image'] ?>" data-holder-rendered="true">
              <img class="hover-img" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" src="<?php echo 'uploaded products/' . $list['image'] ?>" data-holder-rendered="true"></a>
            <div class="card-body" style="text-align: center;">
              <h5 class="card-title"><?php echo $list['name'] ?></h5>
              <p class="card-text">&#8377;<?php echo $list['mrp'] ?>/-</p>
              <a href="checkout.php" class="btn btn-primary product">Buy Now</a>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>

  <!-- The Main Javascript file -->
  <script src="js/main.js" async></script>
  <script src="js/jquery-3.2.1.min.js"></script>


</body>

</html>