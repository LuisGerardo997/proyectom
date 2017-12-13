<?php
class Habitacion_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    function consultar(){
        $this->db->select('h.cod_habitacion, th.tipo_habitacion, h.piso, x.nombre');
        $this->db->where('h.estado','1');
        $this->db->join('tipo_habitacion th','th.cod_tipo_habitacion = h.cod_tipo_habitacion', 'left');
        $this->db->join('estado_habitacion x','x.cod_estado_habitacion = h.cod_estado_habitacion', 'left');
        $this->db->from('habitacion h');
        $data = $this->db->get();
        return $data->result_array();
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

   function select1(){
    $this->db->select('cod_tipo_habitacion, tipo_habitacion');
    $this->db->where('estado','1');
    $resultado= $this->db->get('tipo_habitacion');
    return $resultado -> result_array();
  }
    
    function select2(){
    $this->db->select('cod_estado_habitacion, nombre');
    $this->db->where('estado','1');
    $resultado= $this->db->get('estado_habitacion');
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