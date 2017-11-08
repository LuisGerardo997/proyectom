<?php
class Habitacion_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    function consultar(){
        $this->db->select('h.cod_habitacion, th.tipo_habitacion, h.piso');
        $this->db->where('h.estado','0');
        $this->db->from('habitacion h');
        $this->db->join('tipo_habitacion th','th.cod_tipo_habitacion = h.cod_tipo_habitacion');
        $data = $this->db->get();
        return $data->result();
    }

    function guardar($guardar){
    if ($this->db->insert('habitacion',$guardar)){
      return true;
    }else{
      return false;
    }
  }
  
    function actualizar($cod,$hab){
    $this->db->where('cod_habitacion',$cod);
    $this->db->update('habitacion',$hab);
    if($this->db->affected_rows()>0){
      return true;
    }else{
      return false;
    }
  }

   function select(){
    $this->db->select('cod_tipo_habitacion, tipo_habitacion');
    $resultado= $this->db->get('tipo_habitacion');
    return $resultado -> result_array();
  }
    
  function eliminar($cod, $hab){
    $this->db->where('cod_habitacion', $cod);
    $this->db->update('habitacion', $hab);
    if($this->db->affected_rows()>0){
      return true;
    }else{
      return false;
    }
  }
}


