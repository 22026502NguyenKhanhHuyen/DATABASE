<?php

$Name = $_POST['Name'];
$Email = $_POST['Email'];
$Password = $_POST['Password'];

require 'admin/connect.php';
$sql = "select count(*) from customers
where Email = '$Email'";
$result = mysqli_query($connect, $sql);
$number_rows = mysqli_fetch_array($result)['count(*)'];

if($number_rows == 1){
	session_start();
	$_SESSION['error'] = 'Trùng Email mất tiu rùi.';
	header('location:signup.php?');
	exit;
}

$sql = "insert into customers(Name, Email, Password)
values ('$Name', '$Email', '$Password')";
mysqli_query($connect, $sql);

$sql = "select ID from customers
where Email = '$Email'";
$result = mysqli_query($connect,$sql);
$ID = mysqli_fetch_array($result)['ID'];
session_start();
$_SESSION['ID'] = $ID;
$_SESSION['Name'] = $Name;
mysqli_close($connect);

header('location:user.php');


