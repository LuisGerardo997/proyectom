<?php
class Reservaciones_model extends CI_Model{

  function __constuct(){
    parent::__construct();
  }
  function consultar(){
    $this->db->select('r.cod_estadia, r.cod_cliente, e.estado_estadia estado, r.fecha_reserva, r.fecha_ingreso, r.fecha_salida');
    $this->db->join('estado_estadia e', 'r.estado = e.cod_estado_estadia');
    $this->db->where('r.estado', '1');
    $this->db->or_where('r.estado', '2');
    $data = $this->db->get('estadia r');
    return $data->result_array();
  }
  function consultar_estadia($arg){
    $this->db->select('e.cod_estadia, p.cod_persona, p.nombres, p.apellido_paterno, p.apellido_materno, e.cod_empleado, e.fecha_reserva, e.fecha_ingreso, e.fecha_salida');
    $this->db->where('e.cod_estadia',$arg);
    $this->db->join('persona p', 'p.cod_persona = e.cod_cliente');
    $data = $this->db->get('estadia e');
    return $data->result_array();
  }
  function consultar_habitacion_estadia($arg){
    $this->db->select('pe.cod_persona, pe.nombres, pe.apellido_paterno, pe.apellido_materno, ha.cod_habitacion, he.fecha_ingreso, he.fecha_salida');
    $this->db->where('he.cod_estadia',$arg);
    $this->db->order_by('ha.cod_habitacion', 'ASC');
    $this->db->join('persona pe','pe.cod_persona = he.cod_persona', 'left');
    $this->db->join('estadia es','es.cod_estadia = he.cod_estadia', 'left');
    $this->db->join('habitacion ha','ha.cod_habitacion = he.cod_habitacion', 'left');
    $data = $this->db->get('habitacion_estadia he');
    return $data->result_array();
  }
  function actualizar($cod,$hab){
    $this->db->where('cod_estadia',$cod);
    $this->db->update('estadia',$hab);
    if($this->db->affected_rows()>0){
      return true;
    }else{
      return false;
    }
  }
  function select1(){
    $this->db->select('cod_tipo_transaccion, tipo_transaccion');
    $resultado= $this->db->get('tipo_transaccion');
    return $resultado -> result_array();
  }
  function select2(){
    $this->db->select('cod_oferta, oferta');
    $resultado= $this->db->get('ofertas');
    return $resultado -> result_array();
  }
  function num_reservacion(){
    $query='SELECT * FROM estadia';
    $resultado=$this->db->query($query);
    return $resultado -> num_rows();
  }
  function comprobar_cliente($param){
    $this->db->select('cod_persona, nombres, apellido_paterno, apellido_materno');
    $this->db->where('cod_persona',$param);
    $resultado=$this->db->get('persona');
    if ($resultado -> result_array() != ''){
      return $resultado -> result_array();
    }else{
      return false;
    }
  }
  function eliminar($cod, $estado){
    $this->db->where('cod_estadia', $cod);
    $this->db->update('estadia', $estado);
    if($this->db->affected_rows()>0){
      return true;
    }else{
      return false;
    }
  }
  function guardar($guardar){
    if ($this->db->insert('cargo',$guardar)){
      return true;
    }else{
      return false;
    }
  }
    function num_rows(){
          $num = $this->db->count_all('cargo');
          $num = $num+1;
          return $num;
      }
  function room_list($arg, $arg1){
    $this->db->select('h.cod_habitacion, th.tipo_habitacion, h.piso, th.precio_tipo_habitacion precio');
    if ($arg != '' or $arg1 !=''){
      $this->db->group_start();
      $where = ("h.cod_habitacion NOT IN (SELECT cod_habitacion FROM habitacion_estadia WHERE (fecha_ingreso BETWEEN '".$arg."' AND '".$arg1."') OR (fecha_salida BETWEEN '".$arg."' AND '".$arg1."'))");
      $this->db->where($where);
      $this->db->group_end();
    };
    $this->db->where('h.cod_estado_habitacion', 1);
    $this->db->join('tipo_habitacion th', 'th.cod_tipo_habitacion = h.cod_tipo_habitacion');
    $this->db->from('habitacion h');
    $resultado = $this->db->get();
    return $resultado->result_array();
  }
  function detalle_habitacion($arg){
    $this->db->select('h.cod_habitacion, th.tipo_habitacion, h.piso, th.max_h');
    $this->db->where('h.cod_habitacion',$arg);
    $this->db->join('tipo_habitacion th', 'th.cod_tipo_habitacion = h.cod_tipo_habitacion');
    $this->db->from('habitacion h');
    $resultado = $this->db->get();
    return $resultado->result_array();
  }
  function registrar1($guardar){
    if ($this->db->insert('estadia',$guardar)){
      return true;
    }else{
      return false;
    }
  }
  function existencia($arg){
    $this->db->select('cod_persona');
    $this->db->where('cod_persona', $arg);
    $resultado = $this->db->get('persona');
    if ($resultado->num_rows() == 1){
      return true;
    }else{
      return false;
    }
  }/*
  function registrar2($arg1, $arg2, $arg3, $arg4, $arg5){
    $c = 0;
    foreach($arg4 as $fila){
      for($i=0; $i<count($arg5); $i++){
        $persona = $arg5[$i];
        $len_cad = strlen($fila);
        $habitacion = substr($persona, 0, $len_cad);
        if ($fila == $habitacion){
          $huesped = substr($persona, $len_cad);
          if ($this->Reservaciones_model->existencia($huesped)==0){
            $datos_p = array(
              'cod_persona' => $huesped,
              'estado' => 1,
            );
            $this->db->insert('persona',$huesped);
          }
          $datos2 = array(
            'cod_estadia' => $arg1,
            'cod_habitacion' => $fila,
            'cod_persona' => $huesped,
            'fecha_ingreso' => $arg3,

          );
          if(!$this->db->insert('habitacion_estadia',$datos2)){
            $c++;
          }
          if ($c == 0){
            return true;
          }else{
            return false;
          }
        }
      }
    }
  }*/
  function registrar_detalle_estadia($arg){
    if($this->db->insert('habitacion_estadia',$arg)){
      return true;
    }else{
      return false;
    }
  }
  function registrar_cliente($arg){
    if($this->db->insert('persona',$arg)){
      return true;
    }else{
      return false;
    }
  }
  function habitaciones_reservadas($arg, $status){
    $this->db->select('he.cod_habitacion');
    $this->db->join('habitacion h', 'h.cod_habitacion = he.cod_habitacion');
    $this->db->where('he.cod_estadia', $arg);
    $this->db->where('h.cod_estado_habitacion', $status);
    $resultado = $this->db->get('habitacion_estadia he');
    return $resultado->result();
  }
  function detalle_habitacion_estadia($cod_estadia){
    $this->db->select('e.cod_estadia, th.max_h, th.tipo_habitacion, h.cod_habitacion, th.max_h-(select count(*) from habitacion_estadia where cod_estadia = '.$cod_estadia.') espacios');
    $this->db->from('habitacion_estadia he');
    $this->db->join('estadia e', 'e.cod_estadia = he.cod_estadia');
    $this->db->join('habitacion h', 'h.cod_habitacion = he.cod_habitacion');
    $this->db->join('tipo_habitacion th', 'th.cod_tipo_habitacion = h.cod_tipo_habitacion');
    $this->db->where('e.cod_estadia', $cod_estadia);
    $response = $this->db->get();
    return $response->result_array();
  }
}
