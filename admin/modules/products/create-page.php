<?php
require($_SERVER['DOCUMENT_ROOT'] . '/admin/modules/products/create.php');
?>
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="/admin/modules/products/create.php" method="POST">
            <div class="mb-3">
                <label class="form-label">Назва товару:</label>
                <input name="product_name" type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">RAM (GB):</label>
                <input name="ram" type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Екран:</label>
                <input name="screen_type" type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">CPU:</label>
                <input name="cpu" type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Сховище:</label>
                <input name="storage" type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">GPU:</label>
                <input name="graphic" type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Камера (MP):</label>
                <input name="camera" type="text" class="form-control">
            </div>
            
            <button type="submit" class="btn btn-success">Save</button>
            <a href="/admin/users.php" type="button" class="btn btn-primary">Back</a>
        </form>
    </div>
</div>