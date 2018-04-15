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

  function nro_disp($cod){
    $this->db->from('habitacion');
    $this->db->where('cod_tipo_habitacion', $cod);
    $this->db->where('cod_estado_habitacion', '1');
    $resultado = $this->db->count_all_results();
    return $resultado;
  }
  function nro_man($cod){
    $this->db->from('habitacion');
    $this->db->where('cod_tipo_habitacion', $cod);
    $this->db->where('cod_estado_habitacion', '3');
    $resultado = $this->db->count_all_results();
    return $resultado;
  }
  function nro_ocu($cod){
    $this->db->from('habitacion');
    $this->db->where('cod_tipo_habitacion', $cod);
    $this->db->where('cod_estado_habitacion', '2');
    $resultado = $this->db->count_all_results();
    return $resultado;
  }
  function habitaciones_disponibles(){
    $this->db->select('h.cod_habitacion, th.tipo_habitacion');
    $this->db->from('habitacion h');
    $this->db->join('tipo_habitacion th', 'th.cod_tipo_habitacion = h.cod_tipo_habitacion');
    $this->db->where('cod_estado_habitacion', '1');
    $resultado = $this->db->get();
    return $resultado->result_array();
  }
  function habitaciones_reservadas($arg1){
    $this->db->select('e.cod_estadia, h.cod_habitacion, th.tipo_habitacion, h.piso');
    $this->db->from('habitacion_estadia he');
    $this->db->join('habitacion h', 'h.cod_habitacion = he.cod_habitacion');
    $this->db->join('tipo_habitacion th', 'th.cod_tipo_habitacion = h.cod_tipo_habitacion');
    $this->db->join('estadia e', 'e.cod_estadia = he.cod_estadia');
    // $this->db->where('e.estado', '2');
    $this->db->where('e.cod_cliente', $arg1);
    $resultado = $this->db->get();
    return $resultado->result_array();
  }
  function lista_actual(){
    $this->db->select('arreglo');
    $respuesta = $this->db->get('notificaciones');
    return $respuesta->row();
  }
  function nueva_lista($arreglo){
    $this->db->where('id', '1');
    $this->db->update('notificaciones', $arreglo);
    if($this->db->affected_rows()>0){
      return true;
    }else{
      return false;
    }
  }
}
