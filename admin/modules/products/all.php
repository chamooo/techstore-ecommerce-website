<div class="card shadow mb-4">
    <div class="card-header py-3 align-items-center d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Products</h6>
        <form method="POST" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input name="search_field" type="text" class="form-control bg-light border-0 small" placeholder="Введіть назву товару" aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <input class="btn btn-primary" type="submit" name="search_btn" value="Пошук">
                </div>
            </div>
        </form>
        <a  class="btn btn-info float-right" href="?page=add">Додати товар</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Назва товару</th>
                        <th>CPU</th>
                        <th>RAM</th>
                        <td>GPU</td>
                        <th>Екран</th>
                        <th>Сховище</th>
                        <td>Камера</td>
                        <td>Option</td>
                    </tr>
                </thead>
                <?php
                if (isset($_POST['search_btn'])) {
                    $search_option = "WHERE product_name LIKE '%" . $_POST['search_field'] . "%'";    
                    $sql = "SELECT product.id, product_name, cpu, ram, screen_type, storage, graphic, camera 
                    FROM product
                    $search_option";
                } else {
                    $sql = "SELECT product.id, product_name, cpu, ram, screen_type, storage, graphic, camera 
                    FROM product
                    GROUP BY product.id ASC";
                }
                $result = mysqli_query($conn, $sql);

                while ($product = $result->fetch_assoc()) {
                ?>
                    <tbody>
                        <tr>
                            <td><?= $product['id'] ?></td>
                            <td><?= $product['product_name'] ?></td>
                            <td><?= $product['cpu'] ?> GB</td>
                            <td><?= $product['ram'] ?> GB</td>
                            <td><?= $product['screen_type'] ?></td>
                            <td><?= $product['storage'] ?> GB</td>
                            <td><?= $product['graphic'] ?></td>
                            <td><?= $product['camera'] ?> MP</td>

                            <td style="width: 200px;">
                                <a href="?page=edit&id=<?=$product['id']?>" class="btn btn-info">
                                    <i class="fas fa-pen"></i>
                                    Edit
                                </a>
                                <a href="?page=delete&id=<?=$product['id']?>" class="btn btn-danger">
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