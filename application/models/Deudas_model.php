<?php
class Deudas_model extends CI_Model{

    function __constuct(){
        parent::__construct();
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
        $this->db->where('cod_tipo_movimiento', '2');
        $this->db->order_by('concepto_movimiento', 'asc');
        $resultado= $this->db->get('concepto_movimiento');
        return $resultado -> result_array();
    }

    function consultar_tarjeta($arg){
        $this->db->select('nro_tarjeta');
        $this->db->where('cod_persona',$arg);
        $this->db->where('estado', '0');
        $data = $this->db->get('persona');
        return $data->result();
    }

    function consultar_proveedor(){
        $this->db->select('pr.cod_proveedor, pr.razon_social, pr.dni, pr.nombres, pr.apellido_paterno, pr.apellido_materno, u.ciudad');
        $this->db->where('pr.estado', '1');
        $this->db->join('ubigeo u','u.cod_ciudad = pr.cod_ciudad');
        $data = $this->db->get('proveedores pr');
        return $data->result_array();
    }

    function consultar_fecha_caja($arg){
        $query = 'SELECT * FROM `caja_persona` WHERE cod_persona = '.$arg.' order by fecha_inicio DESC LIMIT 1';
        $data = $this->db->query($query);
        return $data->result_array();
    }

    function consultar_amortizacion($arg){
        $this->db->select('monto');
        $this->db->where('cod_cronograma_compras', $arg);
        $data = $this->db->get('amortizacion_compra');
        return $data->result_array();
    }

    function consultar_deudas(){
        $this->db->select('cc.cod_cronograma_compras, cc.cod_compra, pr.cod_proveedor, pr.razon_social, cc.nro_cuota, cc.monto, cc.fecha_vencimiento');
        $this->db->from('cronograma_compras cc');
        //$this->db->where('cc.estado', '0');
        $this->db->where('cc.estado', '1');
        $this->db->join('compras c','c.cod_compra = cc.cod_cronograma_compras');
        $this->db->join('proveedores pr','pr.cod_proveedor = c.cod_proveedor');
        $data = $this->db->get();
        return $data->result_array();
    }

    function consultar_proveedor_compra($arg){
        $this->db->select('c.cod_compra, p.cod_proveedor, p.razon_social, c.fecha_compra');
        $this->db->from('compras c');
        $this->db->where('c.estado','1');
        $this->db->where('c.cod_proveedor',$arg);
        $this->db->join('proveedores p','p.cod_proveedor = c.cod_proveedor');
        $data = $this->db->get();
        return $data->result_array();
    }

    function detalle_proveedor_producto($cod_compra){
        $this->db->select('c.cod_compra, p.cod_producto, dc.cantidad, p.producto, dc.precio, dc.descuento, dc.cod_parametro');
        $this->db->from('detalle_compras dc');
        $this->db->where('c.estado','1');
        $this->db->where('dc.cod_compra',$cod_compra);
        $this->db->order_by('c.cod_compra','asc');
        $this->db->join('compras c','c.cod_compra = dc.cod_compra');
        $this->db->join('productos p','p.cod_producto = dc.cod_producto');
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

    function consultar_cliente_estadia($arg){
        $this->db->select('e.cod_cliente, e.cod_estadia, p.nombres, p.apellido_paterno, p.apellido_materno, e.fecha_reserva, e.fecha_ingreso, e.fecha_salida');
        $this->db->from('estadia e');
        $this->db->where('e.estado','1');
        $this->db->where('e.cod_cliente',$arg);
        $this->db->join('persona p','p.cod_persona = e.cod_cliente');
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

      function guardar_movimiento($guardar){
        if ($this->db->insert('movimiento',$guardar)){
          return true;
        }else{
          return false;
        }
      }
      function guardar_amortizacion($guardar){
        if ($this->db->insert('amortizacion_compra',$guardar)){
          return true;
        }else{
          return false;
        }
      }

    function actualizar_cronograma($cod, $hab){
      $this->db->where('cod_cronograma_compras', $cod);
      $this->db->update('cronograma_compras',$hab);
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
          $num = $this->db->count_all('cronograma_compras');
          $num = $num+1;
          return $num;
      }
    function num_amor(){
          $num = $this->db->count_all('amortizacion_compra');
          $num = $num+1;
          return $num;
      }
}
