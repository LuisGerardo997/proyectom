<?php
class Detalle_persona_perfil_model extends CI_Model{
    function __constuct(){
        parent::__construct();
    }
    
    function consultar(){
        $this->db->select('p.cod_perfil, p.perfil, pe.cod_persona, pe.apellido_paterno, pe.apellido_materno,  pe.nombres');
        $this->db->where('dpp.estado','1');
        $this->db->from('detalle_persona_perfil dpp');
        $this->db->join('perfil p','dpp.cod_perfil = p.cod_perfil');
        $this->db->join('persona pe','dpp.cod_persona = pe.cod_persona');
        $data = $this->db->get();
        return $data->result();
    }
    
    function guardar($guardar){
        if ($this->db->insert('detalle_persona_perfil',$guardar)){
            return true;
        }
        
        else {
            return false;
        }
    }
    
    function select1(){
        $this->db->select('cod_perfil, perfil');
        $resultado= $this->db->get('perfil');
        return $resultado -> result_array();
    }
    
    function select2(){
        $this->db->select('cod_persona, apellido_paterno, apellido_materno, nombres');
        $resultado= $this->db->get('persona');
        return $resultado -> result_array();
    }
    
    function eliminar($p, $p1, $hab){
        $this->db->where('cod_perfil', $p);
        $this->db->where('cod_persona', $p1);
        $this->db->update('detalle_persona_perfil', $hab);
        if($this->db->affected_rows()>0){
            return true;
        }
        
        else {
            return false;
        }
    }
}
