<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->load->model('Productos_model');
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
      $data1 = $this->Productos_model->select1();
      $data2 = $this->Productos_model->select2();
      $resulta = array(
        'marca' => $data1,
        'tipo_producto' => $data2,
      );
      $this->load->view('home/productos/productos',$resulta);
      $this->load->view('home/footer_dt');

    }else{
      header('Location:login');
    }
  }
  public function consultar(){
    //if ($this->input->is_ajax_request()){
        echo json_encode($this->Productos_model->consultar());

    //}
  }
  function actualizar(){
      $selector = $this->input->post('cod_producto');
      $cod_producto = $selector;
      $marca = $this->input->post('marca');
      $tipo_producto = $this->input->post('tipo_producto');
      $producto = $this->input->post('producto');
      $descripcion = $this->input->post('descripcion');
      $precio_producto = $this->input->post('precio_producto');
      $stock_producto = $this->input->post('stock_producto');
      $stock_minimo = $this->input->post('stock_minimo');
      $stock_maximo = $this->input->post('stock_maximo');
      $data = array(
        'cod_producto' => $cod_producto,
        'cod_marca' => $marca,
        'cod_tipo_producto' => $tipo_producto,
        'producto' => $producto,
        'descripcion' => $descripcion,
        'precio_producto' => $precio_producto,
        'stock_producto' => $stock_producto,
        'stock_minimo' => $stock_minimo,
        'stock_maximo' => $stock_maximo,
      );
      if($this->Productos_model->actualizar($selector, $data) == true){
        echo '1';
      }else{
        echo '0';
      }
  }
  function eliminar(){
      $idselect = $this->input->post('cod_producto');
      $data = array(
        'estado' => null,
      );
      if($this->Productos_model->eliminar($idselect, $data) == true){
        echo '1';
      }else{
        echo '0';
      }
    }
    function guardar(){
      $cod_producto = $this->input->post('cod_producto');
      $marca = $this->input->post('marca');
      $tipo_producto = $this->input->post('tipo_producto');
      $producto = $this->input->post('producto');
      $descripcion = $this->input->post('descripcion');
      $precio_producto = $this->input->post('precio_producto');
      $stock_producto = $this->input->post('stock_producto');
      $stock_minimo = $this->input->post('stock_minimo');
      $stock_maximo = $this->input->post('stock_maximo');
      $data = array(
        'cod_producto' => $cod_producto,
        'cod_marca' => $marca,
        'cod_tipo_producto' => $tipo_producto,
        'producto' => $producto,
        'descripcion' => $descripcion,
        'precio_producto' => $precio_producto,
        'stock_producto' => $stock_producto,
        'stock_minimo' => $stock_minimo,
        'stock_maximo' => $stock_maximo,
        'estado' => '0',
      );
      if($this->Productos_model->guardar($data) == true){
        echo '1';
      }else{
        echo '0';
      }
    }
}
