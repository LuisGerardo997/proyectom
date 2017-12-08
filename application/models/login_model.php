<?php
class Login_model extends CI_Model{

    function __constuct(){
        parent::__construct();
    }


    public function ingresar($user,$pass){
        $this->db->where('usuario',$user);
        $this->db->where('contrasea',$pass);
        $result = $this->db->get('persona');

        if ($result->num_rows()== 1){
            return 1;
        }else{
            return 0;
        }
    }
    public function cargo($user){
          $this->db->select('c.cargo');
          $this->db->from('persona p');
          $this->db->join('cargo c', 'p.cod_cargo = c.cod_cargo');
          $this->db->where('p.usuario',$user);
          $result = $this->db->get();
          return $result->row();

      }
      public function datospersonales($user){
          $this->db->select('cod_persona, nombres, apellido_paterno, apellido_materno, email, foto_persona, color');
          $this->db->where('usuario',$user);
          $result = $this->db->get('persona');
          return $result->row();

      }

      public function perfiles($persona){
        $consulta = "select dpp.cod_perfil, p.perfil from detalle_persona_perfil dpp INNER JOIN perfil p on p.cod_perfil = dpp.cod_perfil where dpp.cod_persona = (select cod_persona from persona where usuario ='".$persona."')";
        $resultado = $this->db->query($consulta);
        return $resultado->result_array();
      }

      public function accesos($data){
        $this->db->select('cod_modulo');
        $this->db->where('cod_perfil',$data);
        $resultado = $this->db->get('accesos');
        return $resultado -> result_array();
      }
      public function nombre_perfil($data){
        $this->db->select('perfil');
        $this->db->where('cod_perfil',$data);
        $resultado = $this->db->get('perfil');
        return $resultado -> result_array();
      }
}
?>
