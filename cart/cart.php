<?php
    require($_SERVER['DOCUMENT_ROOT'] . '/configs/connect.php');
    require($_SERVER['DOCUMENT_ROOT'] . '/parts/header.php');
    session_start();
    // unset($_SESSION['cart']);
    ?>
    <link rel="stylesheet" href="assets/css/cart.css">
    <title>Кошик</title>
<body>
    <div class="cart-wrapper">
        <div class="cart-content">
            <div class="cart">
                <div class="cart-container">
                    <div class="cart__row">
                        <div class="cart__title title">Кошик</div>
                        <div class="cart__total">
                            <div class="total__row">
                                <div class="total__item">
                                    <div class="total__item-body">
                                        <div class="total__item-text">
                                            <?php
                                            if (!empty($_SESSION['cart'])) {
                                                $whereIn = implode(',', $_SESSION['cart']);
                                                $sql = "SELECT COUNT(id) FROM catalog WHERE catalog.id IN ($whereIn)";
                                                $result = mysqli_query($conn, $sql);

                                                $sql = "SELECT SUM(price)
                                                FROM catalog 
                                                WHERE catalog.id IN ($whereIn)";
                                                $result = mysqli_query($conn, $sql);
                                                $sum = $result->fetch_assoc();
                                            }
                                            ?>
                                            Загальна вартість: <b style="font-size: 24px; margin-left: 9px;"><?= $sum['SUM(price)'] ?> грн</b>
                                        </div>
                                        <?php

                                        
                                        ?>
                                        <form method="POST">
                                            <input style="cursor: pointer;" name="submit" type="submit" class="total__item-btn btn" value="Замовити">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- CART ITEM -->
                        <?php
                        if (empty($_SESSION['cart'])) {
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
                        
                        // ВИВЕДЕННЯ ТОВАРІВ
                        $whereIn = implode(',', $_SESSION['cart']);
                        $sql = "SELECT catalog.id, product_name, price, img_src
                        FROM catalog
                        JOIN product ON id_product = product.id
                        WHERE catalog.id IN ($whereIn)";
                        $result = mysqli_query($conn, $sql);
                        while ($row = $result->fetch_assoc()) :
                        ?>
                            <div class="cart__column">
                                <div class="cart__item cart-item">
                                    <div class="cart-item__row">
                                        <div class="cart-item__image">
                                            <img src="<?= $row['img_src'] ?>" alt="">
                                        </div>
                                        <div class="cart-item__body">
                                            <div class="cart-item__title"><?= $row['product_name'] ?></div>
                                            <div class="cart-item__text">
                                                <div class="item__text_price price">
                                                    <?= $row['price'] ?> грн
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item__dagger">
                                            <a href="delete-from-cart.php?id=<?= $row['id'] ?>" class="delete-btn">X</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;
                        $user_id = $_SESSION['user_id'];
                        $arrayOfProducts = implode(',', $_SESSION['cart']);
                        $order_sum = $sum['SUM(price)'];

                        if(isset($_POST['submit'])) {
                            $sql = "INSERT INTO user_order (id_user, id_product, order_sum)
                            VALUES ($user_id, '$arrayOfProducts', '$order_sum')";
                            if(mysqli_query($conn, $sql)) {
                                echo '<script>alert("Замовлення додано")</script>';
                                unset($_SESSION['cart']);
                            } else {
                                "Замовлення НЕ додано";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php
    require('../parts/footer.php');
    ?>
</body>

</html>