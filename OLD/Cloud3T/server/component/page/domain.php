<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/modules/config.php') ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/server/component/page/head.php') ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/server/component/page/nav.php') ?>

<title><?=$setting['Title']?> - Tên Miền</title>
<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">

    <div class="content flex-row-fluid" id="kt_content">

        <div class="card card-page">

            <div class="card-body">
                <div class="row">
                    <div class="card mb-5 mb-lg-10">
                        <div class="card-header">
                            <div class="card-title">
                                <h3>Danh sách tên miền (chính thống)</h3>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table align-middle table-row-bordered table-row-solid gy-4 gs-9">
                                    <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                                        <tr>
                                            <th class="min-w-250px">Tên miền</th>
                                            <th class="min-w-100px">Giá</th>
                                            <th class="min-w-150px">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody class="fw-6 fw-semibold text-gray-600">
                                        <?php foreach($KNCMS->get_list("SELECT * FROM `domain` WHERE `type` = '0'") as $domain_sv) {?>
                                        <tr>
                                            <td>
                                                <a href="#" class="text-hover-primary text-gray-600"><?=$domain_sv['domain']?></a>
                                            </td>

                                            <td>
                                                <span class="badge badge-light-success fs-7 fw-bold"><?=$KNCMS->format_cash($domain_sv['price'])?></span>
                                            </td>

                                            <td>
                                                <a href="<?= hUrl('Cart/Domain/' . $domain_sv['id']) ?>" class="btn btn-success my-2">
                                                    <i class="fa-solid fa-cart-shopping"></i> Buy
                                                </a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-5 mb-lg-10">
                        <div class="card-header">
                            <div class="card-title">
                                <h3>Danh sách tên miền (lậu)</h3>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table align-middle table-row-bordered table-row-solid gy-4 gs-9">
                                    <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                                        <tr>
                                            <th class="min-w-250px">Tên miền</th>
                                            <th class="min-w-100px">Giá</th>
                                            <th class="min-w-150px">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody class="fw-6 fw-semibold text-gray-600">
                                        <?php foreach($KNCMS->get_list("SELECT * FROM `domain` WHERE `type` = '1'") as $domain_sv) {?>
                                        <tr>
                                            <td>
                                                <a href="#" class="text-hover-primary text-gray-600"><?=$domain_sv['domain']?></a>
                                            </td>

                                            <td>
                                                <span class="badge badge-light-success fs-7 fw-bold"><?=$KNCMS->format_cash($domain_sv['price'])?></span>
                                            </td>

                                            <td>
                                                <a href="<?= hUrl('Cart/Domain/' . $domain_sv['id']) ?>" class="btn btn-success my-2">
                                                    <i class="fa-solid fa-cart-shopping"></i> Buy
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

    </div>

</div>




<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/server/component/page/footer.php') ?>