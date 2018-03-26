<?php
class Pagos_model extends CI_Model{

    function __constuct(){
        parent::__construct();
    }

    function nro_serie($arg){
        $this->db->select('nro_serie');
        $this->db->where('cod_tipo_documento', $arg);
        $resultado= $this->db->get('tipo_documento');
        return $resultado -> row();
    }

    function nro_correlativo($arg){
        $this->db->select('nro_correlativo');
        $this->db->where('cod_tipo_documento', $arg);
        $resultado= $this->db->get('tipo_documento');
        return $resultado -> row();
    }

    function select1(){
        $this->db->select('cod_tipo_transaccion, tipo_transaccion');
        $this->db->order_by('tipo_transaccion', 'asc');
        $resultado= $this->db->get('tipo_transaccion');
        return $resultado -> result_array();
    }

    function select2(){
        $this->db->select('cod_forma_pago, forma_pago');
        $this->db->order_by('forma_pago', 'asc');
        $resultado= $this->db->get('forma_pago');
        return $resultado -> result_array();
    }

    function select3(){
        $this->db->select('cod_tipo_documento, descripcion');
        $this->db->order_by('descripcion', 'asc');
        $resultado= $this->db->get('tipo_documento');
        return $resultado -> result_array();
    }

    function select4(){
        $this->db->select('cod_concepto_movimiento, concepto_movimiento');
        $this->db->where('cod_tipo_movimiento','1');
        $this->db->order_by('concepto_movimiento', 'asc');
        $resultado= $this->db->get('concepto_movimiento');
        return $resultado -> result_array();
    }

    function select5(){
        $this->db->select('cod_caja, fecha_inicio');
        $this->db->order_by('concepto_movimiento', 'asc');
        $resultado= $this->db->get('concepto_movimiento');
        return $resultado -> result_array();
    }

    function consultar_fecha_caja($arg){
        $query = 'SELECT * FROM caja_persona WHERE cod_persona = '.$arg.' order by fecha_inicio DESC LIMIT 1';
        $data = $this->db->query($query);
        return $data->result_array();
    }

    function guardar_movimiento($guardar){
        if ($this->db->insert('movimiento',$guardar)){
            return true;
        }else{
            return false;
        }
    }

    function guardar_amortizacion($guardar){
        if ($this->db->insert('amortizacion_venta',$guardar)){
            return true;
        }else{
            return false;
        }
    }

    //nuevo
    function guardar_amortizacion_estadia($guardar){
        if ($this->db->insert('amortizacion_cronograma_movimiento',$guardar)){
            return true;
        }else{
            return false;
        }
    }

    /*function consultar_tarjeta($arg){
        $this->db->select('nro_tarjeta');
        $this->db->where('cod_persona',$arg);
        $this->db->where('estado', '0');
        $data = $this->db->get('persona');
        return $data->result();
    }
    */

    function consultar_cliente_producto($arg, $array){
        $this->db->select('v.cod_venta, v.cod_cliente, p.nombres, p.apellido_paterno, p.apellido_materno, p.ruc, v.fecha_venta');
        $this->db->from('ventas v');
        $this->db->where_not_in('v.cod_venta', $array);
        $this->db->where('v.estado','1');
        $this->db->where('v.cod_cliente',$arg);
        $this->db->join('persona p','p.cod_persona = v.cod_cliente');
        $data = $this->db->get();
        return $data->result_array();
    }

    function consultar_cliente_estadia($arg, $array){
        $this->db->select('e.cod_estadia, e.cod_cliente, e.cod_estadia, p.nombres, p.apellido_paterno, p.apellido_materno, e.fecha_reserva, e.fecha_ingreso, e.fecha_salida');
        $this->db->from('estadia e');
        $this->db->where_not_in('e.cod_estadia', $array);
        $this->db->where('e.estado','2');
        $this->db->where('e.cod_cliente',$arg);
        $this->db->join('persona p','p.cod_persona = e.cod_cliente');
        $data = $this->db->get();
        return $data->result_array();
    }

    function detalle_cliente_producto($arg, $arg1){
        $this->db->select('v.cod_venta, p.cod_persona, p.nombres, p.apellido_paterno, dv.cantidad, pr.producto, dv.precio, dv.descuento, dv.cod_parametro');
        $this->db->from('detalle_venta dv');
        $this->db->where('v.estado','1');
        $this->db->where('v.cod_cliente',$arg);
        $this->db->where('dv.cod_venta',$arg1);
        $this->db->join('productos pr','pr.cod_producto = dv.cod_producto');
        $this->db->join('ventas v','v.cod_venta = dv.cod_venta');
        $this->db->join('persona p','p.cod_persona = v.cod_cliente');
        $data = $this->db->get();
        return $data->result_array();
    }

