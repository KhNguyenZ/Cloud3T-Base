<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/modules/config.php') ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/server/component/page/head.php') ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/server/component/page/nav.php') ?>
<?php
if (!isLogin()) $KNCMS->msg_warning("Bạn chưa đăng nhập", hUrl('Auth/Login'), 1000);
if (isset($_GET['hid'])) {
    if (check_rows('hosting', 'id', $_GET['hid'])) {
        $hid = $_GET['hid'];
        $hinfo = $KNCMS->query("SELECT * FROM `mc_hosting` WHERE `id` = '$hid'")->fetch_array();
    } else $KNCMS->msg_warning("Không tìm thấy đơn hàng này !", hUrl('Home'), 1000);
}
?>

<title><?= $setting['Title'] ?> - Trang Thanh Toán Minecraft Hosting</title>
<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">

    <div class="content flex-row-fluid" id="kt_content">

        <div class="card card-page">

            <div class="card-body">
                <div class="row">
                    <div class="col-lg-7">

                        <h3 class="mb-2">Thanh toán</h3>
                        <p class="fs-6 text-gray-600 fw-semibold mb-6 mb-lg-15">Bạn sẽ nhận được đơn hàng ngay sau khi thanh toán thành công !</p>

                        <div class="row">
                            <form method="post">
                                <div class="row gy-5 g-xl-8">
                                    <div class="card-body">
                                        <div class="col-xxl-6">
                                        <div class="input-group mb-3">
                                                <div class="row">
                                                    <h5 class="text-gray-800 fw-bold card-title">Mã giảm giá</h5>

                                                    <input type="text" class="form-control" style="width: 1000px;" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="voucher" name="voucher" placeholder="Nhập mã voucher nếu có">
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="row">
                                                    <h5 class="text-gray-800 fw-bold card-title">Tên máy chủ</h5>

                                                    <input type="text" class="form-control" style="width: 1000px;" aria-describedby="inputGroup-sizing-default" id="mc_name" name="mc_name" value="Cloud3T<?= $_SESSION['username'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-6">
                                            <div class="input-group mb-3">
                                                <div class="row">
                                                    <h5 class="text-gray-800 fw-bold card-title">Mô tả máy chủ</h5>

                                                    <input type="text" class="form-control" style="width: 1000px;" aria-describedby="inputGroup-sizing-default" id="mc_des" name="mc_des" value="Cloud3T Hosting - Minecraft Hosting">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-6">
                                            <div class="input-group mb-3">
                                                <div class="row">
                                                    <h5 class="text-gray-800 fw-bold card-title">Server Platform</h5>
                                                    <select id="platform" name="platform" class="form-select fw-semibold w-1000px" data-control="select2" data-placeholder="Status" data-hide-search="true">
                                                        <option value="1"><b>Paper</b> - Tương thích với tất cả các plugin của Bukkit, Spigot. </option>
                                                        <option value="2"><b>Vanilla Minecraft</b> - Phiên bản máy chủ gốc, không có bất kỳ sửa đổi hay plugin nào. Cung cấp trải nghiệm Minecraft "nguyên bản"</option>
                                                        <option value="3"><b>Bungeecord</b> - Phù hợp cho các mạng lưới server lớn với nhiều server con, chẳng hạn như các server mini-game</option>
                                                        <option value="4"><b>Sponge (SpongeVanilla)</b> - Hỗ trợ cả mod và plugin thông qua sự tích hợp với Forge.</option>
                                                        <option value="5"><b>Forge Minecraft</b> - Chỉ hỗ trợ mod, không hỗ trợ plugin</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-6">
                                            <div class="input-group mb-3">
                                                <div class="row">
                                                    <h5 class="text-gray-800 fw-bold card-title">Phiên bản Java</h5>
                                                    <select id="java_ver" name="java_ver" class="form-select fw-semibold w-1000px" data-control="select2" data-placeholder="Status" data-hide-search="true">
                                                        <option value="ghcr.io/pterodactyl/yolks:java_21">Java 21 (ghcr.io/pterodactyl/yolks:java_21)</option>
                                                        <option value="ghcr.io/pterodactyl/yolks:java_16">Java 16 (ghcr.io/pterodactyl/yolks:java_16)</option>
                                                        <option value="ghcr.io/pterodactyl/yolks:java_11">Java 11 (ghcr.io/pterodactyl/yolks:java_11)</option>
                                                        <option value="ghcr.io/pterodactyl/yolks:java_8">Java 8 (ghcr.io/pterodactyl/yolks:java_8)</option>
                                                    </select>
                                                    <span class="text-gray-800 fw-bold card-title"> Sử dụng phiên bản Java mới nhất </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-6">
                                            <div class="input-group mb-3">
                                                <div class="row">
                                                    <h5 class="text-gray-800 fw-bold card-title">Phiên bản</h5>
                                                    <select id="mc_ver" name="mc_ver" class="form-select fw-semibold w-1000px" data-control="select2" data-placeholder="Status" data-hide-search="true">
                                                        <option value="latest" selected>latest</option>
                                                        <option value="1.21">1.21</option>
                                                        <option value="1.20.4">1.20.4</option>
                                                        <option value="1.20">1.20</option>
                                                        <option value="1.19">1.19</option>
                                                        <option value="1.18">1.18</option>
                                                        <option value="1.17">1.17</option>
                                                        <option value="1.16.5">1.16.5</option>
                                                        <option value="1.16">1.16</option>
                                                        <option value="1.15">1.15</option>
                                                        <option value="1.14">1.14</option>
                                                        <option value="1.13">1.13</option>
                                                        <option value="1.12">1.12</option>
                                                        <option value="1.11">1.11</option>
                                                        <option value="1.10.2">1.10.2</option>
                                                        <option value="1.8.9">1.8.9</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-6">
                                            <div class="input-group mb-3">
                                                <div class="row">
                                                    <h5 class="text-gray-800 fw-bold card-title">Startup Command</h5>

                                                    <input type="text" class="form-control" style="width: 1000px;" aria-describedby="inputGroup-sizing-default" id="startup_cmd" name="startup_cmd" value="java -Xms<?= $hinfo['disk'] ?>M -XX:MaxRAMPercentage=95.0 -jar {{SERVER_JARFILE}}">
                                                    <span class="text-gray-800 fw-bold card-title">*CHÚ Ý: Đối với những ai đã hiểu cách vận hành thì hãy chỉnh sửa để hạn chế xảy ra lỗi</span>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" id="buymchost" name="buymchost" value="<?= $_GET['hid'] ?>" class="btn btn-success my-2 btn-lg">
                                            <i class="fa-solid fa-cart-shopping"></i>Buy</button>
                                        <button type="submit" id="" name="" class="btn btn-danger my-2 btn-lg">
                                            <i class="fa-solid fa-ban"></i></i>Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once $client_controller . '/minecraft/buy.php' ?>
</div>

</div>


<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/server/component/page/footer.php') ?>