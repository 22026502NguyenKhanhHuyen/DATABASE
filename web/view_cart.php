<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		a {text-decoration:none}
	</style>
</head>
<body>
<?php
session_start();
if(empty($_SESSION['Cart'])){
	$_SESSION['error'] = 'Hãy chọn sản phẩm.';
	header('location:index.php');
}
$Cart = $_SESSION['Cart'];
$sum = 0;
?>
<table width="100%">
	<tr>
		<th>Ảnh</th>
		<th>Tên sản phẩm</th>
		<th>Giá</th>
		<th>Số lượng</th>
		<th>Tổng tiền</th>
		<th>Xóa</th>
	</tr>
	<?php foreach($Cart as $ID => $each): ?>
		<tr>
			<td><img height = '100' src ="admin/manage_products/Image/<?php echo
			$each['Image'] ?>">
			</td>
			<td><?php echo $each['Name'] ?></td>
			<td><?php echo $each['Price'] ?></td>
			<td>
				<a href="update_quantity_in_cart.php?ID=<?php echo $ID ?>&type=decre">
					-
				</a>
				<?php echo $each['Quantity'] ?>
				<a href="update_quantity_in_cart.php?ID=<?php echo $ID ?>&type=incre">
					+
				</a>
			</td>
			<td>
				<?php
				$result =  $each['Quantity']*$each['Price'] ;
				$sum += $result;
				echo $result;

				?>
			</td>
			<td>
				<a href="delete_from_cart.php?ID=<?php echo $ID ?>">
					Xóa
				</a>
			</td>
		</tr>
	<?php endforeach ?>
</table>
<h1>
	Tổng tiền hóa đơn:
	$<?php echo $sum ?>
</h1>
<?php
$ID = $_SESSION['ID'];
require 'admin/connect.php';
$sql = "select * from customers 
where ID = '$ID'";
$result = mysqli_query($connect,$sql);
$each = mysqli_fetch_array($result);
?>

<form method="post" action="process_checkout.php">
	Tên người nhận
	<input type="text" name="Name_Receiver" value="<?php echo $each['Name'] ?>">
	<br>
	Số điện thoại người nhận
	<input type="text" name="Phone_Receiver" value="<?php echo $each['Phone_Number'] ?>">
	<br>
	Địa chỉ người nhận
	<input type="text" name="Address_Receiver" value="<?php echo $each['Address'] ?>">
	<br>
	<button>Đặt hàng</button>
</form>
</body>
</html>
