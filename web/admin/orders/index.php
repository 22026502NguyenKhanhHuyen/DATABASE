<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
	</title>
</head>
<body>
<?php
require '../menu.php';
require '../connect.php';
$sql = "select orders.* ,customers.Name, customers.Phone_Number, customers.Address
from orders
join customers
on customers.id = orders.customer_id
order by Status asc";
$result = mysqli_query($connect,$sql);
#1:41:44
?>
<table width="100%">
	<tr>
		<th>Mã</th>
		<th>Thời gian đặt</th>
		<th>Thông tin người nhận</th>
		<th>Thông tin người đặt</th>
		<th>Trạng thái</th>
		<th>Tổng tiền</th>
		<th>Xem</th>
		<th>Sửa</th>
	</tr>
	<?php foreach ($result as $each):?>
		<tr>
			<td><?php echo $each['ID']?></td>
			<td><?php echo $each['Ordered_Date']?></td>
			<td>
				<?php echo $each['Name_Receiver']?><br>
				<?php echo $each['Phone_Receiver']?><br>
				<?php echo $each['Address_Receiver']?><br>
			</td>
			<td>
				<?php echo $each['Name']?><br>
				<?php echo $each['Phone_Number']?><br>
				<?php echo $each['Address']?><br>
			</td>
			<td>
				<?php
				    if($each['Status'] == 0) {
				    	echo "Đang chờ xét duyệt";
				    }elseif($each['Status'] == 1) {
				    	echo "Đã duyệt";
				    }elseif($each['Status'] == 2) {
				    	echo "Đã hủy";
				    }elseif($each['Status'] == 3) {
				    	echo "Đã giao";
				    }
				?>
			</td>
			<td>
				<?php echo $each['Total_Price']?>
			</td>
			<td>
				<a href="detail.php?id=<?php echo $each['ID']?>">
					Xem
			</td>
		<?php if($each['Status'] == 0) { ?>
			<td>
				<a href="update.php?id=<?php echo $each['ID']?>&status=1">
				    Duyệt
			    </a>
			    <br>
			    <a href="update.php?id=<?php echo $each['ID']?>&status=2">
				    Hủy
			    </a>
			</td>
	    <?php }?>
		<?php if($each['Status'] == 1) { ?>
			<td>
			    <a href="update.php?id=<?php echo $each['ID']?>&status=3">
				    Đã giao
			    </a>
			</td>
		<?php }?>
		<?php if($each['Status'] == 2) { ?>
			<td>
			   Đơn hàng đã hủy
			</td>
		<?php }?>
		<?php if($each['Status'] == 3) { ?>
			<td>
			    Hoàn thành
			</td>
		<?php }?>
		</tr>
	<?php endforeach ?>
</table>
</body>
</html>