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
$sql = "select * from producer";
$result = mysqli_query($connect, $sql);
	?>
<h1>Khu vực quản lí nhà sản xuất</h1>
<a href="form_insert.php">
	Thêm
</a>
<table width="100%">
	<tr>
		<th>Mã</th>
		<th>Tên</th>
		<th>Ảnh</th>
		<th>Sửa</th>
		<th>Xóa</th>
	</tr>
	<?php foreach($result as $each): ?>
		<tr>
			<td><?php echo $each['ID'] ?></td>
			<td><?php echo $each['Name'] ?></td>
			<td>
				<img  height ="100" src="Image/<?php echo $each['Image'] ?>">
			</td>
			<td>
				<a href="form_update.php?ID=<?php echo $each['ID']?>">
				Sửa
			</td>
			<td>
				<a href="delete.php?ID=<?php echo $each['ID']?>">
				Xóa
			</td>
		</tr>
	<?php endforeach ?>
</table>
</body>
</html>