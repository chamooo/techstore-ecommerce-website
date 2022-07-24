<?php 
    require($_SERVER['DOCUMENT_ROOT'] . '/configs/connect.php');

    if(!empty($_POST)) {
        $sql = "INSERT INTO product (product_name, ram, screen_type, cpu, storage, graphic, camera)
        VALUES 
        ('" . $_POST['product_name'] . "', 
        '" . $_POST['ram'] . "',
        '" . $_POST['screen_type'] . "',
        '" . $_POST['cpu'] . "',
        '" . $_POST['storage'] . "',
        '" . $_POST['graphic'] . "',
        '" . $_POST['camera'] . "')";

        if(mysqli_query($conn, $sql)) {
            header('Location: /admin/products.php');
            echo '<div class="alert alert-success d-flex align-items-center" role="alert">
            <div>
                <i class="fa-solid fa-check" style="margin-right: 10px;"></i>
                Data has been saved
            </div>
            </div>
            <br>';
        }
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
?>