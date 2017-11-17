<?php
class Modulo_model extends CI_Model{
    function __constuct(){
        parent::__construct();
    }

    function consultar(){
        $this->db->select('m.cod_modulo, mo.modulo pmodulo, m.modulo');
        $this->db->where('m.estado','1');
        $this->db->join('modulos m', 'm.parent_cod_modulo = mo.cod_modulo','right');
        $data = $this->db->get('modulos mo');
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
