<?php
class Usuarios_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function consultar(){
        $this->db->select('cod_persona, usuario, nombres, apellido_paterno, apellido_materno');
        $this->db->where('estado','1');
        $where = "usuario <> ''";
        $this->db->where($where);
        $data = $this->db->get('persona');
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
    $this->db->select('cod_persona, nombres, apellido_paterno, apellido_materno');
    $this->db->where('estado', '1');
    $where = 'usuario is null';
    $this->db->where($where);
    $resultado = $this->db->get('persona');
    return $resultado -> result_array();
  }

    function select1(){
    $this->db->select('cod_cargo, cargo');
    $resultado= $this->db->get('cargo');
    return $resultado -> result_array();
  }
  function select2(){
    $this->db->select('cod_perfil, perfil');
    $resultado= $this->db->get('perfil');
    return $resultado -> result_array();
  }
  function select3(){
    $this->db->select('cod_estado_civil, estado_civil');
    $resultado= $this->db->get('estado_civil');
    return $resultado -> result_array();
  }
  function select4(){
    $this->db->select('cod_tipo_persona, tipo_persona');
    $resultado= $this->db->get('tipo_persona');
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
