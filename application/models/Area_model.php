<?php
class Area_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function consultar(){
        $this->db->select('a.cod_area, a.area, a.descripcion');
        $this->db->where('a.estado','1');
        $this->db->from('area a');
        $data = $this->db->get();
        return $data->result();
    }

    function guardar($guardar){
       if ($this->db->insert('area',$guardar)){
         return true;
       }else{
        return false;
       }
    }

    function actualizar($cod,$hab){
        $this->db->where('cod_area',$cod);
        $this->db->update('area',$hab);
       if($this->db->affected_rows()>0){
         return true;
       }else{
         return false;
       }
    }

    function eliminar($cod, $hab){
        $this->db->where('cod_area', $cod);
        $this->db->update('area', $hab);
       if($this->db->affected_rows()>0){
         return true;
       }else{
         return false;
       }
    }
    function num_rows(){
          $num = $this->db->count_all('area');
          $num = $num+1;
          return $num;
      }
}
