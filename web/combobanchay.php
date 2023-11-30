<?php 
session_start();
if(isset($_SESSION['error'])){
	echo $_SESSION['error'];
	unset($_SESSION['error']);
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		#tong{
			width: 100%;
			height: 700px;
		}
		#tren{
			width: 100%;
			height: 20%;
		}
		#giua{
			width: 100%;
			height: 70%;
		}
		#duoi{
			width: 100%;
			height: 10%;
		}
		a {
			text-decoration: none;
		}
	</style>

</head>
<body>
<div id ="tong">
	<?php include 'menu.php' ?>
	<?php include 'combo.php' ?>
	<?php include 'footer.php' ?>
</div>
</body>
</html>