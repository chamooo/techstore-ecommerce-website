<?php 
    require($_SERVER['DOCUMENT_ROOT'] . '/configs/connect.php');

    if(!empty($_POST)) {
        $product = intval($_POST['product_name']);
        $maker = intval($_POST['maker_name']);
        $category = intval($_POST['category_name']);
        $price = $_POST['price'];
        $rating = $_POST['rating'];
        $img = $_POST['img_src'];
        $sql = "INSERT INTO `catalog` 
        (`id_product`, `id_maker`, `id_category`, `price`, `rating`, `img_src`) 
        VALUES ($product, $maker, $category, '$price', '$rating', '$img');";

        if(mysqli_query($conn, $sql)) {
            header('Location: /admin/catalog.php');
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