<?php
class Empleados_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function consultar(){
        $this->db->select('p.cod_persona, p.nombres, p.apellido_paterno, p.apellido_materno, c.cargo, p.ruc, p.email,p.direccion, p.genero, p.tel_movil, u.ciudad ciudad_direccion, ub.ciudad ciudad_nacimiento, p.nro_cuenta_bancaria, p.nombre_banco, p.tel_domicilio, p.tel_movil, p.operador_movil, p.fecha_nacimiento, p.profesion, p.num_hijos, p.estatura_cm, p.peso_kg, p.tipo_sangre, p.hobby, p.deporte_favorito, p.observacion_persona, e.estado_civil, tp.tipo_persona');
        $this->db->where('p.estado','1');
        $this->db->from('persona p');
        $this->db->join('ubigeo u','u.cod_ciudad = p.cod_ciudad_direccion','left');
        $this->db->join('ubigeo ub','ub.cod_ciudad = p.cod_ciudad_nacimiento','left');
        $this->db->join('cargo c','c.cod_cargo = p.cod_cargo','left');
        $this->db->join('estado_civil e','e.cod_estado_civil = p.cod_estado_civil','left');
        $this->db->join('tipo_persona tp','tp.cod_tipo_persona = p.cod_tipo_persona','left');
        $data = $this->db->get();
        return $data->result();
    }

    function guardar1($guardar1){
        if ($this->db->insert('persona',$guardar1)){
            return true;
        }
        else {
            return false;
        }
    }
    
    function guardar2($guardar2){
        if ($this->db->insert('persona',$guardar2)){
            return true;
        }
        else {
            return false;
        }
    }
    
    function actualizar($cod,$hab){
        $this->db->where('cod_persona',$cod);
        $this->db->update('persona',$hab);
        if($this->db->affected_rows()>0){
            return true;
        }
        else {
            return false;
        }
    }

    function select(){
        $this->db->select('cod_ciudad, ciudad');
        $this->db->order_by('ciudad','asc');
        $resultado= $this->db->get('ubigeo');
        return $resultado -> result_array();
    }

    function select1(){
        $this->db->select('cod_cargo, cargo');
        $this->db->order_by('cargo','asc');
        $resultado= $this->db->get('cargo');
        return $resultado -> result_array();
    }
    
    function select3(){
    $this->db->select('cod_estado_civil, estado_civil');
    $this->db->order_by('estado_civil','asc');
    $resultado= $this->db->get('estado_civil');
    return $resultado -> result_array();
    }
    
    function select4(){
        $this->db->select('cod_tipo_persona, tipo_persona');
        $this->db->order_by('tipo_persona','asc');
        $resultado= $this->db->get('tipo_persona');
        return $resultado -> result_array();
    }

    function eliminar($cod, $hab){
        $this->db->where('cod_persona', $cod);
        $this->db->update('persona', $hab);
        if($this->db->affected_rows()>0){
            return true;
        }
        else {
            return false;
        }
    }
}