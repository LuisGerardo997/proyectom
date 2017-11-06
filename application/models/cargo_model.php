<?php
class Cargo_model extends CI_Model{

  function __constuct(){
    parent::__construct();
  }
  function consultar(){
    $this->db->select('c.cod_cargo, a.area, c.descripcion, c.cargo');
    $this->db->where('c.estado','0');
    $this->db->from('cargo c');
    $this->db->join('area a','a.cod_area = c.cod_area', 'left');
    $data = $this->db->get();
    return $data->result();
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
    $this->db->select('cod_area, area');
    $resultado= $this->db->get('area');
    return $resultado -> result_array();
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
}
