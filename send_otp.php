<?php
require('connection.inc.php');
require('functions.inc.php');
$type=get_safe_value($con,$_POST['type']);

if($type == 'email'){
 $email=get_safe_value($con,$_POST['email']);
 $otp = rand(1111,9999);
 $_SESSION['EMAIL_OTP']=$otp;
 $html="$otp is your OTP";

 include('smtp/PHPMailerAutoload.php');
// echo smtp_mailer('adnanmoris127@gmail.com','subject',$html);
	$mail = new PHPMailer(true); 
	$mail->SMTPDebug= 3;
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = "tls"; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "batraders78@gmail.com";
	$mail->Password = 'assimpleasuthink';
	$mail->SetFrom("batraders78@gmail.com");
	$mail->Subject = "New OTP for your email verification";
	$mail->Body =$html;
	$mail->addAddress("batraders78@gmail.com");
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if($mail->Send()){
		echo "mail sent";
	}else{
		echo "Error Occured";
	}
}
?>