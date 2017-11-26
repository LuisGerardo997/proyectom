<?php
class Clientes_model extends CI_Model{

  function __constuct(){
    parent::__construct();
  }
  function consultar(){
        $this->db->select('p.cod_persona, p.nombres, p.apellido_paterno, p.apellido_materno, p.ruc, p.email, p.genero, p.tel_movil, p.direccion, p.nro_cuenta_bancaria, p.nombre_banco, p.tel_domicilio, p.operador_movil, p.fecha_nacimiento, p.profesion, p.num_hijos, p.estatura_cm, p.peso_kg, p.tipo_sangre, p.hobby, p.deporte_favorito, ub.ciudad ciudad_nacimiento, u.ciudad ciudad_direccion, e.estado_civil, tp.tipo_persona, p.observacion_persona');
        $this->db->where('p.estado','0');
        $this->db->from('persona p');
        $this->db->join('ubigeo u','u.cod_ciudad = p.cod_ciudad_direccion','left');
        $this->db->join('ubigeo ub','ub.cod_ciudad = p.cod_ciudad_nacimiento','left');
        $this->db->join('cargo c','c.cod_cargo = p.cod_cargo','left');
        $this->db->join('estado_civil e','e.cod_estado_civil = p.cod_estado_civil','left');
        $this->db->join('tipo_persona tp','tp.cod_tipo_persona = p.cod_tipo_persona','left');
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
  function select2(){
    $this->db->select('cod_estado_civil, estado_civil');
    $resultado= $this->db->get('estado_civil');
    return $resultado -> result_array();
  }
  function select3(){
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
