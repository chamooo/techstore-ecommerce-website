<?php 
    require($_SERVER['DOCUMENT_ROOT'] . '/configs/connect.php');

    if(!empty($_POST)) {
        $sql = "INSERT INTO maker (maker_name)
        VALUES 
        ('" . $_POST['maker_name'] . "')";

        if(mysqli_query($conn, $sql)) {
            header('Location: /admin/makers.php');
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