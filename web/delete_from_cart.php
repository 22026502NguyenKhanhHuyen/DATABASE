<?php

session_start();
$ID = $_GET['ID'];
unset($_SESSION['Cart'][$ID]);

header('location:view_cart.php');