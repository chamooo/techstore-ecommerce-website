<?php 
require('../configs/connect.php');


if (!empty($_POST)) {
    $sql = "SELECT * FROM `user` WHERE `email` = '" . $_POST['email'] . "' AND `password` = '" . $_POST['password'] . "'";

    $result = mysqli_query($conn, $sql);
    $user = $result->fetch_assoc();
    
    if($user) {
        $_SESSION["user_id"] = $user['id'];
        echo json_encode($user);
        
    } else {
        echo '0';
    }

    mysqli_close($conn);
}

?>