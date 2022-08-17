<?php
require('connection.inc.php');
require('functions.inc.php');
$name=get_safe_value($con,$_POST['name']);
$password=get_safe_value($con,$_POST['password']);

$res=mysqli_query($con,"select * from users where name='$name' and password='$password'");
$check_user=mysqli_num_rows($res);
if($check_user>0){
	$row=mysqli_fetch_assoc($res);
	$_SESSION['USER_LOGIN']='yes';
	$_SESSION['USER_ID']=$row['id'];
	$_SESSION['USER_NAME']=$row['name'];
	echo "valid";
}else{
	echo "wrong";
}
?>