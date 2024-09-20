<?php require_once "../../../modules/config.php";
require_once "../lib/private/head.php";
require_once "../lib/private/nav.php"; ?>
<?php if (isset($_GET['id'])) {
    if (!check_rows('users', 'id', $_GET['id'])) $KNCMS->msg_error("Không tìm thấy người dùng này!", hUrl('Control/ListUser'), 1000);
    $eid = $_GET['id'];
    $einfo = $KNCMS->query("SELECT * FROM `users` WHERE `id` = '$eid'")->fetch_array();

    $total_hosting = mysqli_fetch_assoc($KNCMS->query("SELECT COUNT(*) FROM `user_hosting` WHERE `uid` = '$eid' "))['COUNT(*)'];
    $total_domain = mysqli_fetch_assoc($KNCMS->query("SELECT COUNT(*) FROM `user_domains` WHERE `user` = '$eid' "))['COUNT(*)'];
?>
    <title>Edit User</title>
    <section class="col-lg-12 connectedSortable">
        <div class="card card-primary card-outline">
            <div class="card-header ">
                <h3 class="card-title">
                    <i class="fas fa-history mr-1"></i>
                    Quản Lí Website
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
                <form action="" method="POST">
                    <div class="card-body">
                        <div class="form-group">
                            <div class="form-group">
                                <label>Tên (*)</label>
                                <input type="text" class="form-control" value="<?= $einfo['Username'] ?>" name="username" required>
                            </div>
                            <div class="form-group">
                                <label>Password (*) - Nhập mật khẩu hệ thống sẽ tự động mã hóa</label>
                                <input type="text" class="form-control" value="<?=$einfo['Passwors']?>" name="password" required>
                            </div>
                            <div class="form-group">
                                <label>Email (*)</label>
                                <input type="text" class="form-control" value="<?= $einfo['Email'] ?>" name="email" required>
                            </div>
                            <div class="form-group">
                                <label>Cấp bậc</label>
                                <div class="form-outline mb-4">
                                    <select class="custom-select" id="capbac" name="capbac">
                                        <?php
                                        $level = $einfo['Level'];
                                        $select_role = '<option value="' . $level . '" select>' . capbac($level) . '</option>';
                                        echo $select_role;
                                        for ($i = 1; $i < 4; $i++) {
                                            if ($i != $level) {
                                                $select_role = '<option value="' . $i . '">' . capbac($i) . '</option>';
                                                echo $select_role;
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Lần cuối đăng nhập</label>
                                <input type="text" class="form-control" value="<?= $einfo['LastLogin'] ?>" name="Logo" disabled>
                            </div>
                            <div class="form-group">
                                <label>Tiền</label>
                                <input type="text" class="form-control" value="<?= $einfo['Cash'] ?>" name="Logo" disabled>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <label>Tổng số domain đang sở hữu</label>
                                    <input type="text" class="form-control" value="<?= $total_domain ?>" name="Logo" disabled>
                                </div>
                                <div class="col">
                                    <label>Tổng số hosting đang sở hữu</label>
                                    <input type="text" class="form-control" value="<?= $total_hosting ?>" name="Logo" disabled>
                                </div>
                            </div>
                            <br><br><br>
                            <button name="btnEditUser" aria-label="" class="btn btn-primary btn-block" type="submit" value="<?= $eid ?>"><i class="fas fa-save mr-1"></i>Lưu Ngay</button>
                        </div>
                </form>
            </div>
        </div>
    </section>
    <section class="col-lg-12 connectedSortable">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Cộng tiền</h3>
                    </div>
                    <form method="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số tiền</label>
                                <input type="number" id="amount" name="amount" class="form-control" placeholder="Số tiền">
                                <input type="text" id="reason" name="reason" class="form-control" placeholder="Lý do">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" id="congtien" name="congtien" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Trừ tiền</h3>
                    </div>
                    <form method="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số tiền</label>
                                <input type="number" id="amount" name="amount" class="form-control" placeholder="Số tiền">
                                <input type="text" id="reason" name="reason" class="form-control" placeholder="Lý do">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" id="trutien" name="trutien" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="col-lg-12 connectedSortable">
        <div class="card card-primary card-outline">
            <div class="card-header ">
                <h3 class="card-title">
                    <i class="fas fa-history mr-1"></i>
                    Lịch sử người dùng
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
                                <th>Nội dung</th>
                                <th>Thời gian</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($KNCMS->get_list("SELECT * FROM `log` WHERE `uid` = '$eid' ORDER BY id desc") as $row) {
                                $i++;
                            ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $row['log'] ?></td>
                                    <td><?= $row['createdtime'] ?></td>
                                </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
<?php require_once "../controller/edituser.php"; ?>
<?php require_once('../lib/private/foot.php') ?>