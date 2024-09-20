<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/modules/config.php') ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/server/component/page/head.php') ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/server/component/page/nav.php') ?>
<?php if (!isLogin()) $KNCMS->msg_warning('Bạn chưa đăng nhập', hUrl('Auth/Login'), 1000); ?>
<title><?=$setting['Title']?> - Trang nạp thẻ</title>
<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">

    <div class="content flex-row-fluid" id="kt_content">

        <div class="card card-page">

            <div class="card-body">
                <div class="row">
                    <div class="row">
                        <form method="POST">
                            <div class="input-group mb-3 row">
                                <label class="col-md-3 col-form-label">Loại thẻ</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="telco">
                                        <option value="">-- Chọn loại thẻ --</option>
                                        <option value="VNMOBI" style="color: green;">VIETNAMOBILE</option>
                                        <option value="VINAPHONE" style="color: green;">VINA</option>
                                        <option value="MOBIFONE" style="color: red;">MOBIFONE (xử lý chậm)</option>
                                        <option value="VIETTEL" style="color: green;">VIETTEL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="input-group mb-3 row">
                                <label class="col-md-3 col-form-label">Mệnh giá</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="amount">
                                        <option value="">-- Chọn mệnh giá --</option>
                                        <option value="10000">10.000 vnđ</option>
                                        <option value="20000">20.000 vnđ</option>
                                        <option value="30000">30.000 vnđ</option>
                                        <option value="50000">50.000 vnđ</option>
                                        <option value="100000">100.000 vnđ</option>
                                        <option value="200000">200.000 vnđ</option>
                                        <option value="300000">300.000 vnđ</option>
                                        <option value="500000">500.000 vnđ</option>
                                        <option value="1000000">1.000.000 vnđ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="input-group mb-3 row">
                                <label for="example-text-input" class="col-md-3 col-form-label">Số sê-ri</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" name="serial" />
                                </div>
                            </div>
                            <div class="input-group mb-3 row">
                                <label for="example-text-input" class="col-md-3 col-form-label">Mã thẻ</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" name="code" />
                                </div>
                            </div>
                            <div class="input-group mb-3 row" style="float: right;">
                                <button class="btn btn-success" name="KNCMSSendCard">Gửi thẻ</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
        <div class="card card-page">

            <div class="card-body">
                <div class="row">
                    <div class="row">
                        <table class="table align-middle table-row-bordered table-row-solid gy-4 gs-9">
                            <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                                <tr>
                                    <th>Loại</th>
                                    <th>Số tiền</th>
                                    <th>Mã thẻ</th>
                                    <th>Serial</th>
                                    <th>Thời gian nạp</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($KNCMS->get_list("SELECT * FROM `users_napthe` WHERE `uid` = " . $KNCMS->getUser($_SESSION['username'])['id']) as $naptien_sv) { ?>
                                    <tr>
                                        <td>
                                            <?= $naptien_sv['type'] ?>
                                        </td>
                                        <td>
                                            <?= $naptien_sv['code'] ?>
                                        </td>
                                        <td>
                                            <?= $naptien_sv['serial'] ?>
                                        </td>
                                        <td>
                                            <?= $KNCMS->format_cash($naptien_sv['amount']) ?>
                                        </td>
                                        <td>
                                            <?= $naptien_sv['createdtime'] ?>
                                        </td>
                                        <td>
                                            <?= GetCardStatus($naptien_sv['status']) ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <?php require_once $client_controller . '/user/naptien.php' ?>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/server/component/page/footer.php') ?>