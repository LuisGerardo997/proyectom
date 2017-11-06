
<!-- Select Plugin Js
<script src="<?= base_url() ?>plugins/bootstrap-select/js/bootstrap-select.js"></script>
-->
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

<!-- Slimscroll Plugin Js -->
<script src="<?= base_url() ?>plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="<?= base_url() ?>plugins/node-waves/waves.js"></script>

<!-- Custom Js -->
<script src="<?= base_url() ?>js/admin.js"></script>
<?php if($this->uri->segment(1)=='clientes') {?>
    <script src="<?= base_url() ?>js/clientes.js"></script>
<?php };?>
<?php if($this->uri->segment(1)=='cargo') {?>
    <script src="<?= base_url() ?>js/cargo.js"></script>
<?php };?>
<?php if($this->uri->segment(1)=='tipo_producto') {?>
    <script src="<?= base_url() ?>js/tipo_producto.js"></script>
<?php };?>
<?php if($this->uri->segment(1)=='tipo_movimiento') {?>
    <script src="<?= base_url() ?>js/tipo_movimiento.js"></script>
<?php };?>
<?php if($this->uri->segment(1)=='tipo_documento') {?>
    <script src="<?= base_url() ?>js/tipo_documento.js"></script>
<?php };?>
<?php if($this->uri->segment(1)=='marca') {?>
    <script src="<?= base_url() ?>js/marca.js"></script>
<?php };?>
<?php if($this->uri->segment(1)=='productos') {?>
    <script src="<?= base_url() ?>js/productos.js"></script>
<?php };?>
<?php if($this->uri->segment(1)=='proveedores') {?>
    <script src="<?= base_url() ?>js/proveedores.js"></script>
<?php };?>
<?php if($this->uri->segment(1)=='forma_pago') {?>
    <script src="<?= base_url() ?>js/forma_pago.js"></script>
<?php };?>
<script src="<?= base_url() ?>js/pages/tables/jquery-datatable.js"></script>

<!-- Input Mask Plugin Js -->
<script src="<?= base_url() ?>plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>

<!-- Demo Js -->
<script src="<?= base_url() ?>js/demo.js"></script>
</body>

</html>
