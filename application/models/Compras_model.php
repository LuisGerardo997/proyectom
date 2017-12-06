<?php
class Compras_model extends CI_Model{

  function __constuct(){
    parent::__construct();
  }
  function consultar(){
    $this->db->select('c.cod_compra, p.ruc, p.razon_social, c.fecha_compra');
    $this->db->from('compras c');
    $this->db->join('proveedores p', 'p.cod_proveedor = c.cod_proveedor');
    $resultado = $this->db->get();
    return $resultado->result();
  }
  function consultar_cliente_estadia($arg){
    $this->db->select('cod_estadia');
    $this->db->where('cod_cliente', $arg);
    $resultado = $this->db->get('estadia');
    return $resultado->num_rows();
  }
  function actualizar($cod,$hab){
    $this->db->where('cod_cargo',$cod);
    $this->db->update('cargo',$hab);
    if($this->db->affected_rows()>0){
      return true;
    }else{
      return false;
    }
  }
  function select1(){
    $this->db->select('cod_tipo_transaccion, tipo_transaccion');
    $resultado= $this->db->get('tipo_transaccion');
    return $resultado -> result_array();
  }
  function select2(){
    $this->db->select('cod_oferta, oferta');
    $resultado= $this->db->get('ofertas');
    return $resultado -> result_array();
  }
  function select3(){
    $this->db->select('cod_tipo_producto, tipo_producto');
    $resultado= $this->db->get('tipo_producto');
    return $resultado -> result_array();
  }
  function num_venta(){
    $query='SELECT * FROM ventas';
    $resultado = $this->db->query($query);
    return $resultado -> num_rows();
  }
  function comprobar_cliente($param){
    $this->db->select('cod_persona');
    $this->db->where('cod_persona',$param);
    $resultado=$this->db->get('persona');
    if ($resultado -> num_rows() != 0){
      return true;
    }else{
      return false;
    }
  }
  function eliminar($cod, $hab){
    $this->db->where('cod_cargo', $cod);
    $this->db->update('cargo', $hab);
    if($this->db->affected_rows()>0){
      return true;
    }else{
      return false;
    }
  }
  function guardar($guardar){
    if ($this->db->insert('cargo',$guardar)){
      return true;
    }else{
      return false;
    }
  }
  function cantidad_producto($arg){
    $this->db->select('stock_producto');
    $this->db->from('productos');
    $this->db->where('cod_producto', $arg);
    $resultado = $this->db->get();
    return $resultado->result();
  }
  function detalle_venta($guardar){
    $this->db->insert('detalle_venta',$guardar);
  }
  function detalle_servicio($guardar){
    $this->db->insert('detalle_servicio',$guardar);
  }
  function nueva_venta($guardar){
    $this->db->insert('ventas',$guardar);
  }
    function num_rows(){
          $num = $this->db->count_all('cargo');
          $num = $num+1;
          return $num;
      }
  function productos_slct($arg){
    $this->db->select('p.cod_producto, p.producto, m.marca, tp.tipo_producto, p.precio_producto precio');
    $where = 'p.cod_producto like "%'.$arg.'%" OR p.producto LIKE "%'.$arg.'%" OR m.marca LIKE "%'.$arg.'%" OR tp.tipo_producto LIKE "%'.$arg.'%" OR p.precio_producto LIKE "%'.$arg.'%"';
    $this->db->where($where);
    $this->db->join('marca m', 'm.cod_marca = p.cod_marca');
    $this->db->join('tipo_producto tp', 'tp.cod_tipo_producto = p.cod_tipo_producto');
    $this->db->from('productos p');
    $resultado = $this->db->get();
    return $resultado -> result_array();
  }
  function servicios_slct($arg){
    $this->db->select('cod_servicio, servicio, precio');
    $where = 'cod_servicio like "%'.$arg.'%" OR servicio LIKE "%'.$arg.'%" OR precio LIKE "%'.$arg.'%"';
    $this->db->where($where);
    $this->db->from('servicio');
    $resultado = $this->db->get();
    return $resultado -> result_array();
  }
  function estadias_slct($arg, $arg1){
    $this->db->select('e.cod_estadia, e.fecha_reserva, e.fecha_ingreso, e.fecha_salida');
    $this->db->from('estadia e');
    $this->db->where('e.cod_cliente', $arg1);
    $resultado = $this->db->get();
    return $resultado -> result_array();
  }
  function get_det($arg){
    $this->db->select('servicio, precio');
    $this->db->where('cod_servicio',$arg);
    $resultado = $this->db->get('servicio');
    return $resultado->result_array();
  }
  function get_det_p($arg){
    $this->db->select('producto, precio_producto precio');
    $this->db->where('cod_producto',$arg);
    $resultado = $this->db->get('productos');
    return $resultado->result_array();
  }
}
