</div>
<footer class="main-footer">
    <div class="float-right d-none d-sm-inline">
        <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit" type="text/javascript"></script>
    </div>


</footer>
<aside class="control-sidebar control-sidebar-dark">
</aside>
</div>
<script src="<?= $base_url ?>server/admin/lib/plugins/jquery/jquery.min.js"></script>
<script src="<?= $base_url ?>server/admin/lib/plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="<?= $base_url ?>server/admin/lib/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= $base_url ?>server/admin/lib/plugins/chart.js/Chart.min.js"></script>
<script src="<?= $base_url ?>server/admin/lib/plugins/sparklines/sparkline.js"></script>
<script src="<?= $base_url ?>server/admin/lib/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= $base_url ?>server/admin/lib/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="<?= $base_url ?>server/admin/lib/plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="<?= $base_url ?>server/admin/lib/plugins/moment/moment.min.js"></script>
<script src="<?= $base_url ?>server/admin/lib/plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?= $base_url ?>server/admin/lib/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="<?= $base_url ?>server/admin/lib/plugins/summernote/summernote-bs4.min.js"></script>
<script src="<?= $base_url ?>server/admin/lib/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="<?= $base_url ?>server/admin/lib/dist/js/adminlte.js"></script>
<script src="<?= $base_url ?>server/admin/lib/dist/js/demo.js"></script>
<script src="<?= $base_url ?>server/admin/lib/dist/js/pages/dashboard.js"></script>
<script src="<?= $base_url ?>server/admin/lib/plugins/summernote/summernote-bs4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>

<!-- include summernote css/js -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

<script>
document.addEventListener("DOMContentLoaded", function() {
  const cashInputs = document.querySelectorAll(".cashInput");

  cashInputs.forEach(function(input) {
    input.addEventListener("input", function() {
      // Remove non-digit characters
      let value = this.value.replace(/\D/g, '');

      // Add commas for thousands separator
      value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ",");

      // Add currency symbol if needed
      // Assuming USD here, you may change it accordingly
      value = "$" + value;

      // Update input value
      this.value = value;
    });
  });
});
</script>
<script>
    $(document).ready(function () {
        $('#datatable2').DataTable();
    });
</script><script>
</script>
</body>

</html>