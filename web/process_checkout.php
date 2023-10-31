<?php

$Name_Receiver = $_POST['Name_Receiver'];
$Phone_Receiver = $_POST['Phone_Receiver'];
$Address_Receiver = $_POST['Address_Receiver'];

require 'admin/connect.php';
session_start();

$Cart = $_SESSION['Cart'];
$Total_Price = 0;
foreach($Cart as $each) {
	$Total_Price += $each['Quantity'] * $each['Price'];
}

$Customer_ID = $_SESSION['ID'];
$Status = 0;

#ctrl H để replace nhé
$sql = "insert into orders (Customer_ID, Name_Receiver, Phone_Receiver, Address_Receiver, Status, Total_Price)
values ('$Customer_ID', '$Name_Receiver', '$Phone_Receiver', '$Address_Receiver', '$Status', '$Total_Price')";
mysqli_query($connect,$sql);

# Nếu nhiều người cùng đặt thì max id chưa chắc đã là
# id của người đó (id:order_id)
# Thêm điều kiện về customer_id
$sql = "select max(ID) from orders
where Customer_ID = '$Customer_ID'";

$result = mysqli_query($connect,$sql);
$Order_ID = mysqli_fetch_array($result)['max(ID)'];

foreach($Cart as $Product_ID => $each) {
	$Quantity = $each['Quantity'];
	$sql = "insert into order_product(Order_ID,Product_ID,Quantity)
	values ('$Order_ID', '$Product_ID', '$Quantity')";
	mysqli_query($connect,$sql);
}
mysqli_close($connect);
unset($_SESSION['Cart']);

header('location:index.php');