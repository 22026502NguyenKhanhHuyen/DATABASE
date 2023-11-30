

<?php
require 'admin/connect.php';
$producer = mysqli_query($connect, "select * from producer");
?>
<div class="container-wrap">
	<div class="header">
		<div class="container-header">
			<div class="icon">
				<img src="image/logo1.png" alt="">
			</div>
			<div class="cart">
				<div class="help">
					<div class="icon">
						<i class="fa-solid fa-phone-volume"></i>
					</div>
					<div class="text">
						<p>Tư vấn</p>
						<div class="tel">0384164200</div>
					</div>
				</div>
				<div class="welcome">
					<div class="icon">
						<i class="fa-regular fa-user"></i>
					</div>
					<div class="text">
						<p>Xin chào!</p>

						<?php if(empty($_SESSION['ID'])) {?>
		
				<a href="signin.php">
					Đăng nhập
				</a>
			

			<?php } else { ?> 
			
				<a href="signout.php">
					Đăng xuất
				</a>
			
		<?php } ?>
					</div>
				</div>
				<div class="cart-icon">
					<a href="view_cart.php">
						<i class="fa-solid fa-cart-shopping"></i>
					</a>
					
				</div>
			</div>
		</div>
	</div>
	<div class="menu">
		<div class="container-menu">
			<h4>Trang chủ</h4>
			<div class="tabs">
				<?php
					$count = 1;
				 	foreach($producer as $data) {
						$str = "tab-item item" . $count;
				?>
					<a href="index.php?IDpro=<?php echo $data["ID"] ?>" class=<?php echo $str; ?>><?php echo $data['Name'] ?></a>
				<?php
					$count++;
				}
				?>
				<!-- <a class="tab-item item1">Education</a>
				<a class="tab-item item2 ">Fashion</a>
				<a class="tab-item item3 ">Music</a> -->
			</div>
		</div>
	</div>
</div>
  <!-- Carousel -->
  <div id="demo" class="carousel slide" data-bs-ride="carousel">
    <!-- Indicators/dots -->
    <div class="carousel-indicators">
      <button
        type="button"
        data-bs-target="#demo"
        data-bs-slide-to="0"
        class="active"
      ></button>
      <button
        type="button"
        data-bs-target="#demo"
        data-bs-slide-to="1"
      ></button>
      <button
        type="button"
        data-bs-target="#demo"
        data-bs-slide-to="2"
      ></button>
    </div>

    <!-- The slideshow/carousel -->
    <div
      class="carousel-inner"
      style="padding: 0% 10% 0% 10%; height: 350px; background-color: black"
    >
      <div class="carousel-item active">
        <img
          src="image/carousel1.jpg"
          alt="Background"
          class="d-block w-100 carousel-img"
        />
      </div>
      <div class="carousel-item">
        <img
          src="image/carousel2.jpg"
          alt="The Nun"
          class="d-block w-100 carousel-img imgHeight"
        />
      </div>
      <div class="carousel-item">
        <img
          src="images/shinn.jpeg"
          alt="Shin"
          class="d-block w-100 carousel-img imgHeight"
        />
      </div>
    </div>
	<!-- Left and right controls/icons -->
    <button
      class="carousel-control-prev"
      type="button"
      data-bs-target="#demo"
      data-bs-slide="prev"
    >
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button
      class="carousel-control-next"
      type="button"
      data-bs-target="#demo"
      data-bs-slide="next"
    >
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>