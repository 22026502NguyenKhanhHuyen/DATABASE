<?php

session_start();
unset($_SESSION['Name']);
unset($_SESSION['ID']);
setcookie('remember', null, -1);

header('location:index.php');
