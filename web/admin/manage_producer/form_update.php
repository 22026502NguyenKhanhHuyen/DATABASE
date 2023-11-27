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
	#if(empty($_GET['ID'])) {
	#	header ('location:index.php?error=Phải truyền mã để sửa');
	#}
require '../menu.php';
	require '../connect.php';
	$ID = $_GET['ID'];
	$sql ="select * from producer
	where ID='$ID'";
	$result = mysqli_query($connect,$sql);
	$each = mysqli_fetch_array($result);
?>
<form method="post" action="process_update.php" enctype="multipart/form-data">
	<input type="hidden" name="ID" value="<?php echo $each['ID']?>">
	Tên
	<input type="text" name="Name" value="<?php echo $each['Name']?>">
	<br>
	Ảnh mới
	<input type="file" name="Image_new" >
	<br>
	Ảnh cũ
	<img src="Image/<?php echo $each['Image'] ?>" height = '100'>
	<input type="hidden" name="Image_old" value="<?php echo $each['Image'] ?>">
	<br>
	<button>Sửa</button>
</form>
</body>
</html>