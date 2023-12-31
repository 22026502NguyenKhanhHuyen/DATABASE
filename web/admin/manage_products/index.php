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
		<th>Mô tả</th>
		<th>Giá</th>
		<th>Dòng sản phẩm</th>
		<th>Tình trạng</th>
		<th>Sửa</th>
		<th>Xóa</th>
	</tr>
	<?php foreach ($result as $each): ?> 
		<tr>
			<td><?php echo $each['ID'] ?></td>
			<td align="center"><?php echo $each['Name'] ?></td>
			<td>
				<img  height ="100" src="Image/<?php echo $each['Image'] ?>">
			</td>
			<td align="center"><?php echo $each['Description']?></td>
			<td><?php echo $each['Price'] ?></td>
			<td><?php echo $each['Producer_Name'] ?>
			</td>
			<th>
				<?php if($each['Status']==1){
					echo "Còn hàng";
				} else {
					echo "Hết hàng";
				}?>
			</th>
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