<?php
class Productos_model extends CI_Model{

  function __constuct(){
    parent::__construct();
  }
  function consultar(){
    $this->db->select('p.cod_producto, m.marca, tp.tipo_producto, p.producto, p.descripcion, p.precio_producto, p.stock_producto, p.stock_minimo, p.stock_maximo');
    $this->db->where('p.estado','0');
    $this->db->from('productos p');
    $this->db->join('marca m','m.cod_marca  = p.cod_marca');
    $this->db->join('tipo_producto tp','tp.cod_tipo_producto  = p.cod_tipo_producto');
    $data = $this->db->get();
    return $data->result();
  }
  function actualizar($cod,$hab){
    $this->db->where('cod_producto',$cod);
    $this->db->update('productos',$hab);
    if($this->db->affected_rows()>0){
      return true;
    }else{
      return false;
    }
  }
  function buscar_producto($cod_p){
    $this->db->where('cod_producto', $cod_p);
    $resultado = $this->db->get('productos');
    return $resultado -> result_array();
  }
  function select1(){
    $this->db->select('cod_marca, marca');
    $resultado= $this->db->get('marca');
    return $resultado -> result_array();
  }
  function select2(){
    $this->db->select('cod_tipo_producto, tipo_producto');
    $resultado= $this->db->get('tipo_producto');
    return $resultado -> result_array();
  }
  function eliminar($cod, $hab){
    $this->db->where('cod_producto', $cod);
    $this->db->update('productos', $hab);
    if($this->db->affected_rows()>0){
      return true;
    }else{
      return false;
    }
  }
  function guardar($guardar){
    if ($this->db->insert('Productos',$guardar)){
      return true;
    }else{
      return false;
    }
  }
}
