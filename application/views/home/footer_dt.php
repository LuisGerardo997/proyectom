

<!-- Jquery DataTable Plugin Js -->
<script src="<?= base_url() ?>plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="<?= base_url() ?>plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="<?= base_url() ?>plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="<?= base_url() ?>plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="<?= base_url() ?>plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="<?= base_url() ?>plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="<?= base_url() ?>plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js
<script src="<?= base_url() ?>plugins/bootstrap-select/js/bootstrap-select.js"></script>
 -->
<!-- Slimscroll Plugin Js -->
<script src="<?= base_url() ?>plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="<?= base_url() ?>plugins/node-waves/waves.js"></script>

<!-- Custom Js -->
<script src="<?= base_url() ?>js/admin.js"></script>
<?php if($this->uri->segment(1)=='clientes') {?>
    <script src="<?= base_url() ?>js/clientes.js"></script>
<?php };?>
<script src="<?= base_url() ?>js/pages/tables/jquery-datatable.js"></script>

<!-- Input Mask Plugin Js -->
<script src="<?= base_url() ?>plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>

<!-- Demo Js -->
<script src="<?= base_url() ?>js/demo.js"></script>
</body>

</html>
