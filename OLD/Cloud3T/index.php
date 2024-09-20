<?php require_once('modules/config.php') ?>
<?php require_once('server/component/page/head.php') ?>
<?php require_once('server/component/page/nav.php') ?>

<title><?= $setting['Title'] ?></title>
<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
	<div class="content flex-row-fluid" id="kt_content">
		
		<div class="card card-page">
			<div class="card-body">
				<div class="row gy-5 g-xl-8">
					<div class="col-xxl-6">
						<div class="card card-xxl-stretch mb-xl-8 theme-dark-bg-body">
							<div class="card-body d-flex flex-column">
								<div class="d-flex flex-stack mb-7">
									<div class="d-flex align-items-center">
										<div class="symbol symbol-40px me-5">
											<span class="symbol-label bg-light-primary">
												<i class="fa-brands fa-servicestack"></i>
											</span>
										</div>

										<div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
											<a href="#" class="text-gray-900 fw-bold text-hover-primary fs-5">
												Dịch vụ
											</a>

											<span class="text-muted fw-bold">Thông tin</span>
										</div>
									</div>


								</div>
								<div class="row g-0">
									<div class="col-6">
										<div class="d-flex align-items-center mb-9 me-2">
											<div class="symbol symbol-40px me-3">
												<div class="symbol-label bg-light-primary">


													<i class="fa-solid fa-cloud"></i>
												</div>
											</div>
											<div>
												<div class="fs-5 text-gray-900 fw-bold lh-1">0</div>
												<div class="fs-7 text-gray-600 fw-bold">VPS</div>
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="d-flex align-items-center mb-9 ms-2">
											<div class="symbol symbol-40px me-3">
												<div class="symbol-label bg-light-primary">

													<i class="fa-solid fa-server"></i>
												</div>
											</div>
											<div>
												<div class="fs-5 text-gray-900 fw-bold lh-1">0</div>
												<div class="fs-7 text-gray-600 fw-bold">Hosting</div>
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="d-flex align-items-center me-2">
											<div class="symbol symbol-40px me-3">
												<div class="symbol-label bg-light-primary">
													<i class="fa-brands fa-internet-explorer"></i>
												</div>

											</div>
											<div>
												<div class="fs-5 text-gray-900 fw-bold lh-1">0</div>
												<div class="fs-7 text-gray-600 fw-bold">Tên miền</div>
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="d-flex align-items-center ms-2">
											<div class="symbol symbol-40px me-3">
												<div class="symbol-label bg-light-primary">
													<i class="fa-solid fa-shield"></i>
												</div>
											</div>
											<div>
												<div class="fs-5 text-gray-900 fw-bold lh-1">0</div>
												<div class="fs-7 text-gray-600 fw-bold">Antiddos</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- </div>
					<div class="col-lg-6">
						<div class="col-lg-6">
							<div class="card card-xxl-stretch mb-xl-8 theme-dark-bg-body">
								<div class="card" style="background-color: #1C53E1; width: 100%;">
									<div class="d-flex flex-column">
										<div class="flex-grow-1 ps-9 pb-9">
											<div class="pt-8">

												<div class="d-flex align-items-center mb-3">
													<i class="ki-duotone ki-arrow-circle-left fs-2 text-white me-2"><span class="path1"></span><span class="path2"></span></i>
													<span class="fw-bold fs-7 text-white"></span>
												</div>

											</div>
											<a href="#" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#kt_modal_new_target">New Target</a>
										</div>

										<img class="mh-200px" alt="" src="/ceres-html-free/assets/media/svg/illustrations/engage.svg">
									</div>
								</div>
							</div>
						</div>
					</div> -->
					</div>
				</div>
			</div>
		</div>
	</div>

</div>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/server/component/page/footer.php') ?>