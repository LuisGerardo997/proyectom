<?php
class Marca_model extends CI_Model{

  function __constuct(){
    parent::__construct();
  }
  function consultar(){
    $this->db->select('m.cod_marca , m.marca, m.descripcion');
    $this->db->where('m.estado',null,false);
    $this->db->from('marca m');
    $data = $this->db->get();
    return $data->result();
  }
  function actualizar($cod,$hab){
    $this->db->where('cod_marca',$cod);
    $this->db->update('marca',$hab);
    if($this->db->affected_rows()>0){
      return true;
    }else{
      return false;
    }
  }
  function eliminar($cod, $hab){
    $this->db->where('cod_marca', $cod);
    $this->db->update('marca', $hab);
    if($this->db->affected_rows()>0){
      return true;
    }else{
      return false;
    }
  }
  function guardar($guardar){
    if ($this->db->insert('marca',$guardar)){
      return true;
    }else{
      return false;
    }
  }
}
