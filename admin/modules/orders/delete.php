<?php
if (!empty($_GET)) {
    $sql = "DELETE FROM user_order 
        WHERE id = '" . $_GET['id'] . "'";

    if (mysqli_query($conn, $sql)) {
        header("location: /admin/orders.php");
        echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
        <div>
            Data has been deleted successfully
        </div>
        </div>
        <br>
        <a href="/admin/orders.php" type="button" class="btn btn-secondary">Back</a>
        ';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

