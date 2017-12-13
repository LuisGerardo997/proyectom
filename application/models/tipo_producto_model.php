<?php
class Tipo_producto_model extends CI_Model{

  function __constuct(){
    parent::__construct();
  }
  function consultar(){
    $this->db->select('tp.cod_tipo_producto , tp.tipo_producto, tp.descripcion');
    $this->db->where('tp.estado','1');
    $this->db->from('tipo_producto tp');
    $data = $this->db->get();
    return $data->result();
  }
  function actualizar($cod,$hab){
    $this->db->where('cod_tipo_producto',$cod);
    $this->db->update('tipo_producto',$hab);
    if($this->db->affected_rows()>0){
      return true;
    }else{
      return false;
    }
  }
  function eliminar($cod, $hab){
    $this->db->where('cod_tipo_producto', $cod);
    $this->db->update('tipo_producto', $hab);
    if($this->db->affected_rows()>0){
      return true;
    }else{
      return false;
    }
  }
  function guardar($guardar){
    if ($this->db->insert('tipo_producto',$guardar)){
      return true;
    }else{
      return false;
    }
  }
    function num_rows(){
          $num = $this->db->count_all('tipo_producto');
          $num = $num+1;
          return $num;
      }
}
