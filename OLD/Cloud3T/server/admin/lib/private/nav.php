<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?= $base_url ?>" class="nav-link">Trang chủ</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?= $admin_url ?>/" class="nav-link">Trang ADMIN</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
    </ul>
</nav>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?= $admin_url ?>" class="brand-link">
        <img src="<?= $setting['Logo'] ?>" style="width: 150px; height: 150px;display: block;
  margin-left: auto;
  margin-right: auto;" />
        <center>
            <span class="font-weight-light" style="font-size: 12px;">CLOUD3T - WHM</span><br>
            <span class="font-weight-light" style="font-size: 12px;">Founder: KhNguyenZ</span><br>
            <span class="font-weight-light" style="font-size: 12px;">CO-Founder: Dang Fhat & LamDuongMinh</span>
        </center>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <div style="color: white;">
                        <b>Home</b>
                    </div>
                <li class="nav-item">
                    <a href="<?= hUrl('Control') ?>" class="nav-link">
                        <i class="fa-solid fa-house"></i>
                        <p> Home </p>
                    </a>
                </li>
                <div style="color: white;">
                    <b>Danh sách & Quản lí</b>
                </div>
                <li class="nav-item">
                    <a href="<?= hUrl('Control/ListHosting') ?>" class="nav-link">
                        <i class="fa-solid fa-location-dot"></i>
                        <p> Danh sách hosting </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= hUrl('Control/Domain') ?>" class="nav-link">
                        <i class="fa-solid fa-location-dot"></i>
                        <p> Quản lí Domain </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= hUrl('Control/Voucher') ?>" class="nav-link">
                        <i class="fa-solid fa-location-dot"></i>
                        <p> Quản lí Voucher </p>
                    </a>
                </li>
                <div style="color: white;">
                    <b>Đăng</b>
                </div>
                <li class="nav-item">
                    <a href="<?= hUrl('Control/PostHosting') ?>" class="nav-link">
                        <i class="fa-solid fa-location-dot"></i>
                        <p> Đăng gói hosting </p>
                    </a>
                </li>
                <div style="color: white;">
                    <b>Website</b>
                </div>
                <li class="nav-item">
                    <a href="<?= hUrl('Control/Setting') ?>" class="nav-link">
                        <i class="fa-solid fa-location-dot"></i>
                        <p> Cài đặt </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= hUrl('Control/ListUser') ?>" class="nav-link">
                        <i class="fa-solid fa-location-dot"></i>
                        <p> Quản lí User </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"></div>
                <div class="col-sm-6"></div>
            </div>
        </div>
    </div>