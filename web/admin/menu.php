<ul>
	<li>
		<a href="../manage_producer">
			Quản lý nhà sản xuất
		</a>
	</li>
	<li>
		<a href="../manage_products">
			Quản lý sản phẩm
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