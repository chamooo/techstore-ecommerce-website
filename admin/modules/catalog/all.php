<!-- Topbar Search -->
<div class="card shadow mb-4">
    <div class="card-header py-3 align-items-center d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Catalog</h6>
        <form method="POST" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input name="search_field" type="text" class="form-control bg-light border-0 small" placeholder="Введіть назву товару" aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <input class="btn btn-primary" type="submit" name="search_btn" value="Пошук">
                </div>
            </div>
        </form>
        <a class="btn btn-info float-right" href="?page=add">Додати товар</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Зображення</th>
                        <th>Назва товару</th>
                        <th>Категорія</th>
                        <th>Виробник</th>
                        <th>Ціна</th>
                        <th>Рейтинг</th>
                        <td>Option</td>
                    </tr>
                </thead>
                <?php
                

                if (isset($_POST['search_btn'])) {
                    $search_option = "WHERE product_name LIKE '%" . $_POST['search_field'] . "%'";    
                    $sql = "SELECT catalog.id, product_name, category_name, maker_name, price, rating, img_src 
                    FROM catalog
                    JOIN product ON id_product = product.id 
                    JOIN category ON id_category = category.id 
                    JOIN maker ON id_maker = maker.id
                    $search_option";
                    // -- GROUP BY catalog.id ASC";
                } else {
                    $sql = "SELECT catalog.id, product_name, category_name, maker_name, price, rating, img_src 
                    FROM catalog
                    JOIN product ON id_product = product.id 
                    JOIN category ON id_category = category.id 
                    JOIN maker ON id_maker = maker.id 
                    GROUP BY catalog.id ASC";
                }
                $result = mysqli_query($conn, $sql);
                while ($product = $result->fetch_assoc()) {
                ?>
                    <tbody>
                        <tr>
                            <td><?= $product['id'] ?></td>
                            <td>
                                <img height="50px" src="<?= $product['img_src'] ?>" alt="">
                            </td>
                            <td><?= $product['product_name'] ?></td>
                            <td><?= $product['category_name'] ?></td>
                            <td><?= $product['maker_name'] ?></td>
                            <td><?= $product['price'] ?> грн</td>
                            <td><?= $product['rating'] ?></td>


                            <td style="width: 200px;">
                                <a href="?page=edit&id=<?= $product['id'] ?>" class="btn btn-info">
                                    <i class="fas fa-pen"></i>
                                    Edit
                                </a>
                                <a href="?page=delete&id=<?= $product['id'] ?>" class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                    Delete
                                </a>
                            </td>
                        </tr>
                    </tbody>
                <?php } ?>
            </table>
        </div>
    </div>
</div>