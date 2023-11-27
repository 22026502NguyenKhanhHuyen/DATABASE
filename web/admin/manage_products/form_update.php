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
    $ID = $_GET['ID'];
    require '../menu.php';
	require '../connect.php';
	$sql ="select * from products
	where ID = '$ID'";
	$result = mysqli_query($connect, $sql);
	$each = mysqli_fetch_array($result);

	$sql ="select * from producer";
	$producer = mysqli_query($connect, $sql);
	?>
	<form method="post" action="process_update.php" enctype="multipart/form-data">
		<input type="hidden" name="ID" value="<?php echo $each['ID']?>">
		Tên
		<input type="text" name="Name" value="<?php echo $each['Name'] ?>">
		<br>
		Ảnh mới
		<input type="file" name="Image_new" >
		<br>
		Ảnh cũ
		<img src="Image/<?php echo $each['Image'] ?>" height = '100'>
		<input type="hidden" name="Image_old" value="<?php echo $each['Image'] ?>">
		<br>
		Giá
		<input type="number" name="Price" value="<?php echo $each['Price'] ?>">
		<br>
		Mô tả
		<textarea name="Description"> <?php echo $each['Description'] ?>></textarea>

		<br>
		Dòng sản phẩm
		<select name="Producer_ID">
			<?php foreach ($producer as $producer1): ?>
				<option value="<?php echo $producer1['ID'] ?>"
					<?php if($each['Producer_ID'] == 
					$producer1['ID']) { ?> selected
				<?php } ?>
					>
					<?php echo $producer1['Name'] ?>
				</option>
			<?php endforeach ?>

		</select>
		<br>
		<button>Sửa</button>
	</form>
</body>
</html>