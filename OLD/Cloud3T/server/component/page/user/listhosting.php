<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/modules/config.php') ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/server/component/page/head.php') ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/server/component/page/nav.php') ?>
<title><?= $setting['Title'] ?> - Trang Quản Lí Hosting Đã Mua</title>

<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">

    <div class="content flex-row-fluid" id="kt_content">

        <div class="card card-page">

            <div class="card-body">
                <div class="row">
                    <div class="card-header">
                        <div class="card-title">
                            <h3>Danh sách Hosting đã mua</h3>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-middle table-row-bordered table-row-solid gy-4 gs-9">
                            <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                                <tr>
                                    <th class="min-w-250px">Hosting</th>
                                    <th class="min-w-100px">Thời gian mua</th>
                                    <th class="min-w-100px">Hết hạn</th>
                                    <th class="min-w-100px">Gói</th>
                                    <th class="min-w-150px">Trạng thái</th>
                                    <th class="min-w-150px">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody class="fw-6 fw-semibold text-gray-600">
                                <?php foreach ($KNCMS->get_list("SELECT * FROM `user_hosting` WHERE `uid` = " . $KNCMS->getUser($_SESSION['username'])['id']) as $hosting_sv) { ?>
                                    <tr>
                                        <td>
                                            <a href="#" class="text-hover-primary text-gray-600"><?= $hosting_sv['domain'] ?></a>
                                        </td>
                                        <td>
                                            <?= $hosting_sv['createdtime'] ?>
                                        </td>
                                        <td>
                                            <?= $hosting_sv['expiredtime'] ?>
                                        </td>
                                        <td>
                                            <?= $hosting_sv['plan'] ?>
                                        </td>
                                        <td>
                                            <?= GetHostingStatus($hosting_sv['status']) ?>
                                        </td>
                                        <td>
                                            <a class="btn btn-success my-2 btn-lg" href="<?= hUrl('User/Manage/Hosting/' . $hosting_sv['id']) ?>">
                                                <i class="fa-solid fa-pen"></i></i>Thao tác</button>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>




<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/server/component/page/footer.php') ?>