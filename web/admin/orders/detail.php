<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<?php
$Order_ID = $_GET['id'];
require '../connect.php';
$sql = "select * from order_product
join products on products.ID = order_product.Product_ID
where Order_ID = '$Order_ID'";
$result = mysqli_query($connect,$sql);
$sum = 0;
?>
<table width="100%">
	<tr>
		<th>Ảnh</th>
		<th>Tên sản phẩm</th>
		<th>Chi tiết</th>
		<th>Giá</th>
		<th>Số lượng</th>
		<th>Tổng tiền</th>
	</tr>
	<?php foreach($result as $ID => $each): ?>
		<tr>
			<td><img height = '100' src ="../manage_products/Image/<?php echo
			$each['Image'] ?>">
			</td>
			<td><?php echo $each['Name'] ?></td>
			<td><?php echo $each['Description'] ?></td>
			<td><?php echo $each['Price'] ?></td>
			<td><?php echo $each['Quantity'] ?></td>
			<td>
				<?php
				$result =  $each['Quantity']*$each['Price'] ;
				$sum += $result;
				echo $result;
				?>
			</td>
		</tr>
	<?php endforeach ?>
</table>
<h1>
	Tổng tiền đơn hàng <?php echo $sum ?>
</h1>
</body>
</html>