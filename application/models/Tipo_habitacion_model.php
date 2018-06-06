<?php
class Tipo_habitacion_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function consultar(){
        $this->db->select('th.cod_tipo_habitacion, th.tipo_habitacion, th.descripcion, th.precio_tipo_habitacion, th.max_h');
        $this->db->where('th.estado','1');
        $this->db->from('tipo_habitacion th');
        $this->db->order_by('th.precio_tipo_habitacion', 'ASC');
        $data = $this->db->get();
        return $data->result();
    }
function guardar($guardar){
    if ($this->db->insert('tipo_habitacion',$guardar)){
      return true;
    }else{
      return false;
    }
  }
  function lista_habitaciones()
  {
    $this->db->select('cod_tipo_habitacion, tipo_habitacion');
    $this->db->where('estado', '1');
    $result = $this->db->get('tipo_habitacion');
    return $result -> result();
  }
    function actualizar($cod,$hab){
    $this->db->where('cod_tipo_habitacion',$cod);
    $this->db->update('tipo_habitacion',$hab);
    if($this->db->affected_rows()>0){
      return true;
    }else{
      return false;
    }
  }

  function eliminar($cod, $hab){
    $this->db->where('cod_tipo_habitacion', $cod);
    $this->db->update('tipo_habitacion', $hab);
    if($this->db->affected_rows()>0){
      return true;
    }else{
      return false;
    }
  }
    function num_rows(){
          $num = $this->db->count_all('tipo_habitacion');
          $num = $num+1;
          return $num;
      }
}
