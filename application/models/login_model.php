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
          $this->db->select('cod_persona, nombres, apellido_paterno, apellido_materno, email, foto_persona');
          $this->db->where('usuario',$user);
          $result = $this->db->get('persona');
          return $result->row();

      }
}
?>
