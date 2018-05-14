<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Start extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('Login_model');
        $this->load->model('Modulo_model');
        $this->load->model('Tipo_habitacion_model');
        $this->load->model('Habitacion_model');
        $this->load->model('Reservaciones_model');
    }
    function index(){
        $data = $this->Tipo_habitacion_model->consultar();
        $habitaciones = array(
          'tipos_habitacion' => $data,
        );
        $this->load->view('client-page/header');
        $this->load->view('client-page/home', $habitaciones);
        $this->load->view('client-page/footer');
    }
}
