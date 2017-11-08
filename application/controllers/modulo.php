<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modulo extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->load->model('Modulo_model');
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
            $this->load->view('home/main',$db_data);
            $this->load->view('home/seguridad/modulo');
            $this->load->view('home/footer_dt');
        }

        else {
            header('Location:login');
        }
    }

    public function consultar(){
    //if ($this->input->is_ajax_request()){
        echo json_encode($this->Modulo_model->consultar());
    //}
    }

        function eliminar(){
            $idselect = $this->input->post('cod_modulo');
            $data = array(
                'estado' => '0',
            );

            if($this->Modulo_model->eliminar($idselect, $idselect1, $data) == true){
                echo '1';
            }

            else {
                echo '0';
            }
        }

        function guardar(){
            $cod_modulo = $this->input->post('cod_modulo_c');
            if ($this->input->post('pmodulo_c') != ''){
              $pmodulo = $this->input->post('pmodulo_c');
            }else{
              $pmodulo = null;
            }
            $modulo = $this->input->post('modulo_c');
            $data = array(
                'cod_modulo' => $cod_modulo,
                'parent_cod_modulo' => $pmodulo,
                'modulo' => $modulo,
                'estado' => '1',
            );

            if($this->Modulo_model->guardar($data) == true){
                echo '1';
            }

            else {
                echo '0';
            }
        }
        function actualizar(){
            $selector = $this->input->post('cod_modulo');
            $cod_modulo = $selector;
            $pmodulo = $this->input->post('pmodulo');;
            $modulo = $this->input->post('modulo');
            $data = array(
              'cod_modulo' => $cod_modulo,
              'parent_cod_modulo' => $pmodulo,
              'modulo' => $modulo
            );
            if($this->Tipo_movimiento_model->actualizar($selector, $data) == true){
              echo '1';
            }else{
              echo '0';
            }
        }
}
