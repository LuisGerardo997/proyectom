<?php
class Ubigeo_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    function consultar(){
        $this->db->select('u.cod_ciudad, u.ciudad, u.provincia, u.departamento');
        $this->db->where('u.estado',null,false);
        $this->db->from('ubigeo u');
        $data = $this->db->get();
        return $data->result();
    }
    function guardar($guardar){
       if ($this->db->insert('ubigeo',$guardar)){
         return true;
       }else{
        return false;
       }
    }
    
    function actualizar($cod,$hab){
        $this->db->where('cod_ciudad',$cod);
        $this->db->update('ubigeo',$hab);
       if($this->db->affected_rows()>0){
         return true;
       }else{
         return false;
       }
    }
    
    function eliminar($cod, $hab){
        $this->db->where('cod_ciudad', $cod);
        $this->db->update('ubigeo', $hab);
       if($this->db->affected_rows()>0){
         return true;
       }else{
         return false;
       }
    }
}

