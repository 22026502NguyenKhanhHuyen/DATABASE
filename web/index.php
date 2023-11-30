<?php
session_start();
if(isset($_SESSION['error'])){
	echo $_SESSION['error'];
	unset($_SESSION['error']);
}
if (!empty($_GET['IDpro']))
	$ID = $_GET['IDpro'];
else
	$ID = 23;
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
	</style>
	<meta charset="UTF-8">
  <title></title>
  <link href="https://fonts.googleapis.com/css?family=Kanit:200,400" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
	<link rel="stylesheet" href="./style_sanpham.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/layout.css">
	<link rel="stylesheet" href="css/header.css">	
	<link rel="stylesheet" href="css/menu.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
		integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<?php include 'menu.php' ?>
	<?php include "products.php" ?>
	<?php include 'footer.php' ?>

</body>
</html>