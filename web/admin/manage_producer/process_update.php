<?php

if(empty($_POST['ID'])||empty($_POST['Name'])||empty($_POST['Address'])||empty($_POST['Phone'])||empty($_POST['Image'])){
	header('location:form_update.php?error=Phải điền đầy đủ thông tin');
} else {
 
 $ID = $_POST['ID'];
 $Name = $_POST['Name'];
 $Address =$_POST['Address'];
 $Phone =$_POST['Phone'];
 $Image=$_POST['Image'];

 #$connect = mysqli_connect('localhost','root','','demo');
 #mysqli_set_charse($connect,'utf8');

 require '../connect.php';
 $sql = "update producer
 set
 Name = '$Name',
 Address ='$Address',
 Phone = '$Phone',
 Image = '$Image'
 where
 ID = '$ID'
 ";

 mysqli_query($connect,$sql);
 mysqli_close($connect);

 header('location:index.php?success=Sửa thành công');

}