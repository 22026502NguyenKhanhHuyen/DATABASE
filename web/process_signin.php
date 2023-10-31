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
session_start();
if($number_rows == 1) {
	#echo "Đăng nhập thành công";
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
	header('location:index.php');
} else {
	$_SESSION['error'] = 'Đăng nhập sai mất tiu rùi.';
    header('location:signin.php');
}
