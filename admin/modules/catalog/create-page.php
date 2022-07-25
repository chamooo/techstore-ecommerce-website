<?php
require($_SERVER['DOCUMENT_ROOT'] . '/admin/modules/catalog/create.php');
?>
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="/admin/modules/catalog/create.php" method="POST">
            <div class="mb-3">
                <label class="form-label">Назва товару:</label> <br>
                <div class="custom-select">
                    <select name="product_name" id="product_name">
                        <option value="">Оберіть товар</option>
                        <?php
                        $sql = "SELECT product.id, product_name FROM product";
                        $result = mysqli_query($conn, $sql);
                        while ($row = $result->fetch_assoc()) { ?>
                            <option value="<?= $row['id'] ?>"> <?= $row['product_name'] ?> </option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Виробник:</label>
                <div class="custom-select">
                    <select name="maker_name" id="maker_name">
                        <option>Оберіть виробника</option>
                        <?php
                        $sql = "SELECT maker.id, maker_name FROM maker";
                        $result = mysqli_query($conn, $sql);
                        while ($row = $result->fetch_assoc()) { ?>
                            <option value="<?= $row['id'] ?>"> <?= $row['maker_name'] ?> </option>
                        <?php } ?>
                    </select>
                </div>

            </div>


            <div class="mb-3">
                <label class="form-label">Категорія:</label> <br>
                <div class="custom-select">
                    <select name="category_name" id="category_name">
                        <option value=""> Оберіть категорію</option>
                        <?php
                        $sql = "SELECT category.id, category_name FROM category";
                        $result = mysqli_query($conn, $sql);
                        while ($row = $result->fetch_assoc()) { ?>
                            <option value="<?= $row['id'] ?>"> <?= $row['category_name'] ?> </option>
                        <?php } ?>
                    </select>
                </div>

            </div>
            <div class="mb-3">
                <label class="form-label">Ціна:</label>
                <input name="price" type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Рейтинг:</label>
                <input name="rating" type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Адреса зображення:</label>
                <input name="img_src" type="text" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Save</button>
            <a href="/admin/catalog.php" type="button" class="btn btn-primary">Back</a>
        </form>
    </div>
</div>