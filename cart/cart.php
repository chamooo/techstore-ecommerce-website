<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/cart.css">
    <title>Кошик</title>
    <?php
    require($_SERVER['DOCUMENT_ROOT'] . '/configs/connect.php');
    session_start();
    ?>
</head>
<body>
    <div class="wrapper">
        <div class="content">
            <div class="cart">
                <!-- 1340px -->
                <div class="container">
                    <!-- 1250px -->
                    <div class="cart__row">
                        <div class="cart__title title">Кошик</div>
                        <div class="cart__total">
                            <div class="total__row">
                                <div class="total__item">
                                    <div class="total__item-body">
                                        <div class="total__item-text">
                                            <?php
                                            if(!empty($_SESSION['cart'])) {
                                                $whereIn = implode(',', $_SESSION['cart']);
                                                $sql = "SELECT COUNT(id) FROM catalog WHERE catalog.id IN ($whereIn)";
                                                $result = mysqli_query($conn, $sql);
                                                $count = $result->fetch_assoc();
                                                
                                                $sql = "SELECT SUM(price)
                                                FROM catalog 
                                                WHERE catalog.id IN ($whereIn)";
                                                $result = mysqli_query($conn, $sql);
                                                $sum = $result->fetch_assoc();
                                            }
                                            ?>
                                            Загальна вартість: <b style="font-size: 24px; margin-left: 9px;"><?= $sum['SUM(price)'] ?> грн</b>
                                        </div>
                                        <a href="" class="total__item-btn btn">Замовити</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- CART ITEM -->
                        <?php
                        if(empty($_SESSION['cart'])) {
                            ?>
                                <h3>Ваш кошик порожній</h3>
                                <style>
                                    .cart__total {
                                        display: none;
                                    }
                                    .cart__row {
                                        display: block;
                                    }
                                </style>
                            <?php    
                            }
                        
                        $whereIn = implode(',', $_SESSION['cart']);
                        $sql = "SELECT catalog.id, product_name, price, img_src
                        FROM catalog
                        JOIN product ON id_product = product.id
                        WHERE catalog.id IN ($whereIn)";
                        $result = mysqli_query($conn, $sql);
                        while($row = $result->fetch_assoc()) :
                        ?>
                        <div class="cart__column">
                            <div class="cart__item item">
                                <div class="item__row">
                                    <div class="item__image">
                                        <img  src="<?=$row['img_src']?>" alt="">
                                    </div>
                                    <div class="item__body">
                                        <div class="item__title"><?=$row['product_name']?></div>
                                        <div class="item__text">
                                            <div class="item__text_count count">
                                                Кількість: <?= $count['COUNT(id)'] ?>
                                            </div>
                                            <div class="item__text_price price">
                                            <?=$row['price']?> грн
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item__dagger">
                                        <a href="delete-from-cart.php?id=<?=$row['id']?>" class="delete-btn">X</a> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; 
                        ?>


                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <footer class="footer">
        <div class="container">
            FOOTER
        </div>
    </footer>
</body>

</html>