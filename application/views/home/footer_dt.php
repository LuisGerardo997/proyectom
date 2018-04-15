
<!-- Select Plugin Js
<script src="<?= base_url() ?>plugins/bootstrap-select/js/bootstrap-select.js"></script>
-->
<script src="<?= base_url() ?>js/system.js"></script>
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

<!-- Moment Plugin Js -->
<script src="<?= base_url() ?>plugins/momentjs/moment.js"></script>
<script src="<?= base_url() ?>plugins/sweetalert/sweetalert.min.js"></script>
<script src="<?= base_url() ?>js/pages/ui/dialogs.js"></script>
<script src="<?= base_url() ?>plugins/bootstrap-notify/bootstrap-notify.js"></script>

<!-- Bootstrap Material Datetime Picker Plugin Js -->
<script src="<?= base_url() ?>plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="<?= base_url() ?>plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="<?= base_url() ?>plugins/node-waves/waves.js"></script>
<script src="<?= base_url() ?>js/main.js"></script>

<!-- Custom Js -->
<script src="<?= base_url() ?>js/admin.js"></script>
<?php if($this->uri->segment(1)=='clientes') {?>
    <script src="<?= base_url() ?>js/clientes.js"></script>
<?php };?>
<?php if($this->uri->segment(1)=='tipo_persona') {?>
      <script src="<?= base_url() ?>js/tipo_persona.js"></script>
<?php };?>
<?php if($this->uri->segment(1)=='empleados') {?>
      <script src="<?= base_url() ?>js/empleados.js"></script>
<?php };?>
<?php if($this->uri->segment(1)=='tipo_habitacion') {?>
      <script src="<?= base_url() ?>js/tipo_habitacion.js"></script>
<?php };?>
<?php if($this->uri->segment(1)=='habitacion') {?>
      <script src="<?= base_url() ?>js/habitacion.js"></script>
<?php };?>
<?php if($this->uri->segment(1)=='ubigeo') {?>
      <script src="<?= base_url() ?>js/ubigeo.js"></script>
<?php };?>
<?php if($this->uri->segment(1)=='servicios') {?>
      <script src="<?= base_url() ?>js/servicios.js"></script>
<?php };?>
<?php if($this->uri->segment(1)=='ofertas') {?>
      <script src="<?= base_url() ?>js/ofertas.js"></script>
<?php };?>
<?php if($this->uri->segment(1)=='area') {?>
      <script src="<?= base_url() ?>js/area.js"></script>
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
<?php if($this->uri->segment(1)=='reportes_1') {?>
      <script src="<?= base_url() ?>js/reportes.js"></script>
<?php }; ?>

<?php if($this->uri->segment(1)=='reportes_2') {?>
      <script src="<?= base_url() ?>js/reportes.js"></script>
<?php }; ?>

<?php if($this->uri->segment(1)=='reportes_3') {?>
      <script src="<?= base_url() ?>js/reportes.js"></script>
<?php }; ?>
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
<?php if($this->uri->segment(1)=='caja') {?>
      <script src="<?= base_url() ?>js/caja.js"></script>
<?php }; ?>

<?php if($this->uri->segment(1)=='caja_persona') {?>
      <script src="<?= base_url() ?>js/caja_persona.js"></script>
<?php }; ?>

<?php if($this->uri->segment(1)=='tipo_transaccion') {?>
      <script src="<?= base_url() ?>js/tipo_transaccion.js"></script>
<?php }; ?>

<?php if($this->uri->segment(1)=='parametro') {?>
      <script src="<?= base_url() ?>js/parametro.js"></script>
<?php }; ?>

<?php if($this->uri->segment(1)=='modulo') {?>
      <script src="<?= base_url() ?>js/modulo.js"></script>
<?php }; ?>

<?php if($this->uri->segment(1)=='perfil') {?>
      <script src="<?= base_url() ?>js/perfil.js"></script>
<?php }; ?>
<?php if($this->uri->segment(1)=='usuarios') {?>
      <script src="<?= base_url() ?>js/usuarios.js"></script>
<?php }; ?>

<?php if($this->uri->segment(1)=='acceso') {?>
      <script src="<?= base_url() ?>js/acceso.js"></script>
      <script src="<?= base_url() ?>plugins/multi-select/js/jquery.multi-select.js"></script>
<?php }; ?>

<?php if($this->uri->segment(1)=='detalle_persona_perfil') {?>
      <script src="<?= base_url() ?>js/detalle_persona_perfil.js"></script>
<?php }; ?>
<?php if($this->uri->segment(1)=='estado_habitacion') {?>
      <script src="<?= base_url() ?>js/estado_habitacion.js"></script>
<?php }; ?>
<?php if($this->uri->segment(1)=='deudas') {?>
      <script src="<?= base_url() ?>js/deudas.js"></script>
      <script src="<?= base_url() ?>plugins/jquery-validation/jquery.validate.js"></script>
      <script src="<?= base_url() ?>plugins/jquery-steps/jquery.steps.js"></script>
      <script src="<?= base_url() ?>js/pages/forms/form-wizard.js"></script>
<?php }; ?>
<?php if($this->uri->segment(1)=='pagos') {?>
      <script src="<?= base_url() ?>js/pagos.js"></script>
      <script src="<?= base_url() ?>plugins/jquery-validation/jquery.validate.js"></script>
      <script src="<?= base_url() ?>plugins/jquery-steps/jquery.steps.js"></script>
      <script src="<?= base_url() ?>js/pages/forms/form-wizard.js"></script>
<?php }; ?>
<?php if($this->uri->segment(1)=='ventas') {?>
      <script src="<?= base_url() ?>js/ventas.js"></script>
      <script src="<?= base_url() ?>plugins/jquery-validation/jquery.validate.js"></script>
      <script src="<?= base_url() ?>plugins/jquery-steps/jquery.steps.js"></script>
      <script src="<?= base_url() ?>js/pages/forms/form-wizard.js"></script>
      <script src="<?= base_url() ?>plugins/jquery-spinner/js/jquery.spinner.js"></script>
<?php }; ?>
<?php if($this->uri->segment(1)=='compras') {?>
      <script src="<?= base_url() ?>js/compras.js"></script>
      <script src="<?= base_url() ?>plugins/jquery-validation/jquery.validate.js"></script>
      <script src="<?= base_url() ?>plugins/jquery-steps/jquery.steps.js"></script>
      <script src="<?= base_url() ?>js/pages/forms/form-wizard.js"></script>
      <script src="<?= base_url() ?>plugins/jquery-spinner/js/jquery.spinner.js"></script>
<?php }; ?>
<?php if($this->uri->segment(1)=='reservaciones') {?>
      <script src="<?= base_url() ?>js/reservaciones.js"></script>
      <script src="<?= base_url() ?>plugins/jquery-validation/jquery.validate.js"></script>
      <script src="<?= base_url() ?>plugins/jquery-steps/jquery.steps.js"></script>
      <script src="<?= base_url() ?>js/pages/forms/form-wizard.js"></script>
<?php }; ?>

<script src="<?= base_url() ?>js/pages/tables/jquery-datatable.js"></script>

<!-- Input Mask Plugin Js -->
<script src="<?= base_url() ?>plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>

<!-- Demo Js -->
<!-- <script src="<?= base_url() ?>js/demo.js"></script> -->
<!-- <script src="<? base_url() ?>js/pages/widgets/infobox/infobox-4.js"></script> -->
</body>

</html>
