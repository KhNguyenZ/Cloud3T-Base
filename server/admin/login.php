<?php require_once('../../modules/config.php'); 
$login_page = 1;
require_once('lib/private/head.php');
?>
<center>
    <section class="col-lg-12 connectedSortable">
        <div class="login-box">
            <div class="login-logo">
                <a href=""><b><?= $setting['Title'] ?></b></a>
            </div>

            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Đăng nhập quản trị website</p>
                    <form method="post">
                        <div class="input-group mb-3">
                            <input type="text" id="username" name="username" class="form-control" placeholder="Username">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-4">
                                <button type="submit" id="admin_login" name="admin_login" class="btn btn-primary btn-block">Sign In</button>
                            </div>

                        </div>
                    </form>
                    <?php require_once $admin_controller . '/login.php' ?>
                </div>
            </div>
        </div>
    </section>
</center>
<?php require_once('lib/private/foot.php') ?>