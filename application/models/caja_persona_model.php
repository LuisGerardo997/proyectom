<?php
class Caja_persona_model extends CI_Model{
    function __constuct(){
        parent::__construct();
    }

    function consultar(){
        $this->db->select('cp.fecha_inicio, c.cod_caja, c.nro_caja, p.cod_persona, p.apellido_paterno, p.apellido_materno, p.nombres');
        $this->db->where('cp.estado','1');
        $this->db->from('caja_persona cp');
        $this->db->join('caja c','c.cod_caja = cp.cod_caja');
        $this->db->join('persona p','p.cod_persona = cp.cod_persona');
        $data = $this->db->get();
        return $data->result();
    }

    function guardar($guardar){
        if ($this->db->insert('caja_persona',$guardar)){
            return true;
        }

        else {
            return false;
        }
    }

    function actualizar($cod,$hab){
        $this->db->where('fecha_inicio',$cod);
        $this->db->update('caja_persona',$hab);
        if($this->db->affected_rows()>0){
            return true;
        }

        else {
            return false;
        }
    }

    function select1(){
        $this->db->select('cod_caja, nro_caja');
        $resultado= $this->db->get('caja');
        return $resultado -> result_array();
    }
    function select2(){
        $this->db->select('cod_persona, apellido_paterno, apellido_materno, nombres');
        $resultado= $this->db->get('persona');
        return $resultado -> result_array();
    }

    function eliminar($cod, $hab){
        $this->db->where('fecha_inicio', $cod);
        $this->db->update('caja_persona', $hab);
        if($this->db->affected_rows()>0){
            return true;
        }

        else {
            return false;
        }
    }
}
