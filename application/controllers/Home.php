<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Login_model');
        $this->load->model('Modulo_model');
        $this->load->model('Tipo_habitacion_model');
        $this->load->model('Habitacion_model');
        $this->load->model('Reservaciones_model');
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
            $address = $this->session->userdata('address');
            $data = array(
                'nombre' => $nombre,
                'apellido_p' => $apellido_p,
                'email' => $email,
                'addres' => $address,
            );
            // INICIO: CONCLUIR ESTADIAS
            // $estadia = $this->input->post('cod_estadia');
            // $habitaciones_reservadas = $this->Reservaciones_model->habitaciones_reservadas($estadia, '2');
            // $data = array('cod_estado_habitacion' => '3');
            // foreach ($habitaciones_reservadas as $habitacion_reservada) {
            //     $this->Habitacion_model->actualizar($habitacion_reservada->cod_habitacion, $data);
            // };
            // FIN: CONCLUIR ESTADIAS
            $this->load->view('home/head',$data);
            $perfil = $this->session->userdata('perfil');
            $pool = $this->Login_model->accesos($perfil);
            $num = count($pool);
            $arr = array();
            for ($i = 0; $i < $num; $i++){
              array_push($arr, $pool[$i]['cod_modulo']);
            }
            if (in_array('1', $arr)){
                $this->load->view('home/mod_mantenimiento');
                $this->load->view('home/mod_persona');
                if (in_array('6',$arr)){
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
                $this->load->view('home/mod_ventas');
                $this->load->view('home/mod_compras');
              }if (in_array('3',$arr)){
                $this->load->view('home/mod_almacen');
              }if  (in_array('4',$arr)){
                $this->load->view('home/mod_reportes');
              }
            $this->load->view('home/main',$db_data);
            $tipo_h = $this->Tipo_habitacion_model->lista_habitaciones();
            $tipo = array();
            foreach($tipo_h as $th){
              $detalles = array(
                'cod_tipo_habitacion' => $th->cod_tipo_habitacion,
                'tipo_habitacion' => $th->tipo_habitacion,
                'disponible' => $this->Habitacion_model->nro_disp($th->cod_tipo_habitacion),
                'mantenimiento' => $this->Habitacion_model->nro_man($th->cod_tipo_habitacion),
                'ocupado' => $this->Habitacion_model->nro_ocu($th->cod_tipo_habitacion)
              );
              array_push($tipo, $detalles);
            };
            $hab_disp= $this->Habitacion_model->habitaciones_disponibles();
            $data = array(
              'data' => $tipo,
              'habitaciones_disponibles' => $hab_disp
            );
            $this->load->view('home/home', $data);
            $this->load->view('home/footer_dt');

        }else{
            header('Location:login');
        }
    }
    public function gestionar_db(){
      $this->load->view('panel_control');
    }
    public function lista_actual(){
      echo json_encode($this->Habitacion_model->lista_actual());
    }
    public function nueva_lista(){
      $datos = var_dump(json_decode($this->input->post('arreglo')));
      $nuevo_arreglo = array(
        'arreglo' => $datos
      );
      $this->Habitacion_model->nueva_lista($nuevo_arreglo);
    }
}
