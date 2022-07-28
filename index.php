<?php
require('parts/header.php'); 

// require('parts/page.php'); 
require('parts/modals/registr.php');
require('parts/modals/error_registr.php');
require('parts/modals/success_registr.php');
require('parts/modals/login.php');
require('parts/page.php');
?>



    <a href="cart/cart.php">CART</a>
    <div class="container">
        <form method="POST">
            <div class="row">
                <?php
                

                $sql = "SELECT catalog.id, product_name, img_src, price FROM catalog
                JOIN product ON id_product = product.id";
                $result = mysqli_query($conn, $sql);
                while ($row = $result->fetch_assoc()) : ?>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?= $row['product_name'] ?></h5>
                                <p class="card-text">Price: <?= $row['price'] ?></p>
                                <a href="cart/add-to-cart.php?id=<?= $row['id'] ?>" class="btn btn-primary">Купити</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </form>
    </div>



<?php
require('parts/footer.php'); 
?>