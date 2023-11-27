<?php
if(isset($_POST['combo'])) {
	$combo = 1;
} else {
	$combo = 0;
}
require '../check_admin_login.php';

$Name = $_POST['Name'];
$Image = $_FILES['Image'];
$Price = $_POST['Price'];
$Description = $_POST['Description'];
$Producer_ID = $_POST['Producer_ID'];

$folder = 'Image/';
$file_extension = explode('.', $Image['name'])[1];
$file_name = time() . '.' .  $file_extension;
$target_file = $folder . $file_name;

move_uploaded_file($Image["tmp_name"], $target_file);

require '../connect.php';
$sql = "insert into products(Name, Image, Price, Description, Producer_ID,Combo)
values('$Name', '$file_name', '$Price', '$Description', '$Producer_ID','$combo')";

mysqli_query($connect, $sql);
mysqli_close($connect);


 header('location:index.php?success=Thêm thành công');
