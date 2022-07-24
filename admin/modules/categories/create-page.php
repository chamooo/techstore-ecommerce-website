<?php
require($_SERVER['DOCUMENT_ROOT'] . '/admin/modules/categories/create.php');
?>
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="/admin/modules/categories/create.php" method="POST">
            <div class="mb-3">
                <label class="form-label">Назва виробника:</label>
                <input name="category_name" type="text" class="form-control">
            </div>
            
            <button type="submit" class="btn btn-success">Save</button>
            <a href="/admin/categories.php" type="button" class="btn btn-primary">Back</a>
        </form>
    </div>
</div>