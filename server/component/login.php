<!DOCTYPE html>
<?php require_once('../../modules/config.php') ?>
<html lang="en">

<head>
<title><?=$setting['Title']?> - Login</title>
    <meta charset="utf-8" />
    <meta name="description" content="Ceres admin dashboard live demo. Check out all the features of the admin panel. A large number of settings, additional services and widgets." />
    <meta name="keywords" content="Ceres theme, bootstrap, bootstrap 5, admin themes, free admin themes, bootstrap admin, bootstrap dashboard" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Ceres HTML Pro- Bootstrap 5 HTML Multipurpose Admin Dashboard Theme - Ceres HTML Free by KeenThemes" />
    <meta property="og:url" content="https://keenthemes.com/products/ceres-html-pro" />
    <meta property="og:site_name" content="Ceres HTML Free by Keenthemes" />
    <link rel="canonical" href="https://preview.keenthemes.com/ceres-html-pro" />
    <link rel="shortcut icon" href="/ceres-html-free/assets/media/logos/favicon.ico" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" /> 

    <link href="<?=$base_url?>server/component/css/auth.css" rel="stylesheet" type="text/css" />
    <link href="<?=$base_url?>server/component/css/khnguyenz.css" rel="stylesheet" type="text/css" />
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-37564768-1"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.8/sweetalert2.min.js"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-37564768-1');
    </script>
    
    <script>
        // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking)
        if (window.top != window.self) {
            window.top.location.replace(window.self.location.href);
        }
    </script>
</head>


<body id="kt_body" class="auth-bg">
<?php if(isLogin()) $KNCMS->msg_warning("Bạn đã đăng nhập rồi , không thể thao tác chức năng này nữa !", hUrl('Home'), 1000);?>
    <script>
        var defaultThemeMode = "light";
        var themeMode;

        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }

            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }

            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    
    
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    

    
    <div class="d-flex flex-column flex-root">
        

        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed auth-page-bg">
            
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                
                <a href="" >
                    <img alt="Logo" src="<?=$setting['Logo']?>" class="h-400px theme-light-show" />
                    <img alt="Logo" src="<?=$setting['Logo']?>" class="h-400px theme-dark-show" />
                </a>

                <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">

                    
                    <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" data-kt-redirect-url="/ceres-html-free/index.html" action="#" method="POST">
                        
                        <div class="text-center mb-10">
                            
                            <h1 class="text-dark mb-3">
                                Đăng nhập </h1>
                            

                            
                            <div class="text-gray-400 fw-semibold fs-4">
                                Bạn không có tài khoản ư?

                                <a href="<?=hUrl('Auth/Register')?>" class="link-primary fw-bold">
                                    Tạo tài khoản
                                </a>
                            </div>
                            
                        </div>
                        

                        
                        <div class="fv-row mb-10">
                            
                            <label class="form-label fs-6 fw-bold text-dark">Tên đăng nhập</label>
                            

                            
                            <input class="form-control form-control-lg form-control-solid" type="text" name="username" id="username" autocomplete="off" />
                            
                        </div>
                        

                        
                        <div class="fv-row mb-10">
                            
                            <div class="d-flex flex-stack mb-2">
                                
                                <label class="form-label fw-bold text-dark fs-6 mb-0">Mật khẩu</label>
                                

                                
                                <a href="/ceres-html-free/authentication/sign-in/password-reset.html" class="link-primary fs-6 fw-bold">
                                    Quên mật khẩu ?
                                </a>
                                
                            </div>
                            <input class="form-control form-control-lg form-control-solid" type="password" name="password" id="password" autocomplete="off" />
                            
                        </div>
                        <div class="text-center">
                            
                            <button type="submit" name="login" id="login" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                                <span class="indicator-label">
                                    Continue
                                </span>

                                <span class="indicator-progress">
                                    Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                        </div>
                        <?php include('../controller/auth/login.php') ?>
                    </form>
                    
                </div>
                
            </div>
        </div>
        
    </div>

</body>

</html>