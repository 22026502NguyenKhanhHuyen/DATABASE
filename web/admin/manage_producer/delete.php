<?php

if(empty($_GET['ID'])){
	header('location:index.php?error=Phải truyền mã');
} else {
 $ID = $_GET['ID'];
 require '../connect.php';
 $sql = "delete from producer
 where ID = '$ID'
 ";

 mysqli_query($connect,$sql);
 mysqli_close($connect);

 header('location:index.php?success=Xóa thành công');

}