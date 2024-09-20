<div class="d-flex align-items-center ms-1 ms-lg-3">

    <div class="btn btn-icon btn-custom btn-active-light position-relative w-30px h-30px w-md-40px h-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">

        <span class="svg-icon svg-icon-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z" fill="black" />
                <path d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z" fill="black" />
                <path opacity="0.3" d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z" fill="black" />
                <path opacity="0.3" d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z" fill="black" />
            </svg>
        </span>

    </div>
    <?php if (isLogin()) { ?>
        <div class="menu menu-sub menu-sub-dropdown menu-column w-350px w-lg-375px" data-kt-menu="true">

            <div class="d-flex flex-column bgi-no-repeat rounded-top" style="background-image:url('<?= $base_url ?>dist/assets/media/patterns/header-bg.png')">

                <h3 class="text-white fw-bold px-9 mt-10 mb-6">Thông báo
                </h3>


                <ul class="nav nav-line-tabs nav-line-tabs-2x nav-stretch fw-bold px-9">
                    <li class="nav-item">
                        <a class="nav-link text-white opacity-75 opacity-state-100 pb-4 active" data-bs-toggle="tab" href="#kt_topbar_notifications_1">Alerts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white opacity-75 opacity-state-100 pb-4" data-bs-toggle="tab" href="#kt_topbar_notifications_3">Logs</a>
                    </li>
                </ul>

            </div>


            <div class="tab-content">

                <div class="tab-pane fade show active" id="kt_topbar_notifications_1" role="tabpanel">

                    <div class="scroll-y mh-325px my-5 px-8">

                        <div class="d-flex flex-stack py-4">

                            <div class="d-flex align-items-center">

                                <div class="symbol symbol-35px me-4">
                                    <span class="symbol-label bg-light-primary">

                                        <span class="svg-icon svg-icon-2 svg-icon-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" d="M11 6.5C11 9 9 11 6.5 11C4 11 2 9 2 6.5C2 4 4 2 6.5 2C9 2 11 4 11 6.5ZM17.5 2C15 2 13 4 13 6.5C13 9 15 11 17.5 11C20 11 22 9 22 6.5C22 4 20 2 17.5 2ZM6.5 13C4 13 2 15 2 17.5C2 20 4 22 6.5 22C9 22 11 20 11 17.5C11 15 9 13 6.5 13ZM17.5 13C15 13 13 15 13 17.5C13 20 15 22 17.5 22C20 22 22 20 22 17.5C22 15 20 13 17.5 13Z" fill="black" />
                                                <path d="M17.5 16C17.5 16 17.4 16 17.5 16L16.7 15.3C16.1 14.7 15.7 13.9 15.6 13.1C15.5 12.4 15.5 11.6 15.6 10.8C15.7 9.99999 16.1 9.19998 16.7 8.59998L17.4 7.90002H17.5C18.3 7.90002 19 7.20002 19 6.40002C19 5.60002 18.3 4.90002 17.5 4.90002C16.7 4.90002 16 5.60002 16 6.40002V6.5L15.3 7.20001C14.7 7.80001 13.9 8.19999 13.1 8.29999C12.4 8.39999 11.6 8.39999 10.8 8.29999C9.99999 8.19999 9.20001 7.80001 8.60001 7.20001L7.89999 6.5V6.40002C7.89999 5.60002 7.19999 4.90002 6.39999 4.90002C5.59999 4.90002 4.89999 5.60002 4.89999 6.40002C4.89999 7.20002 5.59999 7.90002 6.39999 7.90002H6.5L7.20001 8.59998C7.80001 9.19998 8.19999 9.99999 8.29999 10.8C8.39999 11.5 8.39999 12.3 8.29999 13.1C8.19999 13.9 7.80001 14.7 7.20001 15.3L6.5 16H6.39999C5.59999 16 4.89999 16.7 4.89999 17.5C4.89999 18.3 5.59999 19 6.39999 19C7.19999 19 7.89999 18.3 7.89999 17.5V17.4L8.60001 16.7C9.20001 16.1 9.99999 15.7 10.8 15.6C11.5 15.5 12.3 15.5 13.1 15.6C13.9 15.7 14.7 16.1 15.3 16.7L16 17.4V17.5C16 18.3 16.7 19 17.5 19C18.3 19 19 18.3 19 17.5C19 16.7 18.3 16 17.5 16Z" fill="black" />
                                            </svg>
                                        </span>

                                    </span>
                                </div>


                                <div class="mb-0 me-2">
                                    <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bolder">Chào mừng bạn đến với website của tôi</a>
                                    <div class="text-gray-400 fs-7">Administrator</div>
                                </div>

                            </div>


                            <span class="badge badge-light fs-8">1 phut truoc</span>

                        </div>
                    </div>


                    <div class="py-3 text-center border-top">
                        <a href="../dist/account/activity.html" class="btn btn-color-gray-600 btn-active-color-primary">View All

                            <span class="svg-icon svg-icon-5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="black" />
                                    <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="black" />
                                </svg>
                            </span>
                        </a>
                    </div>

                </div>
                <div class="tab-pane fade" id="kt_topbar_notifications_3" role="tabpanel">

                    <div class="scroll-y mh-325px my-5 px-8">

                        <?php foreach ($KNCMS->get_list("SELECT * FROM `log` WHERE `uid` = '$uid' ORDER BY id DESC LIMIT 10") as $log) { ?>
                            <div class="d-flex flex-stack py-4">
                                <div class="d-flex align-items-center me-2">

                                    <span class="w-70px badge badge-light-success me-4">Order</span>
                                    <a href="#" class="text-gray-800 text-hover-primary fw-bold"><?= $log['log'] ?></a>

                                </div>


                                <span class="badge badge-light fs-8"><?= $log['createdtime'] ?></span>

                            </div>
                        <?php } ?>
                    </div>
                </div>

            </div>

        </div>
    <?php } ?>

