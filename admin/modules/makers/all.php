<div class="card shadow mb-4">
    <div class="card-header py-3 align-items-center d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Makers</h6>
        <a  class="btn btn-info float-right" href="?page=add">Додати виробника</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Назва виробника</th>
                        <td>Option</td>
                    </tr>
                </thead>
                <?php
                $sql = "SELECT id, maker_name
                FROM maker
                GROUP BY maker.id ASC";
                $result = mysqli_query($conn, $sql);
                while ($maker = $result->fetch_assoc()) {
                ?>
                    <tbody>
                        <tr>
                            <td><?= $maker['id'] ?></td>
                            <td><?= $maker['maker_name'] ?></td>

                            <td style="width: 200px;">
                                <a href="?page=edit&id=<?=$maker['id']?>" class="btn btn-info">
                                    <i class="fas fa-pen"></i>
                                    Edit
                                </a>
                                <a href="?page=delete&id=<?=$maker['id']?>" class="btn btn-danger">
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