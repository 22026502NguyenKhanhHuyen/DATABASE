<?php

session_start();
unset($_SESSION['Name']);
unset($_SESSION['ID']);

header('location:index.php');