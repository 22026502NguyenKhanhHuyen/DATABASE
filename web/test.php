<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	Chọn thời gian
	<input type="date" value="<?php echo date('Y-m-d')?>">
	<input type="week">
	<input type="month">
	<select>
		<?php for($i=date('Y');$i >= 2020;$i--) {?>
		<option>
			<?php echo $i ?>
		</option>
	<?php } ?>
	</select>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			
		});
	</script>
</body>
</html>