<?php
if (!empty($_POST)) {
    $sql = "UPDATE `catalog`
        SET price = '" . $_POST['price'] . "', 
        img_src = '" . $_POST['img_src'] . "'
        WHERE id = " . $_GET['id'];

    if (mysqli_query($conn, $sql)) {
        echo '<div class="alert alert-success d-flex align-items-center" role="alert">
        <div>
            Data has been updated successfully
        </div>
        </div>
        <br>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
$sql = "SELECT price, product_name, img_src
FROM catalog
JOIN product ON id_product = product.id 
WHERE catalog.id = '" . $_GET['id'] . "'" or die();

$result = mysqli_query($conn, $sql);
$row = $result->fetch_assoc();
?>

<div class="card shadow mb-4">
    <div class="card-body">
        <form action="?page=edit&id=<?= $_GET['id'] ?>" method="POST">
        <h3><?= $row['product_name'] ?></h3>
        <br>
            <div class="mb-3">
                <label class="form-label">Ціна:</label>
                <input name="price" value="<?= $row['price'] ?>" type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">адреса зображення:</label>
                <input name="img_src" value="<?= $row['img_src'] ?>" type="text" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Save</button>
            <a href="/admin/catalog.php" type="button" class="btn btn-primary">Back</a>
        </form>
    </div>
</div>
