<?php require_once('../../modules/config.php'); ?>
<?php require_once('lib/private/head.php') ?>
<?php require_once('lib/private/nav.php');

$total_user = mysqli_fetch_assoc($KNCMS->query("SELECT COUNT(*) FROM `users` "))['COUNT(*)'];
$total_voucher = mysqli_fetch_assoc($KNCMS->query("SELECT COUNT(*) FROM `voucher` "))['COUNT(*)'];
$total_hosting = mysqli_fetch_assoc($KNCMS->query("SELECT COUNT(*) FROM `user_hosting` "))['COUNT(*)'];
$total_domain = mysqli_fetch_assoc($KNCMS->query("SELECT COUNT(*) FROM `domain` "))['COUNT(*)'];
$total_domain_active = mysqli_fetch_assoc($KNCMS->query("SELECT COUNT(*) FROM `user_domains` WHERE `status` = 1"))['COUNT(*)'];
$total_domain_unactive = mysqli_fetch_assoc($KNCMS->query("SELECT COUNT(*) FROM `user_domains` WHERE `status` = 0"))['COUNT(*)'];

$total_host = mysqli_fetch_assoc($KNCMS->query("SELECT COUNT(*) FROM `hosting` "))['COUNT(*)'];
$total_host_active = mysqli_fetch_assoc($KNCMS->query("SELECT COUNT(*) FROM `user_hosting` WHERE `status` = 1"))['COUNT(*)'];
$total_host_unactive = mysqli_fetch_assoc($KNCMS->query("SELECT COUNT(*) FROM `user_hosting` WHERE `status` = 0"))['COUNT(*)'];
?>
<title><?=$setting['Title']?> - Admin Panel</title>
<section class="content">

    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?= $KNCMS->format_cash(143376000) ?></h3>
                        <p>Tổng doanh thu</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?= $total_user ?></h3>
                        <p>Tổng thành viên</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?= $total_voucher ?></h3>
                        <p>Tổng voucher</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?= $total_hosting ?></h3>

                        <p>Hosting đang hoạt động</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?=$total_domain?></h3>

                        <p>Tổng Domain</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?=$total_domain_active?></h3>

                        <p>Tổng Domain đang hoạt động</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?=$total_domain_unactive?></h3>

                        <p>Tổng Domain chưa được duyệt</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?=$total_domain?></h3>

                        <p>Tổng Hosting</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?=$total_host_active?></h3>

                        <p>Tổng Hosting đang hoạt động</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?=$total_hosting_unactive ?? 0?></h3>

                        <p>Tổng Hosting chưa được duyệt</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once('lib/private/foot.php') ?>