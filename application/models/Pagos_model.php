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
        $query = 'SELECT * FROM `caja_persona` WHERE cod_persona = '.$arg.' order by fecha_inicio DESC LIMIT 1';
        $data = $this->db->query($query);
        return $data->result_array();
    }
    // 
    // function consultar_amortizacion($arg){
    //     $this->db->select_sum('monto');
    //     $this->db->where('cod_cronograma_ventas', $arg);
    //     $data = $this->db->get('amortizacion_venta');
    //     return $data->result_array();
    // }

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

    function consultar_tarjeta($arg){
        $this->db->select('nro_tarjeta');
        $this->db->where('cod_persona',$arg);
        $this->db->where('estado', '0');
        $data = $this->db->get('persona');
        return $data->result();
    }

    function consultar_cliente_producto($arg){
        $this->db->select('v.cod_venta, v.cod_cliente, p.nombres, p.apellido_paterno, p.apellido_materno, p.ruc, v.fecha_venta');
        $this->db->from('ventas v');
        $this->db->where('v.estado','1');
        $this->db->where('v.cod_cliente',$arg);
        $this->db->join('persona p','p.cod_persona = v.cod_cliente');
        $data = $this->db->get();
        return $data->result_array();
    }

    function consultar_cliente_estadia($arg){
        $this->db->select('e.cod_estadia, e.cod_cliente, e.cod_estadia, p.nombres, p.apellido_paterno, p.apellido_materno, e.fecha_reserva, e.fecha_ingreso, e.fecha_salida');
        $this->db->from('estadia e');
        $this->db->where('e.estado','1');
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
        $this->db->select('h.cod_habitacion, th.tipo_habitacion, th.precio_tipo_habitacion, s.servicio, ds.precio');
        $this->db->from('detalle_servicio ds');
        $this->db->where('e.estado','1');
        $this->db->where('ds.cod_estadia',$arg);
        $this->db->order_by('h.cod_habitacion','asc');
        $this->db->join('servicio s','s.cod_servicio = ds.cod_servicio', 'left');
        $this->db->join('estadia e','e.cod_estadia = ds.cod_estadia', 'left');
        $this->db->join('habitacion h','h.cod_habitacion = ds.cod_habitacion', 'left');
        $this->db->join('tipo_habitacion th','th.cod_tipo_habitacion = h.cod_tipo_habitacion', 'left');
        $data = $this->db->get();
        return $data->result_array();
    }

    function cronograma_ventas(){
        $this->db->select('cv.cod_cronograma_ventas, v.cod_venta, cv.nro_cuota, cv.monto, cv.fecha_vencimiento, v.cod_cliente, p.nombres, p.apellido_paterno, p.apellido_materno, cv.monto');
        $this->db->from('cronograma_ventas cv');
        $this->db->where('cv.estado','1');
        $this->db->join('ventas v','v.cod_venta = cv.cod_venta');
        $this->db->join('persona p','p.cod_persona = v.cod_cliente');
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

    function guardar($guardar){
        if ($this->db->insert('cronograma_compras',$guardar)){
            return true;
        }else{
            return false;
        }
    }

    function actualizar_cronograma($cod,$hab){
        $this->db->where('cod_cronograma_ventas',$cod);
        $this->db->update('cronograma_ventas',$hab);
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
}
