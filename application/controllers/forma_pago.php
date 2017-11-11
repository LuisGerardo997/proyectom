<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forma_pago extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->load->model('forma_pago_model');
  }


  public function index()
  {
    if($this->session->userdata('username')){
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
      $this->load->view('home/main',$db_data);
      $this->load->view('home/forma_pago/forma_pago');
      $this->load->view('home/footer_dt');

    }else{
      header('Location:login');
    }
  }
  public function consultar(){
    //if ($this->input->is_ajax_request()){
        echo json_encode($this->forma_pago_model->consultar());

    //}
  }
  function actualizar(){
      $selector = $this->input->post('cod_forma_pago');
      $cod_forma_pago = $selector;
      $forma_pago = $this->input->post('forma_pago');
      $descripcion = $this->input->post('descripcion');
      $data = array(
        'cod_forma_pago' => $cod_forma_pago,
        'forma_pago' => $forma_pago,
        'descripcion' => $descripcion,
      );
      if($this->forma_pago_model->actualizar($selector, $data) == true){
        echo '1';
      }else{
        echo '0';
      }
  }
  function eliminar(){
      $idselect = $this->input->post('cod_forma_pago');
      $data = array(
        'estado' => '0',
      );
      if($this->forma_pago_model->eliminar($idselect, $data) == true){
        echo '1';
      }else{
        echo '0';
      }
    }
    function guardar(){
      $cod_forma_pago = $this->input->post('cod_forma_pago');
      $forma_pago = $this->input->post('forma_pago');
      $descripcion = $this->input->post('descripcion');
      $data = array(
        'cod_forma_pago' => $cod_forma_pago,
        'forma_pago' => $forma_pago,
        'descripcion' => $descripcion,
        'estado' => null,
      );
      if($this->forma_pago_model->guardar($data) == true){
        echo '1';
      }else{
        echo '0';
      }
    }
}
