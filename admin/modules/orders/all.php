<div class="card shadow mb-4">
    <div class="card-header py-3 align-items-center d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Замовлення</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ім'я користувача</th>
                        <th>ID товарів</th>
                        <th>Сума замовлення</th>
                        <td>Option</td>
                    </tr>
                </thead>
                <?php
                $sql = "SELECT user_order.id, id_product, order_sum, username
                FROM user_order
                JOIN user ON id_user = user.id
                ORDER BY user_order.id ASC";
                $result = mysqli_query($conn, $sql);
                while ($order = $result->fetch_assoc()) {
                ?>
                    <tbody>
                        <tr>
                            <td><?= $order['id'] ?></td>
                            <td><?= $order['username'] ?></td>
                            <td><?= $order['id_product'] ?></td>
                            <td><?= $order['order_sum'] ?> грн</td>
                            <td style="width: 200px;">
                                <a href="?page=delete&id=<?=$order['id']?>" class="btn btn-danger">
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