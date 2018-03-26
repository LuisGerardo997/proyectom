<?php
class Tipo_documento_model extends CI_Model{

  function __constuct(){
    parent::__construct();
  }
  function consultar(){
    $this->db->select('td.cod_tipo_documento, td.descripcion, td.nro_serie, td.nro_correlativo');
    $this->db->where('td.estado','1');
    $this->db->from('tipo_documento td');
    $data = $this->db->get();
    return $data->result();
  }
  function actualizar($cod,$hab){
    $this->db->where('cod_tipo_documento',$cod);
    $this->db->update('tipo_documento',$hab);
    if($this->db->affected_rows()>0){
      return true;
    }else{
      return false;
    }
  }
  function eliminar($cod, $hab){
    $this->db->where('cod_tipo_documento', $cod);
    $this->db->update('tipo_documento', $hab);
    if($this->db->affected_rows()>0){
      return true;
    }else{
      return false;
    }
  }
  function guardar($guardar){
    if ($this->db->insert('tipo_documento',$guardar)){
      return true;
    }else{
      return false;
    }
  }
    function num_rows(){
          $num = $this->db->count_all('tipo_documento');
          $num = $num+1;
          return $num;
      }
}
