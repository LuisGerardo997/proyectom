<?php
class Perfil_model extends CI_Model{
    function __constuct(){
        parent::__construct();
    }

    function consultar(){
        $this->db->select('pe.cod_perfil, pe.perfil');
        $this->db->where('pe.estado','1');
        $this->db->from('perfil pe');
        $data = $this->db->get();
        return $data->result();
    }

    function guardar($guardar){
        if ($this->db->insert('perfil',$guardar)){
            return true;
        }

        else {
            return false;
        }
    }

    function actualizar($cod,$hab){
        $this->db->where('cod_perfil',$cod);
        $this->db->update('perfil',$hab);
        if($this->db->affected_rows()>0){
            return true;
        }

        else {
            return false;
        }
    }

    function eliminar($cod, $hab){
        $this->db->where('cod_perfil', $cod);
        $this->db->update('perfil', $hab);
        if($this->db->affected_rows()>0){
            return true;
        }

        else {
            return false;
        }
    }
      function num_rows(){
            $num = $this->db->count_all('perfil');
            $num = $num+1;
            return $num;
        }
}
