<?php
class Tipo_persona_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function consultar(){
        $this->db->select('tp.cod_tipo_persona, tp.tipo_persona');
        $this->db->where('tp.estado','0');
        $this->db->from('tipo_persona tp');
        $data = $this->db->get();
        return $data->result();
    }

    function guardar($guardar){
       if ($this->db->insert('tipo_persona',$guardar)){
         return true;
       }else{
        return false;
       }
    }

    function actualizar($cod,$hab){
        $this->db->where('cod_tipo_persona',$cod);
        $this->db->update('tipo_persona',$hab);
       if($this->db->affected_rows()>0){
         return true;
       }else{
         return false;
       }
    }

    function eliminar($cod, $hab){
        $this->db->where('cod_tipo_persona', $cod);
        $this->db->update('tipo_persona', $hab);
       if($this->db->affected_rows()>0){
         return true;
       }else{
         return false;
       }
    }
      function num_rows(){
            $num = $this->db->count_all('tipo_persona');
            $num = $num+1;
            return $num;
        }
}
