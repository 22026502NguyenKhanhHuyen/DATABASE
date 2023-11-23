<?php

session_start();
$ID = $_GET['ID'];

if(empty($_SESSION['Cart'][$ID])) {
	require 'admin/connect.php';
	$sql = "select * from products
	where ID = '$ID'";
	$result = mysqli_query($connect, $sql);
	$each = mysqli_fetch_array($result);
	$_SESSION['Cart'][$ID]['Name'] = $each['Name'];
	$_SESSION['Cart'][$ID]['Image'] = $each['Image'];
	$_SESSION['Cart'][$ID]['Price'] = $each['Price'];
	$_SESSION['Cart'][$ID]['Quantity'] = 1;
} else {
	$_SESSION['Cart'][$ID]['Quantity']++;
}

header('location:index.php');
#54'

