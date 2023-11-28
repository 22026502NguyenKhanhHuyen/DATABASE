<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel='stylesheet' href='//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'><link rel="stylesheet" href="./style_login.css"><link rel='stylesheet' href='./styleProduct.css'>
	<title></title>
	<style type="text/css">
		a {text-decoration:none}
	.btn-primary {
    color: #fff;
    background-color: #e51717;
    border-color: #ad0f0f
}
.btn-primary:hover,.btn-primary:focus,.btn-primary:active,.btn-primary.active,.open .dropdown-toggle.btn-primary {
    color: #fff;
    background-color: #d10e2c;
    border-color: #b50823
}
	</style>
</head>
<body>
<?php
session_start();
if(empty($_SESSION['Cart'])){
	$_SESSION['error'] = 'Hãy chọn sản phẩm.';
	header('location:index.php');
}
$Cart = $_SESSION['Cart'];
$sum = 0;
?>
<table width="100%" style="margin:30px;">
	<tr>
		<th>Ảnh</th>
		<th>Tên sản phẩm</th>
		<th>Giá</th>
		<th>Số lượng</th>
		<th>Tổng tiền</th>
		<th>Xóa</th>
	</tr>
	<?php foreach($Cart as $ID => $each): ?>
		<tr>
				<td class="product-image">
					<img height = '100' src = <?php echo "admin/manage_products/Image/" .
				$each['Image'] ?>>
				</td>
				<td class="product-details">
					<p class="product-description"><?php echo $each['Name'] ?></p>
				</td>
				<td class="product-price"><?php echo $each['Price'] ?></td>
				<td class="product-quantity">
					<input style="width: 50px;" type="number" value=<?php echo $each['Quantity'] ?> min="1">
				</td>
				<td class="product-line-price">
					<?php
						$result =  $each['Quantity']*$each['Price'] ;
						$sum += $result;
						echo $result;
					?>
				</td>
				<td class="product-removal">
					<button class="remove-product">
					Remove
					</button>
				</td>
		</tr>
		<!-- <tr> 
			<td><img height = '100' src ="admin/manage_products/Image/<?php echo
			$each['Image'] ?>">
			</td>
			<td><?php echo $each['Name'] ?></td>
			<td><?php echo $each['Price'] ?></td>
			<td>
				<a href="update_quantity_in_cart.php?ID=<?php echo $ID ?>&type=decre">
					-
				</a>
				<?php echo $each['Quantity'] ?>
				<a href="update_quantity_in_cart.php?ID=<?php echo $ID ?>&type=incre">
					+
				</a>
			</td>
			<td>
				<?php
				$result =  $each['Quantity']*$each['Price'] ;
				$sum += $result;
				echo $result;

				?>
			</td>
			<td>
				<a href="delete_from_cart.php?ID=<?php echo $ID ?>">
					Xóa
				</a>
			</td>
		</tr> -->
	<?php endforeach ?>
</table>
<?php
$ID = $_SESSION['ID'];
require 'admin/connect.php';
$sql = "select * from customers 
where ID = '$ID'";
$result = mysqli_query($connect,$sql);
$each = mysqli_fetch_array($result);
?>
<td class="wrapper">
    <form class="form-signin" method="post" action="process_checkout.php" >       
      <h2 class="form-signin-heading">Tổng tiền hóa đơn:
	<?php echo $sum ?></h2>
      <input type="text" class="form-control" name="Name_Receiver" value="<?php echo $each['Name'] ?>" placeholder="Người Nhận" required="" autofocus="" />
      <input type="text" class="form-control" name="Phone_Receiver" value="<?php echo $each['Phone_Number'] ?>" placeholder="Số điện thoại người nhận" required="" autofocus="" />
      <input type="text" class="form-control" name="Address_Receiver" value="<?php echo $each['Address'] ?>" placeholder="Địa chỉ người nhận" required="" autofocus="" />
      <button class="btn btn-lg btn-primary btn-block" type="submit">Đặt hàng</button>  
    </form>
  </td>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
 <script type="text/javascript">
 	
 </script>
 <script>
	/* Set rates + misc */
var taxRate = 0.05;
var shippingRate = 15.00; 
var fadeTime = 300;


/* Assign actions */
$('.product-quantity input').change( function() {
  updateQuantity(this);
});

$('.product-removal button').click( function() {
  removeItem(this);
});


/* Recalculate cart */
function recalculateCart()
{
  var subtotal = 0;
  
  /* Sum up row totals */
  $('.product').each(function () {
    subtotal += parseFloat($(this).children('.product-line-price').text());
  });
  
  /* Calculate totals */
  var tax = subtotal * taxRate;
  var shipping = (subtotal > 0 ? shippingRate : 0);
  var total = subtotal + tax + shipping;
  
  /* Update totals display */
  $('.totals-value').fadeOut(fadeTime, function() {
    $('#cart-subtotal').html(subtotal.toFixed(2));
    $('#cart-tax').html(tax.toFixed(2));
    $('#cart-shipping').html(shipping.toFixed(2));
    $('#cart-total').html(total.toFixed(2));
    if(total == 0){
      $('.checkout').fadeOut(fadeTime);
    }else{
      $('.checkout').fadeIn(fadeTime);
    }
    $('.totals-value').fadeIn(fadeTime);
  });
}


/* Update quantity */
function updateQuantity(quantityInput)
{
  /* Calculate line price */
  var productRow = $(quantityInput).parent().parent();
  var price = parseFloat(productRow.children('.product-price').text());
  var quantity = $(quantityInput).val();
  var linePrice = price * quantity;
  
  /* Update line price display and recalc cart totals */
  productRow.children('.product-line-price').each(function () {
    $(this).fadeOut(fadeTime, function() {
      $(this).text(linePrice.toFixed(2));
      recalculateCart();
      $(this).fadeIn(fadeTime);
    });
  });  
}


/* Remove item from cart */
function removeItem(removeButton)
{
  /* Remove row from DOM and recalc cart total */
  var productRow = $(removeButton).parent().parent();
  productRow.slideUp(fadeTime, function() {
    productRow.remove();
    recalculateCart();
  });
}
 </script>
</body>
</html>
