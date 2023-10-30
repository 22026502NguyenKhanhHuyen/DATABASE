<?php
$ID = $_POST['ID'];
$Name = $_POST['Name'];
$Image_new = $_FILES['Image_new'];
$Image_old = $_POST['Image_old'];
$file_name = $Image_old;

if($Image_new['size'] > 0) {
	$folder = 'Image/';
    $file_extension = explode('.', $Image_new['name'])[1];
    $file_name = time() . '.' .  $file_extension;
    $target_file = $folder . $file_name;
    move_uploaded_file($Image_new["tmp_name"], $target_file);
}

#$Image_old = $_POST['Image_old'];
$Price = $_POST['Price'];
$Description = $_POST['Description'];
$Producer_ID = $_POST['Producer_ID'];

require '../connect.php';
$sql = "update products
set Name = '$Name',
Image = '$file_name',
Price ='$Price',
Description ='$Description',
Producer_ID = '$Producer_ID'
where ID = '$ID'";

mysqli_query($connect, $sql);
mysqli_close($connect);


header('location:index.php?success=Sửa thành công');