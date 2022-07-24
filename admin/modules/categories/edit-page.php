<?php
if (!empty($_POST)) {
    $sql = "UPDATE category
        SET category_name = '" . $_POST['category_name'] . "'
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
$sql = "SELECT * FROM category WHERE id = '" . $_GET['id'] . "'" or die();
$result = mysqli_query($conn, $sql);
$row = $result->fetch_assoc();
?>

<div class="card shadow mb-4">
    <div class="card-body">
        <form action="?page=edit&id=<?= $_GET['id'] ?>" method="POST">
            <div class="mb-3">
                <label class="form-label">Назва виробника:</label>
                <input name="category_name" value="<?= $row['category_name'] ?>" type="text" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Save</button>
            <a href="/admin/categories.php" type="button" class="btn btn-primary">Back</a>
        </form>
    </div>
</div>
