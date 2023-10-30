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
	$sql ="select products.*, producer.Name as Producer_Name
	from products
	join producer on products.Producer_ID = producer.ID";
	$result = mysqli_query($connect, $sql);
	?>
<h1>Quản lý sản phẩm</h1>
<a href="form_insert.php">
	Thêm
</a>
<table width="100%">
	<tr>
		<th>Mã</th>
		<th>Tên</th>
		<th>Ảnh</th>
		<th>Giá</th>
		<th>Tên nhà sản xuất</th>
		<th>Sửa</th>
		<th>Xóa</th>
	</tr>
	<?php foreach ($result as $each): ?> 
		<tr>
			<td><?php echo $each['ID'] ?></td>
			<td><?php echo $each['Name'] ?></td>
			<td><img  height ="100" src="Image/<?php echo $each['Image'] ?>">
			</td>
			<td><?php echo $each['Price'] ?></td>
			<td><?php echo $each['Producer_Name'] ?></td>
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