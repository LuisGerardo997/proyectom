<?php
class Parametro_model extends CI_Model{
    function __constuct(){
        parent::__construct();
    }
    
    function consultar(){
        $this->db->select('pa.cod_parametro, pa.descripcion, pa.valor');
        $this->db->where('pa.estado','1');
        $this->db->from('parametros pa');
        $data = $this->db->get();
        return $data->result();
    }
    
    function guardar($guardar){
        if ($this->db->insert('parametros',$guardar)){
            return true;
        }
        
        else {
            return false;
        }
    }
    
    function actualizar($cod,$hab){
        $this->db->where('cod_parametro',$cod);
        $this->db->update('parametros',$hab);
        if($this->db->affected_rows()>0){
            return true;  
        }
        
        else {
            return false;
        }
    }
    
    function eliminar($cod, $hab){
        $this->db->where('cod_parametro', $cod);
        $this->db->update('parametros', $hab);
        if($this->db->affected_rows()>0){
            return true;
        }
        
        else {
            return false;
        }
    }
}