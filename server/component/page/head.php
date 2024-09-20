<!DOCTYPE html>
<html lang="en">


<head>
	<base href="">
	<!-- <title>SSA-RP</title> -->
	<meta name="description" content="VPS, Server, Hosting giá rẻ chất lượng chỉ có tại 'Cloud 3 Thằng'.com" />
	<meta name="keywords" content="VPS, Hosting, Server, Domain , Antiddos . Máy chủ đặt tại VN. Tốc độ load cực kì cao" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta charset="utf-8" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="article" />
	<meta property="og:title" content="VPS, Server, Hosting giá rẻ chất lượng" />
	<meta property="og:url" content="<?=$base_url?>" />
	<meta property="og:site_name" content="Cloud3T.COM - Dịch vụ chất lượng" />
	<link rel="shortcut icon" href="<?=$setting['Fav']?>" />
	<link href="<?= $base_url ?>dist/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
	<link href="<?= $base_url ?>dist/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="<?= $base_url ?>dist/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />

	<link href="<?= $base_url ?>dist/assets/plugins/global/plugins.dark.bundle.css" rel="stylesheet" type="text/css" />
	<link href="<?= $base_url ?>dist/assets/css/style.dark.bundle.css" rel="stylesheet" type="text/css" />

	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.8/sweetalert2.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet" type="text/css" />
</head>

<script>
	document.addEventListener('DOMContentLoaded', function() {
		var menuItem = document.getElementById('dashboard-nav');
		var url = '<?=hUrl('Home')?>';
		menuItem.addEventListener('click', function() {
			window.location.href = url;
		});
	});
	document.addEventListener('DOMContentLoaded', function() {
		var menuItem = document.getElementById('contact-nav');
		var url = 'https://www.facebook.com/KhNguyenZ.Dev';
		menuItem.addEventListener('click', function() {
			window.location.href = url;
		});
	});

</script>

<body id="kt_body" style="background-image: url(<?= $base_url ?>dist/assets/media/patterns/header-bg.png)" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled dark-mode">

	<div class="d-flex flex-column flex-root">

		<div class="page d-flex flex-row flex-column-fluid">

			<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">

				<div id="kt_header" class="header align-items-stretch" data-kt-sticky="true" data-kt-sticky-name="header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">

					<div class="container-xxl d-flex align-items-center">

						<div class="d-flex align-items-center d-lg-none ms-n2 me-3" title="Show aside menu">
							<div class="btn btn-icon btn-custom w-30px h-30px w-md-40px h-md-40px" id="kt_header_menu_mobile_toggle">

								<span class="svg-icon svg-icon-2x">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
										<path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black" />
										<path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black" />
									</svg>
								</span>

							</div>
						</div>


						<div class="header-logo me-5 me-md-10 flex-grow-1 flex-lg-grow-0">
							<a href="../dist/index.html">
								<img alt="Logo" src="<?=$setting['Logo']?>" class="h-100px h-lg-100px" />
								<img alt="Logo" src="<?=$setting['Logo']?>" class="h-100px h-lg-100px logo-sticky" />
							</a>
						</div>