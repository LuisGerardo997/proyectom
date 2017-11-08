<?php
class Empleados_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    function consultar(){
        $this->db->select('p.cod_persona, p.nombres, p.apellido_paterno, p.apellido_materno, p.ruc, p.email, p.genero, p.tel_movil, u.ciudad, c.cargo, a.area');
        $this->db->where('p.estado','1');
        $this->db->from('persona p');
        $this->db->join('ubigeo u','u.cod_ciudad = p.cod_ciudad_direccion','left');
        $this->db->join('cargo c','c.cod_cargo = p.cod_cargo','left');
        $this->db->join('area a','a.cod_area = c.cod_area','left');
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
    
  function select(){
    $this->db->select('cod_ciudad, ciudad');
    $resultado= $this->db->get('ubigeo');
    return $resultado -> result_array();
  }
  
    function select1(){
    $this->db->select('cod_cargo, cargo');
    $resultado= $this->db->get('cargo');
    return $resultado -> result_array();
  }
  
    function select2(){
    $this->db->select('cod_area, area');
    $resultado= $this->db->get('area');
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
}


