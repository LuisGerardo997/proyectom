<?php
class Acceso_model extends CI_Model{
    function __constuct(){
        parent::__construct();
    }

    function consultar(){
        $this->db->select('mo.cod_modulo, mo.modulo, pe.cod_perfil, pe.perfil');
        $this->db->where('ac.estado','1');
        $this->db->from('accesos ac');
        $this->db->join('modulos mo','mo.cod_modulo = ac.cod_modulo');
        $this->db->join('perfil pe','pe.cod_perfil = ac.cod_perfil');
        $data = $this->db->get();
        return $data->result();
    }

    function guardar($guardar){
        if ($this->db->insert('accesos',$guardar)){
            return true;
        }

        else {
            return false;
        }
    }

    function select1(){
        $this->db->select('cod_perfil, perfil');
        $resultado= $this->db->get('perfil');
        return $resultado -> result_array();
    }

    function select2(){
        $this->db->select('cod_modulo, modulo');
        $this->db->where('parent_cod_modulo',null,false);
        $resultado= $this->db->get('modulos');
        return $resultado -> result_array();
    }


    function eliminar($d, $d1){
        $query = 'DELETE FROM accesos WHERE cod_modulo = '.$d1.' AND cod_perfil = '.$d.'';
        if ($this->db->query($query)){
            return true;
        }else{
            return false;
        }
    }
    function select3($data){
      $this->db->select('cod_modulo, modulo');
      $this->db->where('parent_cod_modulo',$data);
      $this->db->from('modulos');
      $resultado = $this->db->get();
      $numero = $resultado->num_rows();
      if ($numero > 0){
          return $resultado->result_array();
      }else{
          return 0;
      }
    }
    function perfil_modulos($data){
      $this->db->select('cod_modulo');
      $this->db->where('cod_perfil', $data);
      $resultado = $this->db->get('accesos');
      return $resultado->result_array();
    }

    function existe($data,$data1){
      $query = $this->db->query('select cod_modulo from accesos where cod_perfil ="'.$data1.'"');
      $num = $query->num_rows();
      if ($num != 0){
          return true;
      }else{
          return false;
      }
    }
}
