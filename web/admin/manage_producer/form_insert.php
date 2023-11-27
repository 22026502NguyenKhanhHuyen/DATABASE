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
	<?php
	    require '../menu.php';
    ?>
<form method="post" action="process_insert.php" enctype="multipart/form-data">
	Tên
	<input type="text" name="Name">
	<br>
	Ảnh
	<input type="file" name="Image">
	<br>
	<button>Thêm</button>
</form>
</body>
</html>