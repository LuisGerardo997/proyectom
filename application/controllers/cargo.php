<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cargo extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->load->model('Cargo_model');
  }


  public function index()
  {
    if($this->session->userdata('username')){
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
                'apellido_m' => $apellido_m,
                'email' => $email,
                'foto_p' => $foto_p,
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
      $data1 = $this->Cargo_model->select1();
      $resulta = array(
        'area' => $data1,
      );
      $this->load->view('home/cargo/cargo',$resulta);
      $this->load->view('home/footer_dt');

    }else{
      header('Location:login');
    }
  }
  public function consultar(){
    //if ($this->input->is_ajax_request()){
        echo json_encode($this->Cargo_model->consultar());

    //}
  }
  function actualizar(){
      $selector = $this->input->post('cod_cargo');
      $cod_cargo = $selector;
      $area = $this->input->post('area');
      $descripcion = $this->input->post('descripcion');
      $cargo = $this->input->post('cargo');
      $data = array(
        'cod_cargo' => $cod_cargo,
        'cod_area' => $area,
        'descripcion' => $descripcion,
        'cargo' => $cargo,
      );
      if($this->Cargo_model->actualizar($selector, $data) == true){
        echo '1';
      }else{
        echo '0';
      }
  }
  function eliminar(){
      $idselect = $this->input->post('cod_cargo');
      $data = array(
        'estado' => null,
      );
      if($this->Cargo_model->eliminar($idselect, $data) == true){
        echo '1';
      }else{
        echo '0';
      }
    }
    function guardar(){
      $cod_cargo = $this->input->post('cod_cargo');
      $area = $this->input->post('area');
      $descripcion = $this->input->post('descripcion');
      $cargo = $this->input->post('cargo');
      $data = array(
        'cod_cargo' => $cod_cargo,
        'cod_area' => $area,
        'descripcion' => $descripcion,
        'cargo' => $cargo,
        'estado' => '0',
      );
      if($this->Cargo_model->guardar($data) == true){
        echo '1';
      }else{
        echo '0';
      }
    }
}
