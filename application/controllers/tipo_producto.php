<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipo_producto extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->load->model('Tipo_producto_model');
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
      $this->load->view('home/productos/tipo_producto');
      $this->load->view('home/footer_dt');

    }else{
      header('Location:login');
    }
  }
  public function consultar(){
    //if ($this->input->is_ajax_request()){
        echo json_encode($this->Tipo_producto_model->consultar());

    //}
  }
  function actualizar(){
      $selector = $this->input->post('cod_tipo_producto');
      $cod_tipo_producto = $selector;
      $tipo_producto = $this->input->post('tipo_producto');
      $descripcion = $this->input->post('descripcion');
      $data = array(
        'cod_tipo_producto' => $cod_tipo_producto,
        'tipo_producto' => $tipo_producto,
        'descripcion' => $descripcion,
      );
      if($this->Tipo_producto_model->actualizar($selector, $data) == true){
        echo '1';
      }else{
        echo '0';
      }
  }
  function eliminar(){
      $idselect = $this->input->post('cod_tipo_producto');
      $data = array(
        'estado' => '0',
      );
      if($this->Tipo_producto_model->eliminar($idselect, $data) == true){
        echo '1';
      }else{
        echo '0';
      }
    }
    function guardar(){
      $cod_tipo_producto = $this->input->post('cod_tipo_producto');
      $tipo_producto = $this->input->post('tipo_producto');
      $descripcion = $this->input->post('descripcion');
      $data = array(
        'cod_tipo_producto' => $cod_tipo_producto,
        'tipo_producto' => $tipo_producto,
        'descripcion' => $descripcion,
        'estado' => null,
      );
      if($this->Tipo_producto_model->guardar($data) == true){
        echo '1';
      }else{
        echo '0';
      }
    }
}
