<?php
if (!empty($_POST)) {
    $sql = "UPDATE product
        SET product_name = '" . $_POST['product_name'] . "',
        ram = '" . $_POST['ram'] . "',
        screen_type = '" . $_POST['screen_type'] . "',
        cpu = '" . $_POST['cpu'] . "',
        storage = '" . $_POST['storage'] . "',
        graphic = '" . $_POST['graphic'] . "',
        camera = '" . $_POST['camera'] . "'
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
$sql = "SELECT * FROM product WHERE id = '" . $_GET['id'] . "'" or die();
$result = mysqli_query($conn, $sql);
$row = $result->fetch_assoc();
?>

<div class="card shadow mb-4">
    <div class="card-body">
        <form action="?page=edit&id=<?= $_GET['id'] ?>" method="POST">
            <div class="mb-3">
                <label class="form-label">Назва товару:</label>
                <input name="product_name" value="<?= $row['product_name'] ?>" type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">RAM (GB):</label>
                <input name="ram" value="<?= $row['ram'] ?>" type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Екран:</label>
                <input name="screen_type" value="<?= $row['screen_type'] ?>" type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">CPU:</label>
                <input name="cpu" value="<?= $row['cpu'] ?>" type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Сховище:</label>
                <input name="storage" value="<?= $row['storage'] ?>" type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">GPU:</label>
                <input name="graphic" value="<?= $row['graphic'] ?>" type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Камера (MP):</label>
                <input name="camera" value="<?= $row['camera'] ?>" type="text" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">Save</button>
            <a href="/admin/products.php" type="button" class="btn btn-primary">Back</a>
        </form>
    </div>
</div>
