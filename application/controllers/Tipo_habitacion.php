<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipo_habitacion extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->load->model('Tipo_habitacion_model');
    $this->load->model('Login_model');
    $this->load->model('Modulo_model');
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
        if($this->session->userdata('username')){
            $consulta = $this->Tipo_habitacion_model->consultar();
            $datos = array(
            'query' => $consulta,
            );
            $this->load->view('home/main',$db_data);
            $this->load->view('home/habitaciones/tipo_habitacion',$datos);
            $this->load->view('home/footer_dt');
        }

        else {
            header('Location:login');
        }
    }

    public function consultar(){
    //if ($this->input->is_ajax_request()){
        echo json_encode($this->Tipo_habitacion_model->consultar());
    //}
    }
function actualizar(){
      $selector = $this->input->post('cod_tipo_habitacion');
      $cod_tipo_habitacion = $selector;
      $tipo_habitacion = $this->input->post('tipo_habitacion');
      $descripcion = $this->input->post('descripcion');
      $precio_tipo_habitacion = $this->input->post('precio_tipo_habitacion');
      $max_h = $this->input->post('max_h');
      $data = array(
        'cod_tipo_habitacion' => $cod_tipo_habitacion,
        'tipo_habitacion' => $tipo_habitacion,
        'descripcion' => $descripcion,
        'precio_tipo_habitacion' => $precio_tipo_habitacion,
        'max_h' => $max_h,
      );
      if($this->Tipo_habitacion_model->actualizar($selector, $data) == true){
        echo '1';
      }else{
        echo '0';
      }
  }

  function eliminar(){
      $idselect = $this->input->post('cod_tipo_habitacion');
      $data = array(
        'estado' => '0',
      );
      if($this->Tipo_habitacion_model->eliminar($idselect, $data) == true){
        echo '1';
      }else{
        echo '0';
      }
    }

    function guardar(){
      $selector = $this->input->post('cod_tipo_habitacion');
      $cod_tipo_habitacion = $selector;
      $tipo_habitacion = $this->input->post('tipo_habitacion');
      $descripcion = $this->input->post('descripcion');
      $precio_tipo_habitacion = $this->input->post('precio_tipo_habitacion');
      $max_h = $this->input->post('max_h');
      $data = array(
        'cod_tipo_habitacion' => $cod_tipo_habitacion,
        'tipo_habitacion' => $tipo_habitacion,
        'descripcion' => $descripcion,
        'precio_tipo_habitacion' => $precio_tipo_habitacion,
        'max_h' => $max_h,
        'estado' => '1',
      );
      if($this->Tipo_habitacion_model->guardar($data) == true){
        echo '1';
      }else{
        echo '0';
      }
    }
}
