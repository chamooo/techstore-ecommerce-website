<?php 
require('../configs/connect.php');

if (!empty($_POST)) {
    $sql = "SELECT * FROM `user` WHERE `email` = '" . $_POST['email'] . "'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows == 1) {
        echo '1';
    } else {
        $sql = "INSERT INTO `user` (`username`, `email`,`tel`, `password`) VALUES ('" . $_POST['name'] . "', '" . $_POST['email'] . "', '" . $_POST['phone'] . "', '" . $_POST['password'] . "')";
        if (mysqli_query($conn, $sql)) {
            echo '0';
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    
    mysqli_close($conn);
}





?>