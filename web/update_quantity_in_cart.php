<?php
session_start();
$ID = $_GET['ID'];
$type = $_GET['type'];


if($type == 'decre') {
	if($_SESSION['Cart'][$ID]['Quantity'] > 1) {
	$_SESSION['Cart'][$ID]['Quantity']--;
} else {
	unset($_SESSION['Cart'][$ID]);
}
} else {
	$_SESSION['Cart'][$ID]['Quantity'] ++;
}
header('location:view_cart.php');