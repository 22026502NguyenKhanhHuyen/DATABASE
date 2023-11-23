<?php

require '../check_admin_login.php';

if(empty($_POST['Name'])||empty($_POST['Address'])||empty($_POST['Phone'])||empty($_POST['Image'])){
	header('location:form_insert.php?error=Phải điền đầy đủ thông tin');
} else {
 
 $Name = $_POST['Name'];
 $Address =$_POST['Address'];
 $Phone =$_POST['Phone'];
 $Image=$_FILES['Image'];

 #$connect = mysqli_connect('localhost','root','','demo');
 #mysqli_set_charse($connect,'utf8');

 require '../connect.php';
 $sql = "insert into producer(Name,Address,Phone,Image)
 values('$Name','$Address','$Phone','$Image')";

 mysqli_query($connect,$sql);
 mysqli_close($connect);

 header('location:index.php?success=Thêm thành công');

}