<!DOCTYPE html>
<html lang="en">

<head><meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/style.css">

    <title>BA Traders | The Best Shopping Website</title>
  
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a href="#">
        <img src="img/Logo/BA.LOGO.png" alt="Logo" style="height: 45px;">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse ml-auto" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item ">
            <a class="nav-link button" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link  button" aria-current="page" href="user_contact_us.php">Contact us</a>
          </li>
          <?php
          foreach ($cat_arr as $list) {
          ?>
            <li class="nav-item ">
              <a class="nav-link  button" href="users_categories.php?id=<?php echo $list['id'] ?>"><?php echo $list['categories'] ?>
              </a>
            </li>
          <?php
          }
          ?>
          <!-- <li class="nav-item ">
            <div class="dropdown">
              <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton2"
                data-bs-toggle="dropdown" aria-expanded="false">
                Categories:
              </button>
              <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                <li><a class="dropdown-item active" href="bathroom.php">Bathroom Accessories</a></li>
                <li><a class="dropdown-item" href="lightning.php">Lightnings</a></li>
                <li><a class="dropdown-item" href="hardware.php">Hardware Supplies</a></li>
              </ul>
            </div>
          </li> -->
        </ul>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item Cart button"><a class="nav-link" href="cart.php"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="20" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z" />
                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
              </svg><span class="htc__qua"><?php echo $totalProduct ?></span>
            </a>
          </li>

          <!-- <li class="dropdown">
            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1"
              data-bs-toggle="dropdown" aria-expanded="false">
              My Account
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="#">Login</a></li>
              <li><a class="dropdown-item" href="#">Sign up</a></li>
            </ul>
          </li> -->
          <!-- <li class="nav-item">
            <a class="nav-link" data-bs-toggle="modal" data-bs-target="#loginModal" href="#">Login</a>
          </li> -->
          <!-- <li class="nav-item">
            <a class="nav-link" data-bs-toggle="modal" data-bs-target="#signupModal" href="#">Resgister</a>
          </li> -->
          <li class="nav-item">
          <div class="dropdown">
          <img src="img/admin-img.jpeg" class="btn btn-light dropdown-toggle" alt="admin-img" data-bs-toggle="dropdown" role="button" id="dropdownMenuLink" aria-expanded="false"></img>

          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li><?php
            if (isset($_SESSION['USER_LOGIN'])) {
              echo '<a class="nav-link" href="logout.php">Logout</a> <a class="nav-link" href="my_order.php">My Order</a>';
            } else {
              echo '<a class="nav-link" href="RegisterLogin.php">Resgister/Login</a>';
            }
            ?></li>
            </ul>
          <li class="nav-item">
            <a class="nav-link" href="ADMIN_PANEL/admin_login.php">Admin Login</a>
          </li>
      </div>
    </div>
  </nav>

  <!-- The Main Javascript file -->
  <script src="js/main.js" async></script>
  <script src="js/jquery-3.2.1.min.js"></script>

</body>

</html>