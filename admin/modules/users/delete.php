<?php
    if(!empty($_GET)) {
        $sql = "DELETE FROM user 
        WHERE id = '" . $_GET['id'] . "'";

        if(mysqli_query($conn, $sql)) {
            header('Location: /admin/users.php');
            echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
        <div>
            <i class="fas fa-trash-alt" style="margin-right: 10px;"></i>
            User deleted
        </div>
        </div>
        <br>
        <a href="/admin/users.php" type="button" class="btn btn-secondary">Back</a>
        ';
        }
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
?>