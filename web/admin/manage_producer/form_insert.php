<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<?php
	    include '../menu.php';
    ?>
<form method="post" action="process_insert.php" enctype="multipart/form-data">
	Tên
	<input type="text" name="Name">
	<br>
	Địa chỉ
	<textarea name="Address"></textarea>
	<br>
	Điện thoại
	<input type="text" name="Phone">
	<br>
	Ảnh
	<input type="file" name="Image">
	<br>
	<button>Thêm</button>
</form>
</body>
</html>