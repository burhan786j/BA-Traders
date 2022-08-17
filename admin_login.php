<?php
require('connection.inc.php');
require('functions.inc.php');

$msg = '';
if (isset($_POST['submit'])) {
   $username = get_safe_value($con, $_POST['username']);
   $password = get_safe_value($con, $_POST['password']);
   $sql = "SELECT * FROM `admin_users` WHERE username='$username' and password='$password'";
   $res = mysqli_query($con, $sql);
   $count = mysqli_num_rows($res);
   if ($count > 0) {
      $_SESSION['ADMIN_LOGIN'] = 'yes';
      $_SESSION['ADMIN_USERNAME'] = $username;
      header('location:admin_categories.php');
      die();
   } else {
      $msg = "please enter a  correct username or password";
   }
}
?>

<!doctype html>
<html class="no-js" lang="">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Login Page</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- <link rel="stylesheet" href="assets/css/normalize.css">
   <link rel="stylesheet" href="assets/css/bootstrap.min.css">
   <link rel="stylesheet" href="assets/css/font-awesome.min.css">
   <link rel="stylesheet" href="assets/css/themify-icons.css">
   <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">
   <link rel="stylesheet" href="assets/css/flag-icon.min.css">
   <link rel="stylesheet" href="assets/css/cs-skin-elastic.css"> -->
   <link rel="stylesheet" href="admin.css">
   <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>
<style>
   .field_error {
      color: red;
      margin-top: 15px;
   }
</style>

<body class="bg-dark">
   <div class="sufee-login d-flex align-content-center flex-wrap">
         <div class="container md-5">
            <div class="myform">
               <form method="post" action="">
               <h2>ADMIN LOGIN</h2>
               <input type="text" name="username" class="form-control" placeholder="Admin Name" required>
               <input type="password" name="password" class="form-control" placeholder="Password" required>
               <button type="submit" name="submit">LOGIN</button>
               </form>
            </div>
            <div class="image">
               <img src="../img/Logo/BA.LOGO.png"><br>
               <p class="text"> BA TRADERS</p>
            </div>
            <div class="field_error"><?php echo $msg ?></div>
      </div>

   </div>
   <script src="assets/js/vendor/jquery-2.1.4.min.js" type="text/javascript"></script>
   <script src="assets/js/popper.min.js" type="text/javascript"></script>
   <script src="assets/js/plugins.js" type="text/javascript"></script>
   <script src="assets/js/main.js" type="text/javascript"></script>
</body>

</html>