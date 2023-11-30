<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title></title>
  <link href="https://fonts.googleapis.com/css?family=Kanit:200,400" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="./style_sanpham.css">
</head>
<body>
<?php
require 'admin/connect.php';
$sql = "select * from products
where Producer_ID = 15";
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
          </span>
          
        </div>
        <div class='img'>
          <img src="admin/manage_products/Image/<?php echo $each['Image']?>">
        </div>
      </div>
      <div class='card-description'>
        <div class='title'>
          <?php echo $each['Name'] ?>
        </div>
        <!-- link thêm vào giỏ hàng -->
        <?php if(!empty($_SESSION['ID'])) { ?> <div class='cart'>
          <a href="add_to_cart.php?ID=<?php echo $each['ID'] ?>">
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
      </a>

        </div>
        <div class='span'>
        <?php if($each['Producer_ID']==15) {
          ?>
          
          Gà Giòn Vui Vẻ
        </a>
        <?php 
          }elseif($each['Producer_ID']==16) {
          ?>
          
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