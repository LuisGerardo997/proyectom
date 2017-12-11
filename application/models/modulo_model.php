<?php
class Modulo_model extends CI_Model{
    function __constuct(){
        parent::__construct();
    }

    function consultar(){
        $this->db->select('m.cod_modulo, mo.modulo pmodulo, m.modulo');
        $this->db->where('m.estado','1');
        $this->db->join('modulos m', 'm.parent_cod_modulo = mo.cod_modulo', 'right');
        $data = $this->db->get('modulos mo');
        return $data->result();

    }
    function consultar_padres(){
        $this->db->select('cod_modulo, modulo, icono');
        $this->db->where('estado','1');
        $this->db->where('parent_cod_modulo',null, true);
        $data = $this->db->get('modulos');
        return $data->result_array();

    }
    function consultar_hijos($argu){
        $this->db->select('cod_modulo, modulo, ruta');
        $this->db->where('estado','1');
        $this->db->where('parent_cod_modulo', $argu);
        $data = $this->db->get('modulos');
        return $data->result_array();

    }
    function consultar_submodulos($cod_modulo){
        $this->db->select('mo.cod_modulo, mo.modulo pmodulo');
        $this->db->from('modulos m');
        $this->db->where('m.estado','1');
        $this->db->where('m.cod_modulo', $cod_modulo);
        $this->db->join('modulos mo', 'mo.parent_cod_modulo = m.cod_modulo','right');
        $data = $this->db->get();
        return $data->result();

    }

function guardar($guardar){
    if ($this->db->insert('modulos',$guardar)){
        return true;
    }

    else {
        return false;
    }
}

function actualizar($cod,$hab){
$this->db->where('cod_modulo',$cod);
$this->db->update('modulos',$hab);
if($this->db->affected_rows()>0){
  return true;
}else{
  return false;
}
}
function select1(){
  $this->db->select('cod_modulo, modulo');
  $this->db->from('modulos');
  $this->db->where('parent_cod_modulo', NULL, false);
  $resultado= $this->db->get();
  return $resultado -> result_array();
}

function eliminar($p, $hab){
    $this->db->where('cod_modulo', $p);
    $this->db->update('modulos', $hab);
    if($this->db->affected_rows()>0){
        return true;
    }

    else {
        return false;
    }
}
  function num_rows(){
        $num = $this->db->count_all('modulos');
        $num = $num+1;
        return $num;
    }
}
