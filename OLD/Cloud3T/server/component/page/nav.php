<div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">

	<div class="d-flex align-items-stretch" id="kt_header_nav">

		<div class="header-menu align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">

			<div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch" id="#kt_header_menu" data-kt-menu="true">
				<div id="dashboard-nav" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" class="menu-item menu-lg-down-accordion me-lg-1">
					<span class="menu-link py-3">
						<span class="menu-title">Dashboard</span>
						<span class="menu-arrow d-lg-none"></span>
					</span>
				</div>
				<div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" class="menu-item menu-lg-down-accordion me-lg-1">
					<span class="menu-link py-3">
						<span class="menu-title">VPS</span>
						<span class="menu-arrow d-lg-none"></span>
					</span>
					<div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">
						<div class="menu-item">
							<a class="menu-link py-3" href="">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">VPS Việt Nam</span>
							</a>
						</div>
					</div>
				</div>
				<div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" class="menu-item menu-lg-down-accordion me-lg-1">
					<span class="menu-link py-3">
						<span class="menu-title">Hosting</span>
						<span class="menu-arrow d-lg-none"></span>
					</span>
					<div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">
						<div class="menu-item">
							<a class="menu-link py-3" href="<?= hUrl('Hosting') ?>">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Hosting Việt Nam</span>
							</a>

							<?php if (isLogin()) { ?>
								<a class="menu-link py-3" href="<?= hUrl('User/Hosting') ?>">
									<span class="menu-bullet">
										<span class="bullet bullet-dot"></span>
									</span>
									<span class="menu-title">Quản lí dịch vụ</span>
								</a>
							<?php } ?>
						</div>
					</div>
				</div>
				<div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" class="menu-item menu-lg-down-accordion me-lg-1">
					<span class="menu-link py-3">
						<span class="menu-title">Minecraft</span>
						<span class="menu-arrow d-lg-none"></span>
					</span>
					<div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">
						<div class="menu-item">
							<a class="menu-link py-3" href="<?= hUrl('MCHosting') ?>">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Hosting Minecraft <span class="badge badge-danger">Hot</span></span>
							</a>
							<?php if (isLogin()) { ?>
								<a class="menu-link py-3" href="<?= hUrl('User/MCHosting') ?>">
									<span class="menu-bullet">
										<span class="bullet bullet-dot"></span>
									</span>
									<span class="menu-title">Quản lí dịch vụ</span>
								</a>
							<?php } ?>
						</div>
					</div>
				</div>
				<div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" class="menu-item menu-lg-down-accordion me-lg-1">
					<span class="menu-link py-3">
						<span class="menu-title">Tên miền</span>
						<span class="menu-arrow d-lg-none"></span>
					</span>
					<div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">
						<div class="menu-item">
							<a class="menu-link py-3" href="<?= hUrl('Domain') ?>">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Tên miền chính thống</span>

							</a>
							<a class="menu-link py-3" href="<?= hUrl('Domain') ?>">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Tên miền lậu</span>
							</a>
							<a class="menu-link py-3" href="<?= hUrl('Whois') ?>">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Kiểm tra tên miền</span>
							</a>
							<?php if (isLogin()) { ?>
								<a class="menu-link py-3" href="<?= hUrl('User/Domain') ?>">
									<span class="menu-bullet">
										<span class="bullet bullet-dot"></span>
									</span>
									<span class="menu-title">Quản lí dịch vụ</span>
								</a>
							<?php } ?>
						</div>
					</div>
				</div>
				<div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" class="menu-item menu-lg-down-accordion me-lg-1">
					<span class="menu-link py-3">
						<span class="menu-title">Antiddos</span>
						<span class="menu-arrow d-lg-none"></span>
					</span>
					<div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">
						<div class="menu-item">
							<a class="menu-link py-3" href="">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Antiddos L4</span>

							</a>
							<a class="menu-link py-3" href="">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Antiddos L7</span>

							</a>
							<a class="menu-link py-3" href="">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Antiddos đa tầng</span>

							</a>
						</div>
					</div>
				</div>
				<div id="contact-nav" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" class="menu-item menu-lg-down-accordion me-lg-1">
					<span class="menu-link py-3">
						<span class="menu-title">Liên Hệ</span>
						<span class="menu-arrow d-lg-none"></span>
					</span>
				</div>
				<div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" class="menu-item menu-lg-down-accordion me-lg-1">
					<span class="menu-link py-3">
						<span class="menu-title">Nạp tiền</span>
						<span class="menu-arrow d-lg-none"></span>
					</span>
					<div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">
						<div class="menu-item">
							<a class="menu-link py-3" href="<?= hUrl('User/NapTien') ?>">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Banking</span>

							</a>
							<a class="menu-link py-3" href="<?= hUrl('User/NapCard') ?>">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Thẻ cào</span>

							</a>
						</div>
					</div>
				</div>
				<?php if (isLogin() && $KNCMS->getUser($userinfo['Username'])['Level'] == 3) { ?>
					<script>
						document.addEventListener('DOMContentLoaded', function() {
							var menuItem = document.getElementById('admin-nav');
							var url = '<?= hUrl('Control') ?>';
							menuItem.addEventListener('click', function() {
								window.location.href = url;
							});
						});
					</script>
					<div id="admin-nav" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" class="menu-item menu-lg-down-accordion me-lg-1">
						<span class="menu-link py-3">
							<span class="menu-title">Admin Panel</span>
							<span class="menu-arrow d-lg-none"></span>
						</span>
					</div>
				<?php } ?>
			</div>

		</div>

	</div>


	<div class="d-flex align-items-stretch flex-shrink-0">

		<div class="topbar d-flex align-items-stretch flex-shrink-0">

			<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/server/component/page/user.php') ?>
		</div>
	</div>
</div>
</div>
</div>


<div class="toolbar py-5 py-lg-15" id="kt_toolbar">

	<div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">
		<div class="content flex-row-fluid" id="kt_content">
			<h3 class="text-white fw-bolder fs-2qx me-5">KN-WHM V1.0</h3>
			<br>
			<?php if (!empty($setting['ThongBao'])) { ?>
				<div class="alert alert-primary" role="alert">
					<?= base64_decode($setting['ThongBao']) ?>
				</div>
			<?php } ?>
		</div>
	</div>

</div>