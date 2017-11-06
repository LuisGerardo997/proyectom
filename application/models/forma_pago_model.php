<?php
class Forma_pago_model extends CI_Model{

  function __constuct(){
    parent::__construct();
  }
  function consultar(){
    $this->db->select('fp.cod_forma_pago, fp.forma_pago, fp.descripcion');
    $this->db->where('fp.estado',null,false);
    $this->db->from('forma_pago fp');
    $data = $this->db->get();
    return $data->result();
  }
  function actualizar($cod,$hab){
    $this->db->where('cod_forma_pago',$cod);
    $this->db->update('forma_pago',$hab);
    if($this->db->affected_rows()>0){
      return true;
    }else{
      return false;
    }
  }
  function eliminar($cod, $hab){
    $this->db->where('cod_forma_pago', $cod);
    $this->db->update('forma_pago', $hab);
    if($this->db->affected_rows()>0){
      return true;
    }else{
      return false;
    }
  }
  function guardar($guardar){
    if ($this->db->insert('forma_pago',$guardar)){
      return true;
    }else{
      return false;
    }
  }
}
