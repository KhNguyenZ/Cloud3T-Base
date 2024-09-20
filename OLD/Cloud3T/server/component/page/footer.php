<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">

    <span class="svg-icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
            <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
        </svg>
    </span>

</div>
<script>
    function showMaintenanceAlert(event) {
        event.preventDefault();
        Swal.fire({
            icon: 'info',
            title: 'Thông báo bảo trì',
            text: 'Dịch vụ hiện đang bảo trì, hãy quay trở lại sau nhé.\nXin chân thành cảm ơn bạn',
            confirmButtonText: 'OK'
        });
    }
</script>



<script src="<?= $base_url ?>./dist/assets/plugins/global/plugins.bundle.js"></script>
<script src="<?= $base_url ?>./dist/assets/js/scripts.bundle.js"></script>


<script src="<?= $base_url ?>./dist/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>


<script src="<?= $base_url ?>dist/assets/js/custom/widgets.js"></script>


</body>

<footer>
    <div class="footer py-4 d-flex flex-lg-column " id="kt_footer">
        <div class=" container-xxl  d-flex flex-column flex-md-row align-items-center justify-content-between">
            <div class="text-dark order-2 order-md-1">
                <span class="text-muted fw-semibold me-1">2024©</span>
                <a href="https://zalo.me/g/gmwjea095" target="_blank" class="text-gray-800 text-hover-primary">KhNguyenZ & Dang Fhat & LamDuongMinh</a>
            </div>
            <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                <li class="menu-item"><a href="https://zalo.me/g/gmwjea095" target="_blank" class="menu-link px-2">Facebook</a></li>

                <li class="menu-item"><a href="https://www.facebook.com/KhNguyenZ.Dev" target="_blank" class="menu-link px-2">Support</a></li>

                <li class="menu-item"><a href="https://www.facebook.com/KhNguyenZ.Dev" target="_blank" class="menu-link px-2">Liên hệ hợp tác</a></li>
            </ul>
        </div>
    </div>
</footer>

</html>