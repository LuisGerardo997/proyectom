<?php
class Tipo_movimiento_model extends CI_Model{

  function __constuct(){
    parent::__construct();
  }
  function consultar(){
    $this->db->select('tm.cod_tipo_movimiento, tm.tipo_movimiento');
    $this->db->where('tm.estado',null,false);
    $this->db->from('tipo_movimiento tm');
    $data = $this->db->get();
    return $data->result();
  }
  function actualizar($cod,$hab){
    $this->db->where('cod_tipo_movimiento',$cod);
    $this->db->update('tipo_movimiento',$hab);
    if($this->db->affected_rows()>0){
      return true;
    }else{
      return false;
    }
  }
  function eliminar($cod, $hab){
    $this->db->where('cod_tipo_movimiento', $cod);
    $this->db->update('tipo_movimiento', $hab);
    if($this->db->affected_rows()>0){
      return true;
    }else{
      return false;
    }
  }
  function guardar($guardar){
    if ($this->db->insert('tipo_movimiento',$guardar)){
      return true;
    }else{
      return false;
    }
  }
    function num_rows(){
          $num = $this->db->count_all('tipo_movimiento');
          $num = $num+1;
          return $num;
      }
}
