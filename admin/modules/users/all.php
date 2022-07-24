<div class="card shadow mb-4">
    <div class="card-header py-3 align-items-center d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Users</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ім'я</th>
                        <th>Email</th>
                        <th>Адреса</th>
                        <th>Телефон</th>
                        <th>Role</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <?php
                $sql = "SELECT * FROM user WHERE id";
                $result = mysqli_query($conn, $sql);
                while ($user = $result->fetch_assoc()) {
                ?>
                    <tbody>
                        <tr>
                            <td><?= $user['id'] ?></td>
                            <td><?= $user['username'] ?></td>
                            <td><?= $user['email'] ?></td>
                            <td><?= $user['address'] ?></td>
                            <td><?= $user['tel'] ?></td>
                            <td><?= $user['role'] ?></td>
                            <td>
                                <a href="?page=edit&id=<?=$user['id']?>" class="btn btn-info">
                                    <i class="fas fa-pen"></i>
                                    Edit
                                </a>
                                <a href="?page=delete&id=<?=$user['id']?>" class="btn btn-danger">
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