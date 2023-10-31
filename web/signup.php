<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<?php
session_start();
if(isset($_SESSION['error'])){
	echo $_SESSION['error'];
	unset($_SESSION['error']);
}
?>

<form method="post" action="process_signup.php">
	<h1>Form đăng ký</h1>
	Tên
	<input type="text" name="Name">
	<br>
	Email
	<input type="email" name="Email">
	<br>
	Mật khẩu
	<input type="password" name="Password">
	<br>
	Số điện thoại
	<input type="text" name="Phone_Number">
	<br>
	Địa chỉ
	<input type="text" name="Address">
	<br>
	<button>Đăng ký</button>
</form>
</body>
</html>