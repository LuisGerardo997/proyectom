<?php
class Caja_model extends CI_Model{
    function __constuct(){
        parent::__construct();
    }
    
    function consultar(){
        $this->db->select('c.cod_caja, c.nro_caja, c.descripcion');
        $this->db->where('c.estado','1');
        $this->db->from('caja c');
        $data = $this->db->get();
        return $data->result();
    }
    
    function guardar($guardar){
        if ($this->db->insert('caja',$guardar)){
            return true;
        }
        
        else {
            return false;
        }
    }
    
    function actualizar($cod,$hab){
        $this->db->where('cod_caja',$cod);
        $this->db->update('caja',$hab);
        if($this->db->affected_rows()>0){
            return true;  
        }
        
        else {
            return false;
        }
    }
    
    function eliminar($cod, $hab){
        $this->db->where('cod_caja', $cod);
        $this->db->update('caja', $hab);
        if($this->db->affected_rows()>0){
            return true;
        }
        
        else {
            return false;
        }
    }
}
