<?php
session_start();

if(empty($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

array_push($_SESSION['cart'], $_GET['id']);
header('Location: /all-products/all-products.php');

?>

<p>
    Success
    <a href="cart.php">Cart</a>
</p>