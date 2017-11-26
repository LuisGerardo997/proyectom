<?php
class Reservaciones_model extends CI_Model{

  function __constuct(){
    parent::__construct();
  }
  function consultar(){
    $this->db->select('v.cod_venta, pc.cod_persona cod_pc, pc.nombres nombres_c, pc.apellido_paterno apellido_p_c, pc.apellido_materno apellido_m_c, pe.cod_persona cod_pe, pe.nombres nombres_e, pe.apellido_paterno apellido_p_e, pe.apellido_materno apellido_m_e, tt.tipo_transaccion, o.oferta, v.fecha_venta');
    $this->db->where('v.estado','0');
    $this->db->from('ventas v');
    $this->db->join('persona pc', 'pc.cod_persona = v.cod_cliente');
    $this->db->join('persona pe', 'pe.cod_persona = v.cod_cliente');
    $this->db->join('tipo_transaccion tt', 'tt.cod_tipo_transaccion = v.cod_tipo_transaccion');
    $this->db->join('ofertas o', 'o.cod_oferta = v.cod_oferta');
    $data = $this->db->get();
    return $data->result();
  }
  function actualizar($cod,$hab){
    $this->db->where('cod_cargo',$cod);
    $this->db->update('cargo',$hab);
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
  function num_venta(){
    $query='SELECT * FROM ventas';
    $resultado=$this->db->query($query);
    return $resultado -> num_rows();
  }
  function comprobar_cliente($param){
    $this->db->select('cod_persona');
    $this->db->where('cod_persona',$param);
    $resultado=$this->db->get('persona');
    if ($resultado -> num_rows() != 0){
      return true;
    }else{
      return false;
    }
  }
  function eliminar($cod, $hab){
    $this->db->where('cod_cargo', $cod);
    $this->db->update('cargo', $hab);
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
}
