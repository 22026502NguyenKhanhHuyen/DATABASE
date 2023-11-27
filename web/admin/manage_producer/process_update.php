<?php

require '../check_admin_login.php';

#if(empty($_POST['ID'])||empty($_POST['Name'])||empty($_POST['Address'])||empty($_POST['Phone'])){
#	header('location:form_update.php?error=Phải điền đầy đủ thông tin');
#} else {
 
$ID = $_POST['ID'];
$Name = $_POST['Name'];
$Address =$_POST['Address'];
$Phone =$_POST['Phone'];
$Image_new = $_FILES['Image_new'];
$Image_old = $_POST['Image_old'];
$file_name = $Image_old;

 #$connect = mysqli_connect('localhost','root','','demo');
 #mysqli_set_charse($connect,'utf8');

if($Image_new['size'] > 0) {
	$folder = 'Image/';
    $file_extension = explode('.', $Image_new['name'])[1];
    $file_name = time() . '.' .  $file_extension;
    $target_file = $folder . $file_name;
    move_uploaded_file($Image_new["tmp_name"], $target_file);
}

 require '../connect.php';
 $sql = "update producer
 set
 Name = '$Name',
 Image = '$file_name'
 where
 ID = '$ID'
 ";

 mysqli_query($connect,$sql);
 mysqli_close($connect);

 header('location:index.php?success=Sửa thành công');

#}