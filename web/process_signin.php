<?php

$Email = $_POST['Email'];
$Password = $_POST['Password'];

require 'admin/connect.php';
$sql = "select * from customers
where Email = '$Email' and Password = '$Password'";
$result = mysqli_query($connect,$sql);
$number_rows = mysqli_num_rows($result);

if($number_rows == 1) {
	session_start();
	$each = mysqli_fetch_array($result);
	$_SESSION['ID'] = $each['ID'];
	$_SESSION['Name'] = $each['Name'];

	header('location:user.php');
	exit;
}

header('location:signin.php?error=Đăng nhập sai rùi.');