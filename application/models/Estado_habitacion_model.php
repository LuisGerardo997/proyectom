<?php
class Estado_habitacion_model extends CI_Model{
    function __constuct(){
        parent::__construct();
    }

    function consultar(){
        $this->db->select('x.cod_estado_habitacion, x.nombre');
        $this->db->where('x.estado','1');
        $this->db->from('estado_habitacion x');
        $data = $this->db->get();
        return $data->result();
    }

    function guardar($guardar){
        if ($this->db->insert('estado_habitacion',$guardar)){
            return true;
        }

        else {
            return false;
        }
    }

    function actualizar($cod,$hab){
        $this->db->where('cod_estado_habitacion',$cod);
        $this->db->update('estado_habitacion',$hab);
        if($this->db->affected_rows()>0){
            return true;
        }

        else {
            return false;
        }
    }

    function eliminar($cod, $hab){
        $this->db->where('cod_estado_habitacion', $cod);
        $this->db->update('estado_habitacion', $hab);
        if($this->db->affected_rows()>0){
            return true;
        }

        else {
            return false;
        }
    }
      function num_rows(){
            $num = $this->db->count_all('estado_habitacion');
            $num = $num+1;
            return $num;
        }
}
