<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
$n = $_SESSION['name'];
$u = $_SESSION['user_name'];
$ap = $_SESSION['id'];
}else{
     header("Location: index.php");
     exit();
}
 ?>