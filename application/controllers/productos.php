<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->load->model('Productos_model');
    $this->load->model('Login_model');
    $this->load->model('Modulo_model');
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
      $perfil = $this->session->userdata['perfil'];
      $pool = $this->Login_model->accesos($perfil);
      $num = count($pool);
      $arr = array();
      for ($i = 0; $i < $num; $i++){
        array_push($arr, $pool[$i]['cod_modulo']);
      }
      if (in_array('1', $arr)){
          $this->load->view('home/mod_mantenimiento');
          if (in_array('6',$arr)){
          $this->load->view('home/mod_persona');
          }if (in_array('6',$arr)){
            $this->load->view('home/mod_habitacion');
          }if (in_array('7',$arr)){
            $this->load->view('home/mod_ubigeo');
          }if (in_array('8',$arr)){
            $this->load->view('home/mod_servicio');
          }if (in_array('9',$arr)){
            $this->load->view('home/mod_ofertas');
          }if (in_array('10',$arr)){
            $this->load->view('home/mod_area');
          }if (in_array('11',$arr)){
            $this->load->view('home/mod_cargo');
          }if (in_array('12',$arr)){
            $this->load->view('home/mod_proveedor');
          }if (in_array('13',$arr)){
            $this->load->view('home/mod_producto');
          }if (in_array('14',$arr)){
            $this->load->view('home/mod_tipo_pago');
          }if (in_array('15',$arr)){
            $this->load->view('home/mod_tipo_movimiento');
          }if (in_array('16',$arr)){
            $this->load->view('home/mod_tipo_documento');
          }if (in_array('17',$arr)){
            $this->load->view('home/mod_caja');
          }if (in_array('18',$arr)){
            $this->load->view('home/mod_tipo_transaccion');
          }if (in_array('19',$arr)){
            $this->load->view('home/mod_parametro');
          }if (in_array('20',$arr)){
            $this->load->view('home/mod_seguridad');
          }
          $this->load->view('home/mod_mantenimiento_fin');
        }if (in_array('2',$arr)){
          $this->load->view('home/mod_reservacion');
        }if (in_array('3',$arr)){
          $this->load->view('home/mod_almacen');
        }if  (in_array('4',$arr)){
          $this->load->view('home/mod_reportes');
        }
      $this->load->view('home/main',$db_data);
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
    echo json_encode($this->Productos_model->consultar());
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
      'estado' => '0',
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
      'estado' => '1',
    );
    if($this->Productos_model->guardar($data) == true){
      echo '1';
    }else{
      echo '0';
    }
  }
  function buscar_producto(){
    $producto = $this->input->post('cod_pr');
    $resultado = $this->Productos_model->buscar_producto($producto);
    echo json_encode($resultado);
  }
}
