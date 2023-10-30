<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
Khu vực quản lí nhà sản xuất
<a href="form_insert.php">
	Thêm
</a>
<?php
include '../menu.php';
?>
<?php
require '../connect.php';
$sql = "select * from producer";
$result = mysqli_query($connect,$sql);
?>
<table width="100%">
	<tr>
		<th>Mã</th>
		<th>Tên</th>
		<th>Địa chỉ</th>
		<th>Điện thoại</th>
		<th>Ảnh</th>
		<th>Sửa</th>
		<th>Xóa</th>
	</tr>
	<?php foreach($result as $each): ?>
		<tr>
			<td><?php echo $each['ID'] ?></td>
			<td><?php echo $each['Name'] ?></td>
			<td><?php echo $each['Address'] ?></td>
			<td><?php echo $each['Phone'] ?></td>
			<td><img  height ="100" src="<?php echo $each['Image'] ?>"></td>
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