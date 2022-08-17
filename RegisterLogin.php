<!DOCTYPE html>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"> 
    <!-- <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> -->
    <link rel="shortcut icon" href="favicon_io/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="#">
    <link rel="stylesheet" href="css/style.css">
    <title>BA Traders | The Best Shopping Website</title>
</head>

<body>
    
    <?php
    require 'nav.php'
    ?>

    <!-- Login page -->
    <div class="container reg-container">
        <input type="checkbox" id="flip">
        <div class="cover">
        </div>
        <div class="forms">
            
            <div class="form-content">
                <div class="login-form">
                    <div class="title">Login</div>
                    <form action="#">
                        <div class="input-boxes">
                            <div class="input-box">
                                <i class="fas fa-user"></i>
                                <input type="text" id="login_name" name="login_name" placeholder="Username" required>
                            </div>
                            <span class="field_error" id="login_name_error"></span>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" id="login_password" name="login_password" placeholder="Enter your password" required>
                                 <i class="fa-regular fa-eye " id="eye" onclick="togglee()"></i>
                                 
                                <script>
                                    var state=1 
                                    var state=false;
                                    function togglee(){
                                        if(state){
                                            document.getElementById("login_password").setAttribute("type","password");
                                            state=false;
                                        }
                                        else{
                                            document.getElementById("login_password").setAttribute("type","text");
                                            state=true;
                                        }
                                    }
                                </script>
                            </div>
                            <span class="field_error" id="login_password_error"></span>
                            <div class="button input-box">
                                <input type="submit" value="Login" onclick="user_login()">
                            </div>
                            <div class="text sign-up-text">Don't have an account? <label for="flip">Sigup now</label></div>
                        </div>
                        <hr class="my-4">
                    </form>
                    <div class="form-output login-msg">
                        <p class="form-message field_error"></p>
                    </div>
                </div>

                <!-- Sign up page -->
                <div class="signup-form">
                    <div class="title">Signup</div>
                    <form action="#">
                        <div class="input-boxes">
                            <div class="input-box">
                                <i class="fas fa-user"></i>
                                <input type="text" id="name" name="name" placeholder="Username" required>
                            </div>
                            <span class="field_error" id="name_error"></span>
                            <div class="input-box">
                                <i class="fas fa-envelope"></i>
                                <input type="text" id="email" name="email"  placeholder="Enter your email" style="width:45%">

                                <button type=button class="btn btn-primary email_sent_otp" onclick="email_sent_otp()">Send OTP</button>

                                <input type="text" id="email_otp" placeholder="OTP" style="width:45%" class="email_verify_otp" required>
                                 
                                <button type=button class="btn btn-primary email_verify_otp" onclick="email_verify_otp()">Verify OTP</button>
                                
                                <span id="email_otp_result"></span>

                            </div>
                            <span class="field_error" id="email_error"></span>
                            <div class="input-box">
                                <i class="fas fa-mobile"></i>
                                <input type="text" id="mobile" name="mobile" placeholder="Enter your mobile" required>
                            </div>
                            <span class="field_error" id="mobile_error"></span>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" class="password" id="password" name="password" placeholder="Enter your password" required>
                                 <i class="fa-regular fa-eye visibility" id="eye" onclick="toggle()"></i>
                                
                                <script>
                                    
                                    var state=false;
                                    function toggle(){
                                        if(state){
                                            document.getElementById("password").setAttribute("type","password");
                                            state=false;
                                        }
                                        else{
                                            document.getElementById("password").setAttribute("type","text");
                                            state=true;
                                        }
                                    }
                                </script>
                            </div>
                            <span class="field_error" id="password_error"></span>
                            <div class="button input-box">
                                <input type="submit" value="Sign up" onclick="user_register()">
                            </div>
                            <div class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>
                        </div>
                    </form>
                    <div class="form-output register-msg">
                        <p class="form-message "></p>
                    </div>
                </div>
            </div>
     </div>
    </div>
    <input type="hidden" id="is_email_verified"/>
    <script>
       function email_sent_otp(){
			jQuery('#email_error').html('');
			var email=jQuery('#email').val();
			if(email==''){
				jQuery('#email_error').html('Please enter email id');
			}else{
				jQuery('.email_sent_otp').attr('disabled',true);
				jQuery('.email_verify_otp').show();
				jQuery('.email_sent_otp').html('Please wait..');
				jQuery.ajax({
					url:'send_otp.php',
					type:'post',
					data:'email='+email+'&type=email',
					success:function(result){
						if(result=='done'){
							jQuery('#email').attr('disabled',true);
							jQuery('.email_verify_otp').show();
							jQuery('.email_sent_otp').hide();
							
						}else if(result=='email_present'){
							jQuery('.email_sent_otp').html('Send OTP');
							jQuery('.email_sent_otp').attr('disabled',false);
							jQuery('#email_error').html('Email id already exists');
						}else{
							jQuery('.email_sent_otp').html('Send OTP');
						}
					}
				});
			}
		}
        function email_verify_otp(){
			jQuery('#email_error').html('');
			var email_otp=jQuery('#email_otp').val();
			if(email_otp==''){
				jQuery('#email_error').html('Please enter OTP');
			}else{
				jQuery.ajax({
					url:'check_otp.php',
					type:'post',
					data:'otp='+email_otp+'&type=email',
					success:function(result){
						if(result=='done'){
							jQuery('.email_verify_otp').hide();
							jQuery('#email_otp_result').html('Email id verified');
							jQuery('#is_email_verified').val('1');
							if(jQuery('#is_mobile_verified').val()==1){
								jQuery('#btn_register').attr('disabled',false);
							}
						}else{
							jQuery('#email_error').html('Please enter valid OTP');
						}
					}
					
				});
			}
		}
    </script>
    <script src="js/main.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
</body>

</html> 