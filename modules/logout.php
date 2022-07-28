<?php 
if (isset($_SESSION["user_id"]) && $_SESSION["user_id"] != null) {
    $_SESSION["user_id"] = null;
    $_SESSION['cart']=null;
}
?>