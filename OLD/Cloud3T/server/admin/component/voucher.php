<?php
require_once "../../../modules/config.php";
require_once "../lib/private/head.php";
require_once "../lib/private/nav.php";

?>

<title><?=$setting['Title']?> - Danh sách Voucher</title>

<section class="col-lg-12 connectedSortable">
    <div class="card card-primary card-outline">
        <div class="card-header ">
            <h3 class="card-title">
                <i class="fas fa-history mr-1"></i>
                Danh sách Voucher
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
                    Thêm Voucher
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive p-0">
                <table id="datatable2" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Voucher</th>
                            <th>Giảm giá (%)</th>
                            <th>Loại</th>
                            <th>Số lượt sử dụng còn lại</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($KNCMS->get_list("SELECT * FROM `voucher` ORDER BY id desc") as $row) {
                            $i++;
                        if($row['type'] == 0) $vtype ='VPS';
                        else if($row['type'] == 1) $vtype ='Domain';
                        else if($row['type'] == 2) $vtype ='Hosting';
                        else if($row['type'] == 3) $vtype ='Minecraft';
                        ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $row['voucher'] ?></td>
                                <td><?= $row['discount'] ?></td>
                                <td><?=$vtype?></td>
                                <td><?= $row['limit'] ?></td>
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

<!-- THÊM Voucher -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Thêm Voucher</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post">
                <div class="modal-body">
                    <div class="form-outline mb-4">
                        <input type="text" class="form-control" id="voucher" name="voucher" type="text" placeholder="Mã voucher">
                    </div>
                    <div class="form-outline mb-4">
                        <input type="number" class="form-control" id="discount" name="discount" type="number" placeholder="Giảm giá">
                    </div>
                    <div class="form-outline mb-4">
                        <input type="text" class="form-control" id="limit" name="limit" type="number" placeholder="Lượt sử dụng">
                    </div>
                    <div class="form-outline mb-4">
                        <select class="custom-select" id="vtype" name="vtype">
                            <option selected value="">Chọn...</option>
                            <option value="0">VPS</option>
                            <option value="1">Domain</option>
                            <option value="2">Hosting</option>
                            <option value="3">Minecraft Hosting</option>
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
            var modalTarget = '#edit_Voucher';
            
            // Chuyển hướng _GET
            window.location.href = editUrl;

            // Mở modal
            $(modalTarget).modal('show');
        });
    });
</script>
<?php require_once $admin_controller . '/voucher.php' ?>
<?php
require_once "../lib/private/foot.php";
