<?php
class Acceso_model extends CI_Model{
    function __constuct(){
        parent::__construct();
    }
    
    function consultar(){
        $this->db->select('mo.cod_modulo, mo.modulo, pe.cod_perfil, pe.perfil');
        $this->db->where('ac.estado','1');
        $this->db->from('accesos ac');
        $this->db->join('modulos mo','mo.cod_modulo = ac.cod_modulo');
        $this->db->join('perfil pe','pe.cod_perfil = ac.cod_perfil');
        $data = $this->db->get();
        return $data->result();
    }
    
    function guardar($guardar){
        if ($this->db->insert('accesos',$guardar)){
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
        $this->db->select('cod_modulo, modulo');
        $resultado= $this->db->get('modulos');
        return $resultado -> result_array();
    }
    
    function eliminar($p, $p1, $hab){
        $this->db->where('cod_perfil', $p);
        $this->db->where('cod_modulo', $p1);
        $this->db->update('accesos', $hab);
        if($this->db->affected_rows()>0){
            return true;
        }
        
        else {
            return false;
        }
    }
}
