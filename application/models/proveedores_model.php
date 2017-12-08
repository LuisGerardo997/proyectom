<?php
class Proveedores_model extends CI_Model{

  function __constuct(){
    parent::__construct();
  }
  function consultar(){
    $this->db->select('pr.cod_proveedor, pr.nombres, pr.apellido_paterno, pr.apellido_materno, pr.dni, u.ciudad, pr.razon_social,pr.descripcion');
    $this->db->where('pr.estado','0');
    $this->db->from('proveedores pr');
    $this->db->join('ubigeo u','u.cod_ciudad = pr.cod_ciudad');
    $data = $this->db->get();
    return $data->result();
  }
  function actualizar($cod,$hab){
    $this->db->where('cod_proveedor',$cod);
    $this->db->update('proveedores',$hab);
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
    $this->db->where('cod_proveedor', $cod);
    $this->db->update('proveedores', $hab);
    if($this->db->affected_rows()>0){
      return true;
    }else{
      return false;
    }
  }
  function guardar($guardar){
    if ($this->db->insert('proveedores',$guardar)){
      return true;
    }else{
      return false;
    }
  }
}
