<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/modules/config.php') ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/server/component/page/head.php') ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/server/component/page/nav.php') ?>
<title><?= $setting['Title'] ?> - Trang Quản Lí Tên Miền Đã Mua</title>

<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">

    <div class="content flex-row-fluid" id="kt_content">

        <div class="card card-page">

            <div class="card-body">
                <div class="row">
                    <div class="card-header">
                        <div class="card-title">
                            <h3>Danh sách tên miền đã mua</h3>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-middle table-row-bordered table-row-solid gy-4 gs-9">
                            <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                                <tr>
                                    <th class="min-w-250px">Tên miền</th>
                                    <th class="min-w-100px">Thời gian mua</th>
                                    <th class="min-w-100px">Hết hạn</th>
                                    <th class="min-w-100px">Loại</th>
                                    <th class="min-w-150px">Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody class="fw-6 fw-semibold text-gray-600">
                                <?php foreach ($KNCMS->get_list("SELECT * FROM `user_domains` WHERE `user` = " . $KNCMS->getUser($_SESSION['username'])['id']) as $domain_sv) { ?>
                                    <tr>
                                        <td>
                                            <a href="#" class="text-hover-primary text-gray-600"><?= $domain_sv['domain'] ?></a>
                                        </td>
                                        <td>
                                            <?= $domain_sv['buytime'] ?>
                                        </td>
                                        <td>
                                            <?= $domain_sv['time'] ?>
                                        </td>
                                        <td><?php if ($domain_sv['type'] == 0) $typed = 'Chính thống';
                                            else $typed = 'Lậu'; ?><?= $typed ?>
                                        </td>
                                        <td>
                                            <?= GetDomainStatus($domain_sv['status']) ?>
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