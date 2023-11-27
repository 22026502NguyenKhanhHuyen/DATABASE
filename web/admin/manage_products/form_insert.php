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
    <?php require '../menu.php';
	require '../connect.php';
	$sql ="select * from producer";
	$result = mysqli_query($connect, $sql);
	?>
	<form method="post" action="process_insert.php" enctype="multipart/form-data">
		Tên
		<input type="text" name="Name">
		<br>
		Ảnh
		<input type="file" name="Image">
		<br>
		Giá
		<input type="number" name="Price">
		<br>
		Mô tả
		<textarea name="Description"></textarea>
		<br>
		Combo
	<input type="checkbox" name="combo">
	<br>
		Dòng sản phẩm
		<select name="Producer_ID">
			<?php foreach ($result as $each): ?>
				<option value="<?php echo $each['ID'] ?>">
					<?php echo $each['Name'] ?>
				</option>
			<?php endforeach ?>

		</select>
		<br>
		<button>Thêm</button>
	</form>
</body>
</html>