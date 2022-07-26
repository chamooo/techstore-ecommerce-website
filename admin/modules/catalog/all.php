<!-- Topbar Search -->
<div class="card shadow mb-4">
    <div class="card-header py-3 align-items-center d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Catalog</h6>
        <!-- PRODUCT NAME SEARCH -->
        <form method="POST" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input name="search_product_field" type="text" class="form-control bg-light border-0 small" placeholder="Введіть назву товару" aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <input class="btn btn-primary" type="submit" name="search_product_btn" value="Пошук">
                </div>
            </div>
        </form>
        <!-- CATEGORY SEARCH -->
        <form method="POST" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div style="float: right; margin-left: -500px; width: 300px" class="custom-select">
                <select name="category_name" id="category_name">
                    <option value="">Оберіть категорію</option>
                    <?php
                    $sql = "SELECT category_name FROM category";
                    $result = mysqli_query($conn, $sql);
                    while ($row = $result->fetch_assoc()) { ?>
                        <option value="<?= $row['category_name'] ?>"> <?= $row['category_name'] ?> </option>
                    <?php } ?>
                    </select>
                </div>
                <div class="input-group-append">
                    <input style="padding: 8px;" class="btn btn-primary" type="submit" name="search_category_btn" value="Пошук">
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
                // PRODUCT NAME SEARCH OPTION
                if (isset($_POST['search_product_btn'])) {
                    $search_option = "WHERE product_name LIKE '%" . $_POST['search_product_field'] . "%'";
                } 
                // PRODUCT CATEGORY SEARCH OPTION
                else if (isset($_POST['search_category_btn'])) {
                    $search_option = "WHERE category_name LIKE '%" . $_POST['category_name'] . "%'";
                }
                //default
                else {
                    $search_option = '';
                }

                $sql = "SELECT catalog.id, product_name, category_name, maker_name, price, rating, img_src 
                FROM catalog
                JOIN product ON id_product = product.id 
                JOIN category ON id_category = category.id 
                JOIN maker ON id_maker = maker.id
                $search_option 
                GROUP BY catalog.id ASC";

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