</div>

<?php if (isLogin()) { ?>
    <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">

        <div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
            <div class="symbol symbol-35px me-5">
                <div class="symbol-label fs-2 fw-semibold bg-dark text-inverse-dark">T</div>
            </div>
            <?= $KNCMS->getUser($_SESSION['username'])['Username'] ?>
        </div>

        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">

            <div class="menu-item px-3">
                <div class="menu-content d-flex align-items-center px-3">
                    <div class="symbol symbol-50px me-5">
                        <div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                            <div class="symbol symbol-35px me-5">
                                <div class="symbol-label fs-2 fw-semibold bg-dark text-inverse-dark">T</div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column">
                        <div class="fw-bolder d-flex align-items-center fs-5"><?= $KNCMS->getUser($_SESSION['username'])['Username'] ?>
                        <span class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2"><?=capbac($KNCMS->getUser($_SESSION['username'])['Level'])?></span>
                        </div>
                        <a href="#" class="fw-bold text-muted text-hover-primary fs-7"><?= $KNCMS->getUser($_SESSION['username'])['Email'] ?></a>
                        <a href="#" class="fw-bold text-muted text-hover-primary fs-7"><?= $KNCMS->format_cash($KNCMS->getUser($_SESSION['username'])['Cash']) ?>vnđ</a>
                    </div>

                </div>
            </div>


            <div class="separator my-2"></div>


            <!-- <div class="menu-item px-5">
                <a href="../dist/account/overview.html" class="menu-link px-5">My Profile</a>
            </div>


            <div class="menu-item px-5">
                <a href="../dist/account/activity.html" class="menu-link px-5">My Activities</a>
            </div>


            <div class="separator my-2"></div>



            <div class="menu-item px-5 my-1">
                <a href="#" class="menu-link px-5">Account Settings</a>
            </div>
 -->

            <div class="menu-item px-5">
                <a href="<?=hUrl('Auth/Logout')?>" class="menu-link px-5">Sign Out</a>
            </div>


            <div class="separator my-2"></div>
        </div>


    </div>

<?php } else { ?>
    <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">

        <div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
            <img alt="Pic" src="https://preview.keenthemes.com/ceres-html-pro/assets/media/avatars/300-1.jpg" />
        </div>

        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">

            <div class="menu-item px-3">
                <div class="menu-content d-flex align-items-center px-3">

                    <div class="symbol symbol-50px me-5">
                        <img alt="Logo" src="https://preview.keenthemes.com/ceres-html-pro/assets/media/avatars/300-1.jpg" />
                    </div>


                    <div class="d-flex flex-column">
                        <div class="fw-bolder d-flex align-items-center fs-5">Chưa đăng nhập
                            <span class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">Underfine</span>
                        </div>
                        <a href="#" class="fw-bold text-muted text-hover-primary fs-7">player@ssa.com</a>
                    </div>

                </div>
            </div>


            <div class="separator my-2"></div>


            <div class="menu-item px-5">
                <a href="<?= hUrl('Auth/Login') ?>" class="menu-link px-5">Login</a>
            </div>


            <div class="menu-item px-5">
                <a href="<?= hUrl('Auth/Register') ?>" class="menu-link px-5">Register</a>
            </div>

            <div class="separator my-2"></div>
        </div>


    </div>
<?php } ?>

