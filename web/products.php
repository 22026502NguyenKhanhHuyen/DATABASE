<!DOCTYPE html>
<html lang="en" >

<body>


<?php
require 'admin/connect.php';
$sql = "";
if($ID != 23){
  $sql = "select * from products where producer_id = '$ID'";
}else {
  $sql = "select products.*, SUM(order_product.Quantity) as total
from products
join order_product on products.ID = order_product.Product_ID
join orders on order_product.Order_ID = orders.ID
where products.Combo = 1 and orders.Status = 3
GROUP BY products.ID
ORDER BY total desc
limit 3;";
}
$result = mysqli_query($connect, $sql);
?>


    

<div class='body'>
  <div class='container'>
    <?php foreach ($result as $each): ?>
    <div class='card'>
      <div class='card-content'>
        <div class='top-bar'>
          <span>
           <p><?php echo $each['Price']?></p>
          <!-- <span class='float-right lnr lnr-heart'>
          Đây là chỗ thả tim cho vào bst
          </span> -->
        </div>
        <div class='img'>
          <img src="admin/manage_products/Image/<?php echo $each['Image']?>">
        </div>
      </div>
      <div class='card-description'>
        <div class='title'>
          <?php echo $each['Name'] ?>
        </div>
        <?php if(!empty($_SESSION['ID'])) { ?> <div class='cart'>
          <a href="add_to_cart.php?ID=<?php echo $each['ID'] ?>&idproducer=<?php echo $ID ?>">
          <span class='lnr lnr-cart'>
          </span>
          </a>
        </div>
        <?php } else { ?>
        <div class='cart'>
          <span class='lnr lnr-cart'>
          </span>
          </a>
        </div>
        <?php } ?>
      </div>
      <div class='card-footer'>
        <div class='span'>
          <?php if($each['Status']==1) {
            echo "Còn hàng";
          }elseif($each['Status']==0){
            echo "Hết hàng";
          }
          ?>
      

        </div>
        <div class='span'>
        <?php if($each['Producer_ID']==15) {
          ?>
          
          Gà Giòn Vui Vẻ
        
        
        <?php 
          }elseif($each['Producer_ID']==16) {
          ?>
          <a href="myysotbobam.php">
          Mỳ Ý Sốt Bò Bằm
        </a>
        <?php 
          }elseif($each['Producer_ID']==18) {
          ?>
          <a href="gasotcay.php">
          Gà Sốt Cay
        </a>
        <?php 
          }elseif($each['Producer_ID']==19) {
          ?>
          <a href="burger.php">
          Burger
        </a>
        <?php 
          }elseif($each['Producer_ID']==20) {
          ?>
          <a href="phananphu.php">
          Phần Ăn Phụ
        </a>
        <?php 
          }elseif($each['Producer_ID']==21) {
          ?>
          <a href="monttrangmieng.php">
          Món Tráng Miệng
        </a>
        <?php 
          }elseif($each['Producer_ID']==22) {
          ?>
          <a href="thucuong.php">
          Thức Uống
        </a>
      <?php } ?>
        </div>
      </div>
    </div>
    <?php endforeach ?>
  </div>
</div>
<!-- partial -->


  
</body>
</html>

