<?php
class Ofertas_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function consultar(){
        $this->db->select('o.cod_oferta, o.oferta, o.descuento, o.fecha_inicio,o.fecha_fin');
        $this->db->where('o.estado','1');
        $this->db->from('ofertas o');
        $data = $this->db->get();
        return $data->result();
    }

    function guardar($guardar){
        if ($this->db->insert('ofertas',$guardar)){
            return true;
        }

        else {
            return false;
        }
    }

    function actualizar($cod,$hab){
        $this->db->where('cod_oferta',$cod);
        $this->db->update('ofertas',$hab);
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
        $this->db->where('cod_oferta', $cod);
        $this->db->update('ofertas', $hab);
        if($this->db->affected_rows()>0){
            return true;
        }

        else {
            return false;
        }
    }
}
