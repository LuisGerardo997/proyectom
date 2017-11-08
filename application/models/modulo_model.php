<?php
class Modulo_model extends CI_Model{
    function __constuct(){
        parent::__construct();
    }

    function consultar(){
        $this->db->select('h.cod_modulo, p.modulo pmodulo, h.modulo');
        $this->db->where('p.estado','1');
        $this->db->from('modulos h');
        $this->db->join('modulos p','h.parent_cod_modulo = p.cod_modulo','left');
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
}
