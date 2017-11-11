<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Caja_persona extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->load->model('Caja_persona_model');
  }

    public function index(){
            $driverdb = $this->db->dbdriver;
            if ($driverdb == 'mysqli'){
                $db_name = 'MySQL';
            }elseif ($driverdb == 'postgre') {
                $db_name = 'PostgreSQL';
            }elseif ($driverdb == 'sqlsrv') {
                $db_name = 'MS SQL Server';
            }
            $db_data = array(
                'motor_db' => $db_name,
            );
        if($this->session->userdata('username')){
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
            $data1 = $this->Caja_persona_model->select1();
            $data2 = $this->Caja_persona_model->select2();
            $resulta = array(
                'caja' => $data1,
                'persona'  => $data2,
            );
            $this->load->view('home/main',$db_data);
            $this->load->view('home/caja/caja_persona',$resulta);
            $this->load->view('home/footer_dt');
        }

        else {
            header('Location:login');
        }
    }

    public function consultar(){
        echo json_encode($this->Caja_persona_model->consultar());
    }

    function actualizar(){
        $selector = $this->input->post('fecha_inicio');
        $fecha_inicio = $selector;
        $cod_caja = $this->input->post('cod_caja');
        $cod_persona = $this->input->post('cod_persona');
        $data = array(
            'fecha_inicio' => $fecha_inicio,
            'cod_caja' => $cod_caja,
            'cod_persona' => $cod_persona,
        );

        if($this->Caja_persona_model->actualizar($selector, $data) == true){
            echo '1';
        }

        else {
            echo '0';
        }
    }
    function eliminar(){
        $idselect = $this->input->post('fecha_inicio');
        $data = array(
            'estado' => '0',
        );

        if($this->Caja_persona_model->eliminar($idselect, $data) == true){
            echo '1';
        }

        else {
            echo '0';
        }
    }

    function guardar(){
        $fecha_inicio = $this->input->post('fecha_inicio');
        $cod_caja = $this->input->post('cod_caja');
        $cod_persona = $this->input->post('cod_persona');
        $data = array(
            'fecha_inicio' => $fecha_inicio,
            'cod_caja' => $cod_caja,
            'cod_persona' => $cod_persona,
            'estado' => '1',
        );

        if($this->Caja_persona_model->guardar($data) == true){
            echo '1';
        }

        else {
            echo '0';
        }
    }
}
