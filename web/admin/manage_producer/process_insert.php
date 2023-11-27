<?php

require '../check_admin_login.php';

#if(empty($_POST['Name'])||empty($_POST['Address'])||empty($_POST['Phone'])||empty($_POST['Image'])){
#	header('location:form_insert.php?error=Phải điền đầy đủ thông tin');
#} else {
 
 $Name = $_POST['Name'];
 $Image=$_FILES['Image'];

$folder = 'Image/';
$file_extension = explode('.', $Image['name'])[1];
$file_name = time() . '.' .  $file_extension;
$target_file = $folder . $file_name;

move_uploaded_file($Image["tmp_name"], $target_file);

 #$connect = mysqli_connect('localhost','root','','demo');
 #mysqli_set_charse($connect,'utf8');

 require '../connect.php';
 $sql = "insert into producer(Name,Image)
 values('$Name','$file_name')";

 mysqli_query($connect,$sql);
 mysqli_close($connect);

 header('location:index.php?success=Thêm thành công');

#}