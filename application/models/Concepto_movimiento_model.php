<?php
class Concepto_movimiento_model extends CI_Model{

  function __constuct(){
    parent::__construct();
  }
  function consultar(){
    $this->db->select('cm.cod_concepto_movimiento, cm.concepto_movimiento, tm.tipo_movimiento');
    $this->db->where('cm.estado','1');
    $this->db->from('concepto_movimiento cm');
    $this->db->join('tipo_movimiento tm','tm.cod_tipo_movimiento = cm.cod_tipo_movimiento');
    $data = $this->db->get();
    return $data->result();
  }
  function actualizar($cod,$hab){
    $this->db->where('cod_concepto_movimiento',$cod);
    $this->db->update('concepto_movimiento',$hab);
    if($this->db->affected_rows()>0){
      return true;
    }else{
      return false;
    }
  }
  function select1(){
    $this->db->select('cod_tipo_movimiento, tipo_movimiento');
    $this->db->where('estado','1');
    $this->db->order_by('tipo_movimiento','asc');
    $resultado= $this->db->get('tipo_movimiento');
    return $resultado -> result_array();
  }
  function eliminar($cod, $hab){
    $this->db->where('cod_concepto_movimiento', $cod);
    $this->db->update('concepto_movimiento', $hab);
    if($this->db->affected_rows()>0){
      return true;
    }else{
      return false;
    }
  }
  function guardar($guardar){
    if ($this->db->insert('concepto_movimiento',$guardar)){
      return true;
    }else{
      return false;
    }
  }
    function num_rows(){
          $num = $this->db->count_all('concepto_movimiento');
          $num = $num+1;
          return $num;
      }
}
