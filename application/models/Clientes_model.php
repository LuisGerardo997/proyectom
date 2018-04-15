<?php
class Clientes_model extends CI_Model{

  function __constuct(){
    parent::__construct();
  }
  function consultar(){
        $this->db->select('p.cod_persona, p.nombres, p.apellido_paterno, p.apellido_materno, p.ruc, p.email, p.genero, p.tel_movil, p.direccion, p.nro_cuenta_bancaria, p.nombre_banco, p.tel_domicilio, p.operador_movil, p.fecha_nacimiento, ub.ciudad ciudad_nacimiento, u.ciudad ciudad_direccion, e.estado_civil, tp.tipo_persona');
        // $this->db->where('p.estado','0');
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
    $this->db->order_by('ciudad','asc');
    $resultado= $this->db->get('ubigeo');
    return $resultado -> result_array();
  }
  function select2(){
    $this->db->select('cod_estado_civil, estado_civil');
      $this->db->order_by('estado_civil','asc');
    $resultado= $this->db->get('estado_civil');
    return $resultado -> result_array();
  }
  function select3(){
    $this->db->select('cod_tipo_persona, tipo_persona');
      $this->db->order_by('tipo_persona','asc');
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
  function clientes_procesados()
  {
    $where = 'v.cod_venta not in(select cod_venta from cronograma_ventas) or e.cod_estadia not in(select cod_estadia from cronograma_estadia)';
    $this->db->select('p.cod_persona');
    $this->db->from('persona p');
    $this->db->join('ventas v', 'v.cod_cliente = p.cod_persona', 'left');
    $this->db->join('estadia e', 'e.cod_cliente = p.cod_persona', 'left');
    $this->db->where($where);
    $resultado = $this->db->get();
    return $resultado->result_array();
  }
  
  function consultar_deudores($arr)
  {
    $this->db->distinct();
    $this->db->select('cod_persona, nombres, apellido_paterno, apellido_materno');
    $this->db->from('persona');
    $this->db->where_in('cod_persona', $arr);
    $resultado = $this->db->get();
    return $resultado->result_array();
  }
  function consultar_cliente($cliente){
    $this->db->select('cod_persona');
    $this->db->where('cod_persona', $cliente);
    $resultado = $this->db->get('persona');
    if ($resultado->num_rows() == 1){
      return true;
    }else{
      return false;
    }
  }
}
