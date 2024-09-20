<?php
require_once "../../../modules/config.php";
require_once "../lib/private/head.php";
require_once "../lib/private/nav.php";
if (isset($_GET['delete'])) {
    $KNCMS->query("DELETE FROM `hosting` WHERE `id` = " . ceil($_GET['delete']));
    $KNCMS->msg_success("Xóa thành công hosting số " . $_GET['delete'], hUrl('Control/ListHosting'), 1000);
}
?>

<title>Danh sách hosting</title>

<section class="col-lg-12 connectedSortable">
    <div class="card card-primary card-outline">
        <div class="card-header ">
            <h3 class="card-title">
                <i class="fas fa-history mr-1"></i>
                Danh sách hosting
            </h3>
            <div class="card-tools">
                <button type="button" class="btn bg-success btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn bg-warning btn-sm" data-card-widget="maximize"><i class="fas fa-expand"></i>
                </button>
                <button type="button" class="btn bg-danger btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive p-0">
                <table id="datatable2" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Gói</th>
                            <th>Giá</th>
                            <th>Mô tả</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($KNCMS->get_list("SELECT * FROM `hosting` ORDER BY id desc") as $row) {
                            $i++;
                        ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $row['title'] ?></td>
                                <td><?= $row['package'] ?></td>
                                <td><?= $KNCMS->format_cash(ceil($row['price'])) ?></td>
                                <td><?= $row['content'] ?></td>
                                <td>
                                    <a class="btn btn-info" href="<?= hUrl('Control/Edithosting/' . $row['id']) ?>">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a class="btn btn-danger" href="?delete=<?=$row['id']?>">
                                        <i class="fas fa-edit"></i> Delete
                                    </a>
                                </td>
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?php
require_once "../lib/private/foot.php";
