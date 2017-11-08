<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acceso extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->load->model('Acceso_model');
  }

    public function index(){
            $driverdb = $this->db->dbdriver;
            if ($driverdb == 'mysqli'){
                $db_name = 'MySQL';
            }elseif ($driverdb == 'postgre') {
                $db_name = 'PostgreSQL';
            }
            $db_data = array(
                'motor_db' => $db_name,
            );
            $user = $this->session->userdata('username');
            $nombre = $this->session->userdata('nombres');
            $apellido_p = $this->session->userdata('apellido_p');
            $apellido_m = $this->session->userdata('apellido_m');
            $email = $this->session->userdata('email');
            $foto_p = $this->session->userdata('foto_p');
            $data = array(
                'nombre' => $nombre,
                'apellido_p' => $apellido_p,
                'email' => $email,
            );
            $this->load->view('home/head',$data);
            if (($this->session->userdata['cargo'] == 'Recepcionista')||($this->session->userdata['cargo'] == 'Administrador')){
                $this->load->view('home/body1');
            }
            if (($this->session->userdata['cargo'] == 'Almacenero')||($this->session->userdata['cargo'] == 'Administrador')){
                $this->load->view('home/body2');
            }
            if($this->session->userdata['cargo'] == 'Administrador'){
                $this->load->view('home/body3');
            }
        if($this->session->userdata('username')){
            $data1 = $this->Acceso_model->select1();
            $data2 = $this->Acceso_model->select2();
            $resulta = array(
                'perfil' => $data1,
                'modulo'  => $data2,
            );
            $this->load->view('home/main',$db_data);
            $this->load->view('home/seguridad/acceso',$resulta);
            $this->load->view('home/footer_dt');
        }

        else {
            header('Location:login');
        }
    }

    public function consultar(){
        echo json_encode($this->Acceso_model->consultar());
    }

    function eliminar(){
        $idselect = $this->input->post('cod_perfil');
        $idselect1= $this->input->post('cod_modulo');
        $data = array(
            'estado' => '0',
        );

        if($this->Acceso_model->eliminar($idselect, $idselect1, $data) == true){
            echo '1';
        }

        else {
            echo '0';
        }
    }

    function guardar(){
        $cod_perfil = $this->input->post('cod_perfil');
        $cod_modulo = $this->input->post('cod_modulo');
        $data = array(
            'cod_perfil' => $cod_perfil,
            'cod_modulo' => $cod_modulo,
            'estado' => '1',
        );

        if($this->Acceso_model->guardar($data) == true){
            echo '1';
        }

        else {
            echo '0';
        }
    }
}
