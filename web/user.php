<?php 
session_start(); 
if(empty($_SESSION['ID'])) {
	header('location:signin.php?error=Đăng nhập đi bạn');
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
Đây là trang người dùng. Xin chào bạn
<?php
echo $_SESSION['Name'] ?>

<a href="signout.php">
	Bay mất tiu òi.
</a>
</body>
</html>
