<?php
class Compras_model extends CI_Model{

  function __constuct(){
    parent::__construct();
  }
  function consultar(){
    $this->db->select('c.cod_compra, p.cod_proveedor, p.razon_social, c.fecha_compra');
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
  function num_compra(){
    $query='SELECT * FROM compras';
    $resultado = $this->db->query($query);
    return $resultado -> num_rows();
  }
  function comprobar_proveedor($param){
    $this->db->select('cod_proveedor');
    $this->db->where('cod_proveedor',$param);
    $resultado=$this->db->get('proveedores');
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
  function guardar_compra($guardar){
    if ($this->db->insert('compras',$guardar)){
      return true;
    }else{
      return false;
    }
  }
  function guardar_detalle_compras($guardar){
    if ($this->db->insert('detalle_compras',$guardar)){
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
    function num_rows(){
          $num = $this->db->count_all('cargo');
          $num = $num+1;
          return $num;
      }
  function productos_compra(){
    $this->db->select('p.cod_producto, p.producto, m.marca, tp.tipo_producto, p.stock_producto, p.stock_maximo, p.precio_producto precio');
    $this->db->join('marca m', 'm.cod_marca = p.cod_marca');
    $this->db->join('tipo_producto tp', 'tp.cod_tipo_producto = p.cod_tipo_producto');
    $this->db->from('productos p');
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
}
