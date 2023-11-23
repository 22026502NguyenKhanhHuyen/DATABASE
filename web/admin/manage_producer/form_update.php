<?php
require '../check_admin_login.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<?php
	if(empty($_GET['ID'])) {
		header ('location:index.php?error=Phải truyền mã để sửa');
	}
	$ID = $_GET['ID'];
	include '../menu.php';
	require '../connect.php';
	$sql ="select * from producer
	where ID='$ID'";
	$result = mysqli_query($connect,$sql);
	$each = mysqli_fetch_array($result);
?>
<form method="post" action="process_update.php">
	<input type="hidden" name="ID" value="<?php echo $each['ID']?>">
	Tên
	<input type="text" name="Name" value="<?php echo $each['Name']?>">
	<br>
	Địa chỉ
	<textarea name="Address"><?php echo $each['Address']?></textarea>
	<br>
	Điện thoại
	<input type="text" name="Phone" value="<?php echo $each['Phone']?>">
	<br>
	Ảnh
	<input type="text" name="Image" value="<?php echo $each['Image']?>">
	<br>
	<button>Sửa</button>
</form>
</body>
</html>