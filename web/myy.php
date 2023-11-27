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
where Producer_ID = 16";
$result = mysqli_query($connect, $sql);
?>
<div class='body'>
  <div class='container'>
    <?php foreach ($result as $each): ?>
    <div class='card'>
      <div class='card-content'>
        <div class='top-bar'>
          <span>
           <p><?php echo $each['Price']?>$</p>
          </span>
          <span class='float-right lnr lnr-heart'>
          <!-- Đây là chỗ thả tim cho vào bst -->
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
          Gà Giòn Vui Vẻ
        <!-- chỗ này chưa thêm chi tiết sản phẩm-->
      </a>

        </div>
        <div class='span'>
        Xem 

        <!-- chỗ này chưa thêm thể loại giày-->
      </a>

        </div>
        <div class='span'>
        Xem 
        <!-- chỗ này chưa thêm cái gì đó chưa nghĩ ra
          nam/nữ/unisex-->
      </a>
        </div>
      </div>
    </div>
    <?php endforeach ?>
  </div>
</div>
<!-- partial -->
  
</body>
</html>