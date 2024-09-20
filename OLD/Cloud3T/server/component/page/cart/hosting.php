<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/modules/config.php') ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/server/component/page/head.php') ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/server/component/page/nav.php') ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/api/hosting/buyhosting.php') ?>
<?php
if (!isLogin()) $KNCMS->msg_warning("Bạn chưa đăng nhập", hUrl('Auth/Login'), 1000);
if (isset($_GET['hid'])) {
    if (check_rows('hosting', 'id', $_GET['hid'])) {
        $hid = $_GET['hid'];
        $hinfo = $KNCMS->query("SELECT * FROM `hosting` WHERE `id` = '$hid'")->fetch_array();
    } else $KNCMS->msg_warning("Không tìm thấy đơn hàng này !", hUrl('Home'), 1000);
}
?>
<title><?=$setting['Title']?> - Trang Thanh Toán Hosting</title>
<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">

    <div class="content flex-row-fluid" id="kt_content">

        <div class="card card-page">

            <div class="card-body">
                <div class="row">
                    <div class="col-lg-7">

                        <h3 class="mb-2">Thanh toán</h3>
                        <p class="fs-6 text-gray-600 fw-semibold mb-6 mb-lg-15">Bạn sẽ nhận được đơn hàng ngay sau khi thanh toán thành công !</p>

                        <div class="row">

                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $hinfo['title'] ?></h5>
                                    <div class="fs-5 mb-2">
                                        <span class="text-gray-800 fw-bold me-1"><?= $KNCMS->format_cash($hinfo['price']) ?>vnđ</span>
                                        <span class="text-gray-600 fw-semibold">/ 1 tháng</span>
                                    </div>

                                    <div class="fs-6 text-gray-600 fw-semibold">
                                        Free antiddos đi kèm chỉ hỗ trợ khoảng 200 RealReq/s đổ lại.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <form method="post">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Bạn chắc chắn muốn mua nó?</h5>
                                        <div class="fs-5 mb-2">
                                            <span class="text-gray-800 fw-bold me-1">Chuyển tên miền có dấu sang không dấu <a href="https://www.punycoder.com/">tại đây</a></span>
                                        </div>

                                        <div class="fs-6 text-gray-600 fw-semibold">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="domain" name="domain" placeholder="Nhập tên miền vào đây">
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="voucher" name="voucher" placeholder="Nhập mã voucher nếu có">
                                            </div>
                                        </div>
                                        <button type="submit" id="buyhosting" name="buyhosting" value="<?= $_GET['hid'] ?>" class="btn btn-success my-2 btn-lg">
                                            <i class="fa-solid fa-cart-shopping"></i>Buy</button>
                                        <button type="submit" id="buyhosting" name="buyhosting" class="btn btn-danger my-2 btn-lg">
                                            <i class="fa-solid fa-ban"></i></i>Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

            </div>

        </div>
        <?php require_once $client_controller . '/hosting/buy.php' ?>
    </div>

</div>


<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/server/component/page/footer.php') ?>