<?php
class Tipo_transaccion_model extends CI_Model{
    function __constuct(){
        parent::__construct();
    }

    function consultar(){
        $this->db->select('tt.cod_tipo_transaccion, tt.tipo_transaccion, tt.descripcion');
        $this->db->where('tt.estado','1');
        $this->db->from('tipo_transaccion tt');
        $data = $this->db->get();
        return $data->result();
    }

    function guardar($guardar){
        if ($this->db->insert('tipo_transaccion',$guardar)){
            return true;
        }

        else {
            return false;
        }
    }

    function actualizar($cod,$hab){
        $this->db->where('cod_tipo_transaccion',$cod);
        $this->db->update('tipo_transaccion',$hab);
        if($this->db->affected_rows()>0){
            return true;
        }

        else {
            return false;
        }
    }

    function eliminar($cod, $hab){
        $this->db->where('cod_tipo_transaccion', $cod);
        $this->db->update('tipo_transaccion', $hab);
        if($this->db->affected_rows()>0){
            return true;
        }

        else {
            return false;
        }
    }
      function num_rows(){
            $num = $this->db->count_all('tipo_transaccion');
            $num = $num+1;
            return $num;
        }
}
