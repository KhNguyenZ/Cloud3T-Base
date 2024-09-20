<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/modules/config.php') ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/server/component/page/head.php') ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/server/component/page/nav.php') ?>

<title><?=$setting['Title']?> - Kiểm tra tên miền</title>
<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">

    <div class="content flex-row-fluid" id="kt_content">

        <div class="card card-page">

            <div class="card-body">
                <div class="row">
                    <center>
                        <h1>KIỂM TRA TÊN MIỀN</h1>
                        <form method="post">
                            <div class="fs-6 text-gray-600 fw-semibold">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="domain" name="domain" placeholder="Nhập tên miền vào đây">
                                </div>
                            </div>
                            <button type="submit" id="check" name="check" value="" class="btn btn-success my-2 btn-lg">
                                <i class="fa-solid fa-check"></i></i>Kiểm tra</button>
                        </form>

                        <?php require_once($client_controller.'/domain/whois.php')?>
                    </center>
                </div>

            </div>

        </div>

    </div>

</div>




<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/server/component/page/footer.php') ?>