<?php
class Servicios_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function consultar(){
        $this->db->select('s.cod_servicio, s.servicio, s.precio');
        $this->db->where('s.estado',null,false);
        $this->db->from('servicio s');
        $data = $this->db->get();
        return $data->result();
    }

    function guardar($guardar){
       if ($this->db->insert('servicio',$guardar)){
         return true;
       }else{
        return false;
       }
    }

    function actualizar($cod,$hab){
        $this->db->where('cod_servicio',$cod);
        $this->db->update('servicio',$hab);
       if($this->db->affected_rows()>0){
         return true;
       }else{
         return false;
       }
    }

    function eliminar($cod, $hab){
        $this->db->where('cod_servicio', $cod);
        $this->db->update('servicio', $hab);
       if($this->db->affected_rows()>0){
         return true;
       }else{
         return false;
       }
    }
      function num_rows(){
            $num = $this->db->count_all('servicio');
            $num = $num+1;
            return $num;
        }
}
