<?php
session_start();
if(isset($_COOKIE['remember'])) {
	$token = $_COOKIE['remember'];
	require 'admin/connect.php';
	$sql = "select * from customers
	where Token = '$token'
	limit 1";
	$result = mysqli_query($connect,$sql);
	$number_rows = mysqli_num_rows($result);
	$each = mysqli_fetch_array($result);
	if($number_rows == 1) {
	$_SESSION['ID'] = $each['ID'];
	$_SESSION['Name'] = $each['Name'];
    }
}
if(isset($_SESSION['ID'])) {
	header('location:user.php');
	exit;
} 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<form method="post" action="process_signin.php">
	<h1>Đăng Nhập</h1>
	Email
	<input type="email" name="Email">
	<br>
	Mật khẩu
	<input type="password" name="Password">
	<br>
	Ghi nhớ đăng nhập
	<input type="checkbox" name="remember">
	<br>
	<button>Đăng nhập</button>
</form>
</body>
</html>