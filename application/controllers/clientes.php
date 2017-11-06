<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->load->model('Clientes_model');
  }


  public function index()
  {
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
      $this->load->view('home/main');
      $data1 = $this->Clientes_model->select1();
      $resulta = array(
        'ciudad' => $data1,
      );
      $this->load->view('home/personas/clientes',$resulta);
      $this->load->view('home/footer_dt');

    }else{
      header('Location:login');
    }
  }
  public function consultar(){
    //if ($this->input->is_ajax_request()){
        echo json_encode($this->Clientes_model->consultar());

    //}
  }
  function actualizar(){
      $selector = $this->input->post('cod_persona');
      $cod_persona = $selector;
      $nombres = $this->input->post('nombres');
      $apellido_paterno = $this->input->post('apellido_paterno');
      $apellido_materno = $this->input->post('apellido_materno');
      $ruc = $this->input->post('ruc');
      $email = $this->input->post('email');
      $genero = $this->input->post('genero');
      $tel_movil = $this->input->post('tel_movil');
      $ciudad = $this->input->post('ciudad');
      $data = array(
        'cod_persona' => $cod_persona,
        'nombres' => $nombres,
        'apellido_paterno' => $apellido_paterno,
        'apellido_materno' => $apellido_materno,
        'ruc' => $ruc,
        'email' => $email,
        'genero' => $genero,
        'tel_movil' => $tel_movil,
        'cod_ciudad_direccion' => $ciudad,
      );
      if($this->Clientes_model->actualizar($selector, $data) == true){
        echo '1';
      }else{
        echo '0';
      }
  }
  function eliminar(){
      $idselect = $this->input->post('cod_persona');
      $data = array(
        'estado' => null,
      );
      if($this->Clientes_model->eliminar($idselect, $data) == true){
        echo '1';
      }else{
        echo '0';
      }
    }
    function guardar(){
      $cod_persona = $this->input->post('cod_persona');
      $nombres = $this->input->post('nombres');
      $apellido_paterno = $this->input->post('apellido_paterno');
      $apellido_materno = $this->input->post('apellido_materno');
      $ruc = $this->input->post('ruc');
      $email = $this->input->post('email');
      $genero = $this->input->post('genero');
      $tel_movil = $this->input->post('tel_movil');
      if ($this->input->post('ciudad') != ''){
        $ciudad = $this->input->post('ciudad');
      }else{
        $ciudad = null;
      }
      $data = array(
        'cod_persona' => $cod_persona,
        'nombres' => $nombres,
        'apellido_paterno' => $apellido_paterno,
        'apellido_materno' => $apellido_materno,
        'ruc' => $ruc,
        'email' => $email,
        'genero' => $genero,
        'tel_movil' => $tel_movil,
        'cod_ciudad_direccion' => $ciudad,
        'estado' => '0',
      );
      if($this->Clientes_model->guardar($data) == true){
        echo '1';
      }else{
        echo '0';
      }
    }
}
