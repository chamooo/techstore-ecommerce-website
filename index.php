<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>

<body>
    <a href="cart/cart.php">CART</a>
    <div class="container">
        <form method="POST">
            <div class="row">
                <?php
                require($_SERVER['DOCUMENT_ROOT'] . '/configs/connect.php');

                $sql = "SELECT catalog.id, product_name, img_src FROM catalog
                JOIN product ON id_product = product.id";
                $result = mysqli_query($conn, $sql);
                while ($row = $result->fetch_assoc()) : ?>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?= $row['product_name'] ?></h5>
                                <p class="card-text">Price: 12310</p>
                                <a href="cart/add-to-cart.php?id=<?= $row['id'] ?>" class="btn btn-primary">Купити</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Функціонал кошика -->
    <script src="cart/assets/js/myCart.js"></script>
</body>

</html>