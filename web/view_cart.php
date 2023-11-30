<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel='stylesheet' href='//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'><link rel="stylesheet" href="./style_login.css">
	<title></title>
	<style type="text/css">
		a {text-decoration:none}
	.btn-primary {
    color: #fff;
    background-color: #e51717;
    border-color: #ad0f0f
}
.btn-primary:hover,.btn-primary:focus,.btn-primary:active,.btn-primary.active,.open .dropdown-toggle.btn-primary {
    color: #fff;
    background-color: #d10e2c;
    border-color: #b50823
}
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
<h1>Shopping Cart</h1>
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
<?php
$ID = $_SESSION['ID'];
require 'admin/connect.php';
$sql = "select * from customers 
where ID = '$ID'";
$result = mysqli_query($connect,$sql);
$each = mysqli_fetch_array($result);
?>
<div class="wrapper">
    <form class="form-signin" method="post" action="process_checkout.php" >       
      <h2 class="form-signin-heading">Tổng tiền hóa đơn:
	<?php echo $sum ?></h2>
      <input type="text" class="form-control" name="Name_Receiver" value="<?php echo $each['Name'] ?>" placeholder="Người Nhận" required="" autofocus="" />
      <input type="text" class="form-control" name="Phone_Receiver" value="<?php echo $each['Phone_Number'] ?>" placeholder="Số điện thoại người nhận" required="" autofocus="" />
      <input type="text" class="form-control" name="Address_Receiver" value="<?php echo $each['Address'] ?>" placeholder="Địa chỉ người nhận" required="" autofocus="" />
      <button class="btn btn-lg btn-primary btn-block" type="submit">Đặt hàng</button>  
    </form>
  </div>
</body>
</html>
