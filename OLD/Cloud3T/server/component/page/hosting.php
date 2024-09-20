<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/modules/config.php') ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/server/component/page/head.php') ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/server/component/page/nav.php') ?>

<title><?= $setting['Title'] ?> - Hosting</title>
<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
    <div class="content flex-row-fluid" id="kt_content">

        <div class="card card-page">

            <div class="card-body">
                <div class="row">
                    <?php foreach ($KNCMS->get_list("SELECT * FROM `hosting`") as $hst) { ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="card card-pricing ">
                                <h6 class="card-category"></h6>
                                <center>
                                    <div class="card-body">
                                        <h3 class="card-title"><?= $hst['title'] ?></h3>
                                        <p class="card-description">Giá <?= $KNCMS->format_cash(ceil($hst['price'])) ?>vnđ/30 ngày
                                            <br><b>Free Antiddos</b>
                                            <br>
                                            <?= $hst['content'] ?>
                                            <br>
                                            <a href="<?= hUrl('Cart/Hosting/' . $hst['id']) ?>" class="btn btn-success my-2">
                                                <i class="fa-solid fa-cart-shopping"></i> Buy
                                            </a>
                                        </p>
                                    </div>
                                </center>
                            </div>
                        </div>
                    <?php } ?>
                </div>

            </div>

        </div>

    </div>

</div>




<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/server/component/page/footer.php') ?>