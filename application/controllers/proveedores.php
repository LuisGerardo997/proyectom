<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proveedores extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->load->model('Proveedores_model');
  }


  public function index()
  {
    if($this->session->userdata('username')){
      $this->load->view('home/main');
      $data1 = $this->Proveedores_model->select1();
      $resulta = array(
        'ciudad' => $data1,
      );
      $this->load->view('home/proveedores/proveedores',$resulta);
      $this->load->view('home/footer_dt');

    }else{
      header('Location:login');
    }
  }
  public function consultar(){
    //if ($this->input->is_ajax_request()){
        echo json_encode($this->Proveedores_model->consultar());

    //}
  }
  function actualizar(){
      $selector = $this->input->post('cod_proveedor');
      $cod_proveedor = $selector;
      $nombres = $this->input->post('nombres');
      $apellido_paterno = $this->input->post('apellido_paterno');
      $apellido_materno = $this->input->post('apellido_materno');
      $dni = $this->input->post('dni');
      $ciudad = $this->input->post('ciudad');
      $ruc = $this->input->post('ruc');
      $razon_social = $this->input->post('razon_social');
      $descripcion = $this->input->post('descripcion');
      $data = array(
        'cod_proveedor' => $cod_proveedor,
        'nombres' => $nombres,
        'apellido_paterno' => $apellido_paterno,
        'apellido_materno' => $apellido_materno,
        'dni' => $dni,
        'cod_ciudad' => $ciudad,
        'ruc' => $ruc,
        'razon_social' => $razon_social,
        'descripcion' => $descripcion,
      );
      if($this->Proveedores_model->actualizar($selector, $data) == true){
        echo '1';
      }else{
        echo '0';
      }
  }
  function eliminar(){
      $idselect = $this->input->post('cod_proveedor');
      $data = array(
        'estado' => null,
      );
      if($this->Proveedores_model->eliminar($idselect, $data) == true){
        echo '1';
      }else{
        echo '0';
      }
    }
    function guardar(){
      $cod_proveedor = $this->input->post('cod_proveedor');
      $nombres = $this->input->post('nombres');
      $apellido_paterno = $this->input->post('apellido_paterno');
      $apellido_materno = $this->input->post('apellido_materno');
      $dni = $this->input->post('dni');
      $ciudad = $this->input->post('ciudad');
      $ruc = $this->input->post('ruc');
      $razon_social = $this->input->post('razon_social');
      $descripcion = $this->input->post('descripcion');
      $data = array(
        'cod_proveedor' => $cod_proveedor,
        'nombres' => $nombres,
        'apellido_paterno' => $apellido_paterno,
        'apellido_materno' => $apellido_materno,
        'dni' => $dni,
        'cod_ciudad' => $ciudad,
        'ruc' => $ruc,
        'razon_social' => $razon_social,
        'descripcion' => $descripcion,
        'estado' => '0',
      );
      if($this->Proveedores_model->guardar($data) == true){
        echo '1';
      }else{
        echo '0';
      }
    }
}
