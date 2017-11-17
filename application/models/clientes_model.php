<?php
class Clientes_model extends CI_Model{

  function __constuct(){
    parent::__construct();
  }
  function consultar(){
    $this->db->select('p.cod_persona, p.nombres, p.apellido_paterno, p.apellido_materno, p.ruc, p.email, p.genero, p.tel_movil, u.ciudad');
    $this->db->where('p.estado','0');
    $this->db->from('persona p');
    $this->db->join('ubigeo u','u.cod_ciudad = p.cod_ciudad_direccion','left');
    $data = $this->db->get();
    return $data->result();
  }
  function guardar($guardar){
    if ($this->db->insert('persona',$guardar)){
      return true;
    }else{
      return false;
    }
  }
  function actualizar($cod,$hab){
    $this->db->where('cod_persona',$cod);
    $this->db->update('persona',$hab);
    if($this->db->affected_rows()>0){
      return true;
    }else{
      return false;
    }
  }
  function select1(){
    $this->db->select('cod_ciudad, ciudad');
    $resultado= $this->db->get('ubigeo');
    return $resultado -> result_array();
  }
  function eliminar($cod, $hab){
    $this->db->where('cod_persona', $cod);
    $this->db->update('persona', $hab);
    if($this->db->affected_rows()>0){
      return true;
    }else{
      return false;
    }
  }
  function consulta_extendida(){
    $this->db->select('cod_persona');
    $resultado = $this->db->get('persona');
    return $resultado->result();
  }
}
