<ul>
	<li>
		<a href="../manage_producer">
			Quản lý loại sản phẩm
		</a>
	</li>
	<li>
		<a href="../manage_products">
			Quản lý sản phẩm
		</a>
	</li>
	<li>
		<a href="../orders">
			Quản lý đơn hàng
		</a>
	</li>
	<li>
		<a href="../root/doanh_thu_7_ngay.php">
			Thống kê doanh thu 7 ngày gần nhất
		</a>
	</li>
	<li>
		<a href="../root/index2.php">
			Thống kê số lượng từng sản phẩm đã bán trong 7 ngày
		</a>
	</li>
</ul>
<?php
	    if(isset($_GET['error'])){
	?>
              <span style="color:red">
              	<?php echo $_GET['error']?>              	
              </span>
    <?php
	    }
    ?>

<?php
	    if(isset($_GET['success'])){
	?>
              <span style="color:green">
              	<?php echo $_GET['success']?>              	
              </span>
    <?php
	    }
    ?>