    function detalle_cliente_estadia($arg){
        $this->db->distinct();
        $this->db->select('e.cod_estadia,h.cod_habitacion, th.tipo_habitacion, th.precio_tipo_habitacion, e.fecha_ingreso, e.fecha_salida');
        $this->db->from('habitacion_estadia he');
        $this->db->where('e.estado','2');
        $this->db->where('he.cod_estadia',$arg);
        $this->db->order_by('h.cod_habitacion','asc');
        // $this->db->join('servicio s','s.cod_servicio = ds.cod_servicio', 'left');
        $this->db->join('estadia e','e.cod_estadia = he.cod_estadia', 'left');
        $this->db->join('habitacion h','h.cod_habitacion = he.cod_habitacion', 'left');
        $this->db->join('tipo_habitacion th','th.cod_tipo_habitacion = h.cod_tipo_habitacion', 'left');
        $data = $this->db->get();
        return $data->result_array();
    }

    function cronograma_ventas(){
        $this->db->select('cv.cod_cronograma_ventas, v.cod_venta, cv.nro_cuota, cv.fecha_vencimiento, v.cod_cliente, p.nombres, p.apellido_paterno, p.apellido_materno, cv.monto');
        $this->db->from('cronograma_ventas cv');
        $this->db->where('cv.estado','1');
        $this->db->join('ventas v','v.cod_venta = cv.cod_venta');
        $this->db->join('persona p','p.cod_persona = v.cod_cliente');
        $data = $this->db->get();
        return $data->result_array();
    }

    function cronograma_estadia(){
        $this->db->select('ce.cod_cronograma_estadia, e.cod_estadia, ce.nro_cuota, ce.fecha, e.cod_cliente, p.nombres, p.apellido_paterno, p.apellido_materno, ce.monto');
        $this->db->from('cronograma_estadia ce');
        $this->db->where('ce.estado','1');
        $this->db->join('estadia e','e.cod_estadia = ce.cod_estadia');
        $this->db->join('persona p','p.cod_persona = e.cod_cliente');
        $data = $this->db->get();
        return $data->result_array();
    }

    function ventas_realizadas(){
        $this->db->select('av.cod_movimiento, av.cod_cronograma_ventas, v.cod_cliente, p.nombres, p.apellido_paterno, p.apellido_materno,av.monto');
        $this->db->from('amortizacion_venta av');
        $this->db->join('cronograma_ventas cv','cv.cod_cronograma_ventas = av.cod_cronograma_ventas');
        $this->db->join('ventas v','v.cod_venta = cv.cod_venta');
        $this->db->join('persona p','p.cod_persona = v.cod_cliente');
        $data = $this->db->get();
        return $data->result_array();
    }

    function estadias_realizadas(){
        $this->db->select('acm.cod_movimiento, acm.cod_cronograma_estadia, e.cod_cliente, p.nombres, p.apellido_paterno, p.apellido_materno, acm.monto');
        $this->db->from('amortizacion_cronograma_movimiento acm');
        $this->db->join('cronograma_estadia ce','ce.cod_cronograma_estadia = acm.cod_cronograma_estadia');
        $this->db->join('estadia e','e.cod_estadia = ce.cod_estadia');
        $this->db->join('persona p','p.cod_persona = e.cod_cliente');
        $data = $this->db->get();
        return $data->result_array();
    }

    function consultar_amortizacion_venta($arg){
        $this->db->select('monto');
        $this->db->from('amortizacion_venta');
        $this->db->where('cod_cronograma_ventas',$arg);
        $data = $this->db->get();
        return $data->result_array();
    }

    function precio_servicios($arg2){
        $this->db->select('precio');
        $this->db->from('detalle_servicio');
        $this->db->where('cod_estadia',$arg2);
        $data = $this->db->get();
        return $data->result_array();
    }

    function precio_habitaciones($arg2){
        $this->db->select('th.precio_tipo_habitacion');
        $this->db->from('habitacion_estadia ds');
        $this->db->join('estadia e', 'e.cod_estadia = ds.cod_estadia', 'left');
        $this->db->join('habitacion h', 'h.cod_habitacion = ds.cod_habitacion', 'left');
        $this->db->join('tipo_habitacion th', 'th.cod_tipo_habitacion = h.cod_habitacion', 'left');
        $this->db->where('e.cod_estadia',$arg2);
        $data = $this->db->get();
        return $data->result_array();
    }

