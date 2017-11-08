<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parametro extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->load->model('Parametro_model');
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
            $this->load->view('home/parametros/parametro');
            $this->load->view('home/footer_dt');
        }

        else {
            header('Location:login');
        }
    }

    public function consultar(){
        echo json_encode($this->Parametro_model->consultar());
    }

    function actualizar(){
        $selector = $this->input->post('cod_parametro');
        $cod_parametro = $selector;
        $descripcion = $this->input->post('descripcion');
        $valor = $this->input->post('valor');
        $data = array(
            'cod_parametro' => $cod_parametro,
            'descripcion' => $descripcion,
            'valor' => $valor,
        );

        if($this->Parametro_model->actualizar($selector, $data) == true){
            echo '1';
        }

        else {
            echo '0';
        }
    }
    function eliminar(){
        $idselect = $this->input->post('cod_parametro');
        $data = array(
            'estado' => '0',
        );

        if($this->Parametro_model->eliminar($idselect, $data) == true){
            echo '1';
        }

        else {
            echo '0';
        }
    }

    function guardar(){
        $cod_parametro = $this->input->post('cod_parametro');
        $descripcion = $this->input->post('descripcion');
        $valor = $this->input->post('valor');
        $data = array(
            'cod_parametro' => $cod_parametro,
            'descripcion' => $descripcion,
            'valor' => $valor,
            'estado' => '1',
        );

        if($this->Parametro_model->guardar($data) == true){
            echo '1';
        }

        else {
            echo '0';
        }
    }
}
