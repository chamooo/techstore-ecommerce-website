<?php 
require('../configs/connect.php');

if (!empty($_POST)) {

    $sql = "INSERT INTO `user` (`username`, `email`,`tel`, `password`) VALUES ('" . $_POST['name'] . "', '" . $_POST['email'] . "', '" . $_POST['phone'] . "', '" . $_POST['password'] . "')";
    if (mysqli_query($conn, $sql)) {
        echo $_POST['name'];
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}





?>