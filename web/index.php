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
	</style>

</head>
<body>
<div id ="tong">
	<?php include 'menu.php' ?>
	<?php include 'products.php' ?>
	<?php include 'footer.php' ?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$(".cart").click(function(){
				let ID = $(this).data('id');
				$.ajax({
					url: 'add_to_cart.php',
					type : 'GET',
					data:{ID},
				})
				.done(function() {
					alert('Thanh cong');
					console.log("success");
				})
				.fail(function () {
					console.log("error");
				})
				.always(function(){
					console.log("complete");
				});
			});
		});
	</script>
</body>
</html>