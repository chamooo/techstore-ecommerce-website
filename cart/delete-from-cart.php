<?php
session_start();
$key = array_search($_GET['id'], $_SESSION['cart']);
unset($_SESSION['cart'][$key]);

header('Location: cart.php');
?>

