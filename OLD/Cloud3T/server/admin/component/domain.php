<?php
require_once "../../../modules/config.php";
require_once "../lib/private/head.php";
require_once "../lib/private/nav.php";

?>

<title><?=$setting['Title']?> - Danh sách domain</title>

<section class="col-lg-12 connectedSortable">
    <div class="card card-primary card-outline">
        <div class="card-header ">
            <h3 class="card-title">
                <i class="fas fa-history mr-1"></i>
                Danh sách domain
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
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Thêm Domain
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
                            <th>Giá</th>
                            <th>Loại</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($KNCMS->get_list("SELECT * FROM `domain` ORDER BY id desc") as $row) {
                            $i++;
                        ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $row['domain'] ?></td>
                                <td><?= $KNCMS->format_cash($row['price']) ?>vnđ</td>
                                <td><?= GetDomainType($row['type']) ?></td>
                                <td>
                                    <a class="btn btn-danger" href="<?= '?delete=' . $row['id'] ?>">
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

<!-- THÊM DOMAIN -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Thêm Domain</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post">
                <div class="modal-body">
                    <div class="form-outline mb-4">
                        <input type="text" class="form-control" id="domain" name="domain" type="text" placeholder="Đuôi domain , vd: .com">
                    </div>
                    <div class="form-outline mb-4">
                        <input type="text" class="form-control" id="price" name="price" type="number" placeholder="Giá tiền">
                    </div>
                    <div class="form-outline mb-4">
                        <select class="custom-select" id="dtype" name="dtype">
                            <option selected value="">Chọn...</option>
                            <option value="0">Chính thống</option>
                            <option value="1">Lậu</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" id="add" name="add" class="btn btn-primary">Thêm</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#openModal_Edit').click(function(e){
            e.preventDefault(); // Ngăn chặn hành vi mặc định của thẻ <a>
            var editUrl = $(this).attr('href');
            var modalTarget = '#edit_domain';
            
            // Chuyển hướng _GET
            window.location.href = editUrl;

            // Mở modal
            $(modalTarget).modal('show');
        });
    });
</script>
<?php require_once $admin_controller . '/domain.php' ?>
<?php
require_once "../lib/private/foot.php";
