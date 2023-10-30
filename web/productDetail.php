<style type="text/css">
</style>
<?php
$ID = $_GET['ID'];
	require 'admin/connect.php';
	$sql ="select * from products
	where ID = '$ID'";
	$result = mysqli_query($connect, $sql);
	$each = mysqli_fetch_array($result);
?>
<div id = 'giua'>
			<h1>
				<?php echo $each['Name'] ?>
			</h1>
			<img src="admin/manage_products/Image/<?php echo $each['Image']?>" height = '100'>
			<p><?php echo $each['Price']?>$</p>
			<p><?php echo $each['Description']?></p>
</div>