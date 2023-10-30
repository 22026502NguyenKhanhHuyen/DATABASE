<style type="text/css">
	.tung_san_pham{
		width: 33%;
		border: 1 px solid black;
		height: 250px;
		float: left;
	}
</style>
<?php
require 'admin/connect.php';
$sql = "select * from products";
$result = mysqli_query($connect, $sql);
?>
<div id = 'giua'>
	<?php foreach ($result as $each): ?>
		<div class="tung_san_pham">
			<h1>
				<?php echo $each['Name'] ?>
			</h1>
			<img src="admin/manage_products/Image/<?php echo $each['Image']?>" height = '100'>
			<p><?php echo $each['Price']?>$</p>
			<a href="product.php?ID=<?php echo $each['ID'] ?>">
				Xem chi tiết >>>
			</a>
		</div>
	<?php endforeach ?>
</div>