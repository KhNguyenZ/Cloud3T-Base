<?php require_once "../../../modules/config.php";
require_once "../lib/private/head.php";
require_once "../lib/private/nav.php"; ?>

<title>Website Panel</title>
<section class="col-lg-12 connectedSortable">
    <div class="card card-primary card-outline">
        <div class="card-header ">
            <h3 class="card-title">
                <i class="fas fa-history mr-1"></i>
                Quản Lí Website
            </h3>
            <div class="card-tools">
                <button type="button" class="btn bg-success btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn bg-warning btn-sm" data-card-widget="maximize"><i class="fas fa-expand"></i>
                </button>
                <button type="button" class="btn bg-danger btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <label>Logo (*)</label>
                            <input type="text" class="form-control" value="<?= $setting['Logo'] ?>" name="Logo" required>
                        </div>
                        <div class="form-group">
                            <label>Tên Website (*)</label>
                            <input type="text" class="form-control" value="<?= $setting['Title'] ?>" name="Title">
                        </div>
                        <div class="form-group">
                            <label>Chủ (*)</label>
                            <input type="text" class="form-control" value="<?= $setting['Owner'] ?>" name="Owner">
                        </div>
                        <div class="form-group">
                            <label>Fav (*)</label>
                            <input type="text" class="form-control" value="<?= $setting['Fav'] ?>" name="Fav">
                        </div>
                        <div class="form-group">
                            <label>Copyright (*)</label>
                            <input type="text" class="form-control" value="<?= $setting['Copyright'] ?>" name="Copyright">
                        </div>
                        <div class="form-group">
                            <label>API Key - Lấy API tại <a href="https://doithe1s.vn">DOITHE1S.VN</a> (*)</label>
                            <input type="text" class="form-control" value="<?= $setting['APIKey'] ?>" name="APIKey">
                        </div>
                        <div class="form-group">
                            <label>API ID - Lấy API tại <a href="https://doithe1s.vn">DOITHE1S.VN</a> (*)</label>
                            <input type="text" class="form-control" value="<?= $setting['APIID'] ?>" name="APIID">
                        </div>
                        <div class="form-group">
                            <label>Nội dung thông báo</label>
                            <textarea id="notify" name="notify" style="width: 100%; height: 200px;"><?= base64_decode($setting['ThongBao'])?></textarea>
                        </div>
                        <button name="btnSaveSetting" aria-label="" class="btn btn-primary btn-block" type="submit"><i class="fas fa-save mr-1"></i>Lưu Ngay</button>
                    </div>
            </form>
            <?php require_once "../controller/setting.php"; ?>
        </div>
    </div>
</section>
<?php require_once('../lib/private/foot.php') ?>