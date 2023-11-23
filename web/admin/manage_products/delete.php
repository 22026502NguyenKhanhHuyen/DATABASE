<?php
require '../check_admin_login.php';


	$ID = $_GET['ID'];

require '../connect.php';
 $sql = "delete from products where ID = '$ID' ";

 mysqli_query($connect,$sql);
 mysqli_close($connect);

 header('location:index.php?success=Xóa thành công');
