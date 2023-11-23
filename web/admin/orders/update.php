<?php
$ID = $_GET['id'];
$Status = $_GET['status'];

require '../connect.php';

$sql = "update orders set Status= $Status where ID = '$ID'";
mysqli_query($connect,$sql);

header('location:index.php');