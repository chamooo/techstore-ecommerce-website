<?php
require($_SERVER['DOCUMENT_ROOT'] . '/configs/connect.php');

session_start();

// PRODUCT NAME SEARCH OPTION
$search_option = '';
if (isset($_GET['search_product_btn'])) {
    $search_option = "WHERE product_name LIKE '%" . $_GET['search_product_field'] . "%'";
} else {
    $search_option = '';
}

// SORTING OPTION
if(isset(($_GET['sort']))) {
    if($_GET['sort'] == 'priceDown') {
        $sort_option = 'ORDER BY price DESC';
    } else if($_GET['sort'] == 'priceUp') {
        $sort_option = 'ORDER BY price ASC';
    } else if($_GET['sort'] == 'alphDown') {
        $sort_option = 'ORDER BY product_name DESC';
    } else if($_GET['sort'] == 'alphUp') {
        $sort_option = 'ORDER BY product_name ASC';
    }
} else {
    $sort_option = '';  
}


// CATEGORY SEARCH
$category = $_GET['category'];
if (!empty($_GET['category'])) {
    $sql = "SELECT catalog.id, maker_name, product_name, category_name,
               ram, screen_type, cpu, storage, graphic, camera,
               price, rating, img_src
        FROM catalog
        JOIN product ON id_product = product.id
        JOIN category ON id_category = category.id
        JOIN maker ON id_maker = maker.id
        WHERE category_name = '$category'
        $sort_option";
} 
// SORTING
else if (isset($_GET['sort'])) {
    $sql = "SELECT catalog.id, maker_name, product_name, category_name,
               ram, screen_type, cpu, storage, graphic, camera,
               price, rating, img_src
        FROM catalog
        JOIN product ON id_product = product.id
        JOIN category ON id_category = category.id
        JOIN maker ON id_maker = maker.id
        $sort_option";
} else if (isset($_GET['maker'])) {
    $maker = $_GET['maker'];
    $sql = "SELECT catalog.id, maker_name, product_name, category_name,
               ram, screen_type, cpu, storage, graphic, camera,
               price, rating, img_src
        FROM catalog
        JOIN product ON id_product = product.id
        JOIN category ON id_category = category.id
        JOIN maker ON id_maker = maker.id
        WHERE maker_name = '$maker'";
}
// DEFAULT
else {
    $sql = "SELECT catalog.id,  maker_name, product_name, category_name,
               ram, screen_type, cpu, storage, graphic, camera,
               price, rating, img_src
        FROM catalog
        JOIN product ON id_product = product.id
        JOIN category ON id_category = category.id
        JOIN maker ON id_maker = maker.id
        $search_option";
}

$result = mysqli_query($conn, $sql);
?>
 <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"> 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>


<?php
require($_SERVER['DOCUMENT_ROOT'] . '/parts/header.php');

// var_dump($_SESSION['cart']);
// unset($_SESSION['cart']);
?>

<div class="wrapper">
    <div class="content">
        <div class="catalog">
            <div class="container">
                <div class="catalog__title title">
                    Каталог товарів
                </div>
                <div class="catalog__choice">
                    <a class="category-btn" href="all-products.php">Всі</a>
                    <a class="category-btn" href="all-products.php?category=Ноутбуки">Ноутбуки</a>
                    <a class="category-btn" href="all-products.php?category=Планшети">Планшети</a>
                    <a class="category-btn" href="all-products.php?category=Смартфони">Смартфони</a>
                </div>
                <form method="GET">
                    <div class="catalog__search">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <input name="search_product_field" type="text" class="form-control" placeholder="Введіть назву товару" aria-describedby="button-addon2">
                                <input name="search_product_btn" class="btn btn-primary" type="submit" id="button-addon2" value="Пошук">
                            </div>
                        </div>
                    </div>
                </form>

                <!-- ORDER BY... -->
                <div class="dropdown" style="display: inline-block; margin: 0 30px 0 0;">
                    <a class="btn btn-outline-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Сортувати за...
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="all-products.php?sort=priceDown">Ціною (за спаданням)</a></li>
                        <li><a class="dropdown-item" href="all-products.php?sort=priceUp">Ціною (за зростанням)</a></li>
                        <li><a class="dropdown-item" href="all-products.php?sort=alphDown">A-Z</a></li>
                        <li><a class="dropdown-item" href="all-products.php?sort=alphUp">Z-A</a></li>
                    </ul>
                </div>

                <div class="dropdown" style="display: inline-block; margin-bottom: 30px;">
                    <a class="btn btn-outline-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Виберіть виробника...
                    </a>
                    <ul class="dropdown-menu">
                        <?php 
                        $sqlMaker = "SELECT maker_name FROM maker";
                        $resultMaker = mysqli_query($conn, $sqlMaker);
                        while($maker = $resultMaker->fetch_assoc()) : ?>
                        <li><a class="dropdown-item" href="all-products.php?maker=<?= $maker['maker_name'] ?>"><?= $maker['maker_name'] ?></a></li>
                        <?php endwhile; ?>
                    </ul>
                </div>


                <div class="catalog__row">
                    <?php
                    while ($row = $result->fetch_assoc()) :

                    ?>
                        <div class="catalog__column">
                            <div class="catalog__item item">
                                <div class="item__row">
                                    <div class="item__img">
                                        <img src="<?= $row['img_src'] ?>" alt="">
                                    </div>
                                    <div class="item__body">
                                        <div class="item__title"><?= $row['product_name'] ?></div>
                                        <div class="item__text">
                                            <p class="item__description"><b>Категорія:</b> <?= $row['category_name'] ?></p>
                                            <p class="item__description"><b>Виробник:</b> <?= $row['maker_name'] ?></p>
                                            <p class="item__description"><b>Екран:</b> <?= $row['screen_type'] ?></p>
                                            <p class="item__description"><b>ОЗУ:</b> <?= $row['ram'] ?> GB</p>
                                            <p class="item__description"><b>CPU:</b> <?= $row['cpu'] ?></p>
                                            <p class="item__description"><b>Графіка:</b> <?= $row['graphic'] ?></p>
                                            <p class="item__description"><b>Сховище:</b> <?= $row['storage'] ?> GB</p>
                                            <p class="item__description"><b>Камера:</b> <?= $row['camera'] ?> MP</p>
                                        </div>
                                        <div class="item__price">
                                            <a class="buyBtn" id="<?= $row['id'] ?>"><?= $row['price'] ?> грн</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    endwhile;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add to cart -->
<script>
    idProd = 0;
    buyBtn = $('.buyBtn');

    Array.from(buyBtn).forEach(function(buyBtn) {
        buyBtn.addEventListener('click', function(e) {
            e.preventDefault();

            idProd = e.target.id;
            idProdStr = "#" + e.target.id + "";

            buyBtn = $('.buyBtn');
            activeBtn = $(idProdStr);

            $.ajax({
                type: "POST",
                url: "/cart/add-to-cart.php?id=" + idProd,
                data: "data",
                success: function(data) {
                    activeBtn.html('Товар у кошику');
                }
            });
        })
    });
</script>
</div>
<?php
require($_SERVER['DOCUMENT_ROOT'] . '/parts/footer.php');
?>
