<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/modules/config.php') ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/server/component/page/head.php') ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/server/component/page/nav.php') ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/api/hosting/WHM.php') ?>
<?php
if (!isLogin()) $KNCMS->msg_warning("Bạn chưa đăng nhập", hUrl('Auth/Login'), 1000);
if (isset($_GET['hid'])) {
    if (check_rows('user_hosting', 'id', $_GET['hid'])) {
        $hid = $_GET['hid'];
        $hinfo = $KNCMS->query("SELECT * FROM `user_hosting` WHERE `id` = '$hid'")->fetch_array();
    } else $KNCMS->msg_warning("Không tìm thấy đơn hàng này !", hUrl('Home'), 1000);
}
?>
<title>Trang Thanh Toán Hosting</title>
<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">

    <div class="content flex-row-fluid" id="kt_content">

        <div class="card card-page">

            <div class="card-body">
                <div class="row">
                    <div class="col-lg-7">

                        <h3 class="mb-2">Nâng cấp hosting</h3>

                        <div class="row">

                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Gói hiện tại của hosting <a href="<?= $hinfo['domain'] ?>"><?= $hinfo['domain'] ?></a> là <?= $hinfo['plan'] ?></h5>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <form method="post">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Bạn chắc chắn muốn nâng cấp nó?</h5>
                                        <div class="fs-5 mb-2">
                                            <!-- <span class="text-gray-800 fw-bold me-1">Chuyển tên miền có dấu sang không dấu <a href="https://www.punycoder.com/">tại đây</a></span> -->
                                        </div>

                                        <div class="fs-6 text-gray-600 fw-semibold">
                                            <div class="input-group mb-3">
                                                <select class="form-control" id="upgrade_form" name="upgrade_form">
                                                    <?php foreach ($KNCMS->get_list("SELECT * FROM hosting WHERE `package` != '" . $hinfo['plan'] . "'") as $upgrade) {
                                                        $plan_id = $KNCMS->query("SELECT * FROM `hosting` WHERE `package` = '" . $hinfo['plan'] . "'")->fetch_array()['id'];
                                                        $price = GetHost($plan_id)['price'];
                                                    ?>
                                                        <option value="<?= $upgrade['package'] ?>"> <?= $upgrade['package'] ?> - <?= $KNCMS->format_cash($upgrade['price'] - $price) ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <button type="submit" id="upgrade" name="upgrade" value="<?= $_GET['hid'] ?>" class="btn btn-success my-2 btn-lg">
                                            <i class="fa-solid fa-cart-shopping"></i>Nâng cấp</button>
                                        <button type="submit" class="btn btn-danger my-2 btn-lg">
                                            <i class="fa-solid fa-ban"></i></i>Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

            </div>

        </div>
        <?php require_once $client_controller . '/hosting/action.php' ?>
    </div>

</div>


<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/server/component/page/footer.php') ?>