<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/modules/config.php') ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/server/component/page/head.php') ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/server/component/page/nav.php') ?>
<?php if (!isLogin()) $KNCMS->msg_warning('Bạn chưa đăng nhập', hUrl('Auth/Login'), 1000); ?>
<title><?=$setting['Title']?> - Trang nạp tiền</title>
<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">

    <div class="content flex-row-fluid" id="kt_content">

        <div class="card card-page">

            <div class="card-body">
                <div class="row">
                    <div class="row">
                        <form method="post">
                            <div class="card">
                                <h5 class="card-title">Nạp ngân hàng (Auto)</h5>
                                <div class="fs-5 mb-2">
                                    <span class="text-gray-800 fw-bold me-1">Nhập số tiền cần nạp</span>
                                </div>

                                <div class="fs-6 text-gray-600 fw-semibold">
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="amount" name="amount" placeholder="Nhập số tiền vào đây">
                                    </div>
                                </div>
                                <button type="submit" id="naptien" name="naptien" value="" class="btn btn-success my-2 btn-lg">
                                    <i class="fa-solid fa-cart-shopping"></i>Nạp</button>
                                <button type="submit" id="" name="" class="btn btn-danger my-2 btn-lg">
                                    <i class="fa-solid fa-ban"></i></i>Cancel</button>
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
                                    <th class="min-w-250px">Số tiền</th>
                                    <th class="min-w-100px">Thời gian nạp</th>
                                    <th class="min-w-100px">Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($KNCMS->get_list("SELECT * FROM `trans_bank` WHERE `uid` = " . $KNCMS->getUser($_SESSION['username'])['id']) as $naptien_sv) { ?>
                                    <tr>
                                        <td>
                                            <?= $KNCMS->format_cash($naptien_sv['sotien'])?>
                                        </td>
                                        <td>
                                            <?= $naptien_sv['createdtime'] ?>
                                        </td>
                                        <td>
                                            <?= GetTransStatus($naptien_sv['status']) ?>
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