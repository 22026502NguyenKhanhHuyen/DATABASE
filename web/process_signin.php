<?php

$Email = $_POST['Email'];
$Password = $_POST['Password'];
if(isset($_POST['remember'])) {
	$remember = true;
} else {
	$remember = false;
}

require 'admin/connect.php';
$sql = "select * from customers
where Email = '$Email' and Password = '$Password'";
$result = mysqli_query($connect,$sql);
$number_rows = mysqli_num_rows($result);

if($number_rows == 1) {
	echo "Đăng nhập thành công";
	session_start();
	$each = mysqli_fetch_array($result);
	$ID = $each['ID'];
	$_SESSION['ID'] = $each['ID'];
	$_SESSION['Name'] = $each['Name'];
	if($remember) {
		$token = uniqid('user_', true);
		$sql = "update customers
		set
		Token = '$token'
		where ID ='$ID'";
		mysqli_query($connect,$sql);
		setcookie('remember', $token, time() + 86400 * 30);
	}
} else {
header('location:signin.php?error=Đăng nhập sai rùi.');
}