    //nuevo
    function consultar_amortizacion_cronograma_movimiento($arg){
        $this->db->select('monto');
        $this->db->from('amortizacion_cronograma_movimiento ');
        $this->db->where('cod_cronograma_estadia',$arg);
        $data = $this->db->get();
        return $data->result_array();
    }

    function guardar_tipo_transaccion($cod,$hab){
        $this->db->where('cod_tipo_transaccion',$cod);
        $this->db->update('ventas',$hab);
        if($this->db->affected_rows()>0){
            return true;
        }
        else {
            return false;
        }
    }
    function actualizar_estadia($cod,$hab){
        $this->db->where('cod_estadia',$cod);
        $this->db->update('estadia',$hab);
        if($this->db->affected_rows()>0){
            return true;
        }
        else {
            return false;
        }
    }
    function actualizar_estado_habitacion($cod){
        $query = "UPDATE habitacion SET cod_estado_habitacion = '3' WHERE cod_habitacion IN (SELECT cod_habitacion FROM habitacion_estadia WHERE cod_estadia = '".$cod."')";
        $this->db->query($query);
        if($this->db->affected_rows()>0){
            return true;
        }
        else {
            return false;
        }
    }

    /*
    function guardar($guardar){
        if ($this->db->insert('cronograma_ventas',$guardar)){
            return true;
        }else{
            return false;
        }
    }
    */

    function actualizar_cronograma($cod,$hab){
        $this->db->where('cod_cronograma_ventas',$cod);
        $this->db->update('cronograma_ventas',$hab);
        if($this->db->affected_rows()>0){
            return true;
        }else{
            return false;
        }
    }
    function actualizar_venta($cod,$hab){
        $this->db->where('cod_venta',$cod);
        $this->db->update('ventas',$hab);
        if($this->db->affected_rows()>0){
            return true;
        }else{
            return false;
        }
    }

    //nuevo
    function guardar_cronograma_ventas($guardar){
        if ($this->db->insert('cronograma_ventas',$guardar)){
            return true;
        }else{
            return false;
        }
    }

    function guardar_cronograma_estadia($guardar){
        if ($this->db->insert('cronograma_estadia',$guardar)){
            return true;
        }else{
            return false;
        }
    }

    function actualizar_cronograma_estadia($cod,$hab){
        $this->db->where('cod_cronograma_estadia',$cod);
        $this->db->update('cronograma_estadia',$hab);
        if($this->db->affected_rows()>0){
            return true;
        }else{
            return false;
        }
    }

    function num_mov(){
        $num = $this->db->count_all('movimiento');
        $num = $num+1;
        return $num;
    }

    function num_cron(){
        $num = $this->db->count_all('cronograma_ventas');
        $num = $num+1;
        return $num;
    }

    function num_cron_e(){
        $num = $this->db->count_all('cronograma_estadia');
        $num++;
        return $num;
    }
    function actualizar_correlativo($documento, $info)
    {
        $this->db->where('cod_tipo_documento', $documento);
        $this->db->update('tipo_documento', $info);
        if($this->db->affected_rows()>0){
            return true;
        }else{
            return false;
        }
    }
    function estadias_procesadas()
    {
      $this->db->select('cod_estadia');
      $this->db->distinct();
      $resultado = $this->db->get('cronograma_estadia');
      $data = array();
      foreach ($resultado->result() as $result) {
        array_push($data, $result->cod_estadia);
      }
      return $data;
    }
    function ventas_procesadas()
    {
      $this->db->select('cod_venta');
      $this->db->distinct();
      $resultado = $this->db->get('cronograma_ventas');
      $data = array();
      foreach ($resultado->result() as $result) {
        array_push($data, $result->cod_venta);
      }
      return $data;
    }
    function detalle_ventas($arg1)
    {
      $this->db->select('p.cod_producto, p.producto, m.marca, tp.tipo_producto, p.precio_producto precio, dv.descuento, p.descripcion, dv.cantidad');
      $this->db->from('cronograma_ventas cv');
      $this->db->join('ventas v', 'v.cod_venta = cv.cod_venta');
      $this->db->join('detalle_venta dv', 'dv.cod_venta = v.cod_venta');
      $this->db->join('productos p', 'p.cod_producto = dv.cod_producto');
      $this->db->join('tipo_producto tp', 'tp.cod_tipo_producto = p.cod_tipo_producto');
      $this->db->join('marca m', 'm.cod_marca = p.cod_marca');
      $this->db->where('cv.cod_venta', 1);
      $resultado = $this->db->get();
      return $resultado->result();
    }
}
