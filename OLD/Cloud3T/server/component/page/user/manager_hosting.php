<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/modules/config.php') ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/server/component/page/head.php') ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/server/component/page/nav.php') ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/api/hosting/WHM.php') ?>
<?php if (isset($_GET['hid'])) {
    if (!check_rows('user_hosting', 'id', $_GET['hid'])) return $KNCMS->msg_error("Không tìm thấy hosting này !", "", 1000);

    $host = $KNCMS->query("SELECT * FROM `user_hosting` WHERE `id` =" . $_GET['hid'])->fetch_array();
}
?>
<title><?= $setting['Title'] ?> - Trang Quản Lí Hosting Đã Mua</title>
<?php if (!isLogin()) $KNCMS->msg_warning('Bạn chưa đăng nhập', hUrl('Auth/Login'), 1000); ?>
<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">

    <div class="content flex-row-fluid" id="kt_content">

        <div class="card card-page">

            <div class="card-body">
                <div class="row">
                    <div class="card-header">
                        <div class="card-title">
                            <h3>Quản lí hosting</h3>
                        </div>
                    </div>
                    <center>
                        <form method="POST">
                            <button type="submit" id="giahan" name="giahan" value="<?= $_GET['hid'] ?>" class="btn btn-success my-2 btn-lg">
                                Gia hạn
                            </button>
                            <button type="submit" id="forgetpass" name="forgetpass" value="<?= $_GET['hid'] ?>" class="btn btn-info my-2 btn-lg">
                                Đặt lại mật khẩu
                            </button>
                            <!-- <button type="submit" id="resethost" name="resethost" value="<?= $_GET['hid'] ?>" class="btn btn-warning my-2 btn-lg">
                                        Reset host
                                    </button> -->

                        </form>
                        <!-- <button type="submit" id="deleteButton" name="deleteButton" data-hid="<?= $_GET['hid'] ?>" class="btn btn-primary my-2 btn-lg">
                                        Xóa host
                                    </button> 
                                -->
                        <a href="<?= hUrl('User/Hosting/Upgrade/' . $_GET['hid']) ?>" class="btn btn-danger my-2 btn-lg">
                            Nâng cấp
                        </a>
                        <a href="<?= FastLogin($host['user']) ?>" class="btn btn-warning my-2 btn-lg">
                            Login nhanh
                        </a>
                    </center>
                    <div class="fw-bold fs-6 text-gray-800"><b>Quản lí hosting</b></div>
                    <div class="fw-bold fs-6 text-gray-800">Tên miền: <a href="https://<?= $host['domain'] ?>"><?= $host['domain'] ?></a></div>
                    <div class="fw-bold fs-6 text-gray-800">Cpanel login: <a href="https://ns.cloud3t.com:2083">ns.cloud3t.com:2083</a></div>
                    <div class="fw-bold fs-6 text-gray-800">Địa chỉ IP: 103.252.137.101</div>
                    <div class="fw-bold fs-6 text-gray-800">Tài khoản: <?= $host['user'] ?></div>
                    <div class="fw-bold fs-6 text-gray-800">Mật khẩu: <?= $host['pass'] ?></div>
                    <div class="fw-bold fs-6 text-gray-800">ĐỂ AN TOÀN HƠN, BẠN NÊN ĐỔI MẬT KHẨU ĐỂ CHO MẬT KHẨU KHÔNG GIỐNG VỚI TRANG QUẢN LÝ NÀY</div>
                    <div class="fw-bold fs-6 text-gray-800">________________________________________________________________________________________________________</div>
                    <div class="fw-bold fs-6 text-gray-800">Tình trạng: <?= GetHostingStatus($host['status']) ?></div>
                    <div class="fw-bold fs-6 text-gray-800">Ngày mua: <?= $host['createdtime'] ?></div>
                    <div class="fw-bold fs-6 text-gray-800">Ngày hết hạn: <?= $host['expiredtime'] ?></div>
                    <div class="fw-bold fs-6 text-gray-800">Gói: <?= $host['plan'] ?></div>
                </div>
            </div>
        </div>

    </div>


</div>

</div>
</div>
<script>
    document.getElementById('deleteButton').addEventListener('click', function() {
        Swal.fire({
            title: 'Xóa hosting',
            text: "Bạn chắc chắn muốn xóa hosting này chứ? Chúng tôi không có chính sách hoàn tiền khi xóa hosting.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Xóa',
            cancelButtonText: 'Hủy',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= $base_url . 'server/controller/hosting/action.php' ?>',
                    type: 'POST',
                    data: {
                        action: 'deletehost',
                        hid: hid
                    },
                    success: function(response) {
                        if (response.trim() === 'success') {
                            Swal.fire({
                                title: 'Xóa hosting',
                                text: 'Hosting đã được xóa thành công.',
                                icon: 'success'
                            });
                        }
                    },
                    error: function() {
                        Swal.fire(
                            'Error!',
                            'There was a problem deleting the host.',
                            'error'
                        );
                    }
                });
            }
        });
    });
</script>
<?php require_once $client_controller . '/hosting/action.php' ?>a
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/server/component/page/footer.php') ?>