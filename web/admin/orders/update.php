<?php
$ID = $_GET['id'];
$Status = $_GET['status'];

require '../connect.php';

$sql = "update orders set Status= $Status where ID = '$ID'";
mysqli_query($connect,$sql);

header('location:index.php');

#$sql = "SELECT products.ID, products.Name, IFNULL(SUM(order_product.Quantity),0) AS quantitySales
#FROM products
#LEFT JOIN order_product on products.ID = order_product.Product_ID
#LEFT JOIN orders on order_product.Order_ID = orders.ID
#WHERE orders.Status = 3 OR orders.ID IS NULL
#GROUP BY products.ID;"