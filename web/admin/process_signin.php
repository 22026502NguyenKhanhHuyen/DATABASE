<?php
 	
 $Email = $_POST['Email'];
 $Password = $_POST['Password'];
 require 'connect.php';

 $sql = "select * from admin
 where Email = '$Email' and Password = '$Password'";
 $result = mysqli_query($connect,$sql);

 if (mysqli_num_rows($result) == 1) {
 	$each = mysqli_fetch_array($result);
 	session_start();
 	$_SESSION['ID'] = $each['ID'];
 	$_SESSION['Name'] = $each['Name'];
 	

 	header('location:root/index.php');
 	exit;
 }

 header('location:index.php');