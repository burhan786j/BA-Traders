<?php
include 'connection.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <title>Customer Sign-up Form</title>
</head>

<body class="color">
  <div class="contact">
    <div class="row">
      <div class="col-md-9">
        <div>
          <form method="post" action="">
            <div class="form-floating mb-3">
              <label for="name">Set a Username</label>
              <input type="text" class="form-control rounded-4" id="name" placeholder="Enter Username" name="name">
              <span class="field_error" id="name_error"></span>
            </div>

            <div class="form-floating mb-3">
              <div>
                <label for="email">Email address</label>
                <input type="email" class="form-control rounded-4" id="email" placeholder="name@example.com" name="email">
              </div>
              <span class="field_error" id="email_error"></span>
            </div>

            <div class="form-floating mb-3">
              <label for="mobile">Enter Mobile No.</label>
              <input type="text" class="form-control rounded-4" id="mobile" placeholder="Your Mobile" name="mobile">
              <span class="field_error" id="mobile_error"></span>
            </div>

            <div class="form-floating mb-3">
              <label for="password">Set A Password</label>
              <input type="password" class="form-control rounded-4" id="password" placeholder="Password" name="password">
              <span class="field_error" id="password_error"></span>
            </div>
            <div class="text-center">
              <button class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" onclick="user_register()" type="button" name="register_submit">Sign up</button>
            </div>
            <hr class="my-4">
          </form>
          <div class="form-output register-msg">
            <p class="form-message "></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- signup Modal -->
  <!-- <div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="alert alert-success" role="alert">
      <strong> Success!</strong> Your Account Is Now Created.
    </div>
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="signupModalLabel">Sign Up For Free</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="modal-body p-5 pt-0">
            <form method="post" id="register-form">
              <div class="form-floating mb-3">
                <input type="text" class="form-control rounded-4" id="name" placeholder="Enter Username" name="name">
                <label for="name">Set a Username</label>
                <span class="field_error" id="name_error"></span>
              </div>

              <div class="form-floating mb-3">
                <input type="email" class="form-control rounded-4" id="email" placeholder="name@example.com" name="email">
                <label for="email">Email address</label>
                <span class="field_error" id="email_error"></span>
              </div>

              <div class="form-floating mb-3">
                <input type="text" class="form-control rounded-4" id="mobile" placeholder="Your Mobile" name="mobile">
                <label for="mobile">Enter Mobile No.</label>
                <span class="field_error" id="mobile_error"></span>
              </div>

              <div class="form-floating mb-3">
                <input type="password" class="form-control rounded-4" id="password" placeholder="Password" name="password">
                <label for="password">Set A Password</label>
                <span class="field_error" id="password_error"></span>
              </div>
              <button class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" onclick="user_register ()" type="submit" name="register_submit">Sign up</button>
              <small class="text-muted">By clicking Sign up, you agree to the terms of use.</small>
              <hr class="my-4">
            </form>
            <div class="form-output register-msg">
            <p class="form-message "></p>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div> -->
  <!-- Main js file that contents all jQuery plugins activation. -->
  <script src="js/main.js"></script>
  <script src="js/jquery-3.2.1.min.js"></script>
</body>

</html>