<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Habitacion extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->load->model('Habitacion_model');
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
            $data1 = $this->Habitacion_model->select();
            $resulta = array(
            'tipo_habitacion' => $data1,
            );
            $this->load->view('home/main',$db_data);
            $this->load->view('home/habitaciones/habitacion',$resulta);
            $this->load->view('home/footer_dt');
        }

        else {
            header('Location:login');
        }
    }

    public function consultar(){
    //if ($this->input->is_ajax_request()){
        echo json_encode($this->Habitacion_model->consultar());
    //}
    }
function actualizar(){
      $selector = $this->input->post('cod_habitacion');
      $cod_habitacion = $selector;
      $tipo_habitacion = $this->input->post('tipo_habitacion');
      $piso = $this->input->post('piso');
      $data = array(
        'cod_habitacion' => $cod_habitacion,
        'cod_tipo_habitacion' => $tipo_habitacion,
        'piso' => $piso,
      );
      if($this->Habitacion_model->actualizar($selector, $data) == true){
        echo '1';
      }else{
        echo '0';
      }
  }

  function eliminar(){
      $idselect = $this->input->post('cod_habitacion');
      $data = array(
        'estado' => null,
      );
      if($this->Habitacion_model->eliminar($idselect, $data) == true){
        echo '1';
      }else{
        echo '0';
      }
    }

    function guardar(){
      $cod_habitacion = $this->input->post('cod_habitacion');
      $tipo_habitacion = $this->input->post('tipo_habitacion');
      $piso = $this->input->post('piso');
      $data = array(
        'cod_habitacion' => $cod_habitacion,
        'cod_tipo_habitacion' => $tipo_habitacion,
        'piso' => $piso,
        'estado' => '0',
      );
      if($this->Habitacion_model->guardar($data) == true){
        echo '1';
      }else{
        echo '0';
      }
    }
}
