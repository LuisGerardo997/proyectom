<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservaciones extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Reservaciones_model');
        $this->load->model('Login_model');
        $this->load->model('Clientes_model');
        $this->load->model('Habitacion_model');
        $this->load->model('Modulo_model');
        // INICIO: CONCLUIR ESTADIAS
        // $estadia = $this->input->post('cod_estadia');
        // $habitaciones_reservadas = $this->Reservaciones_model->habitaciones_reservadas($estadia, '2');
        // $data = array('cod_estado_habitacion' => '3');
        // foreach ($habitaciones_reservadas as $habitacion_reservada) {
        //     $this->Habitacion_model->actualizar($habitacion_reservada->cod_habitacion, $data);
        // };
        // FIN: CONCLUIR ESTADIAS
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
                if (in_array('5',$arr)){
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
                $this->load->view('home/mod_ventas');
              }if (in_array('3',$arr)){
                $this->load->view('home/mod_almacen');
              }if  (in_array('4',$arr)){
                $this->load->view('home/mod_reportes');
              }
            $this->load->view('home/main',$db_data);
            $t_tran = $this->Reservaciones_model->select1();
            $oferta = $this->Reservaciones_model->select2();
            $data1 = array(
                't_tran' => $t_tran,
                'oferta' => $oferta,
            );
            $this->load->view('reservaciones/reservaciones',$data1);
            $this->load->view('home/footer_dt');

        }else{
            header('Location:login');
        }
    }
    public function consultar(){
      if ($this->input->is_ajax_request()){
          echo json_encode($this->Reservaciones_model->consultar());

      }
    }
    public function consultar_estadia(){
        $estadia = $this->input->post('cod_estadia');
      //if ($this->input->is_ajax_request()){
          echo json_encode($this->Reservaciones_model->consultar_estadia($estadia));

      //}
    }
    public function consultar_habitacion_estadia(){
        $estadia = $this->input->get('cod_estadia1');
          echo json_encode($this->Reservaciones_model->consultar_habitacion_estadia($estadia));
    }
  function actualizar(){
      $fecha_salida = $this->input->post('fecha_salida');
      $estadia = $this->input->post('cod_estadia');
      $data = array('fecha_salida' => $fecha_salida);
      if($this->Reservaciones_model->actualizar($estadia, $data) == true){
        echo '1';
      }else{
        echo '0';
      }
  }
    function comprobar_cliente(){
        $cliente = $this->input->post('cliente');
        if($this->Reservaciones_model->comprobar_cliente($cliente) == false){
            echo 'No existe';
        }else{
            echo json_encode($this->Reservaciones_model->comprobar_cliente($cliente));
        }
    }
    function room_list(){
        $fecha_estadia = $this->input->post('fecha_estadia');
        $fecha_salida = $this->input->post('fecha_salida');
        $resultado = $this->Reservaciones_model->room_list($fecha_estadia, $fecha_salida);
        echo json_encode($resultado);
    }
    function detalle_habitacion(){
        $habitacion = $this->input->post('cod_habitacion');
        $resultado = $this->Reservaciones_model->detalle_habitacion($habitacion);
        echo json_encode($resultado);
    }
    function registrar(){
        $nro_res = $this->input->post('nro_res');
        $cliente = $this->input->post('cliente');
        $empleado = $this->input->post('empleado');
        $fecha_r = $this->input->post('fecha_r');
        $fecha_estadia = $this->input->post('fecha_estadia');
        $lista_hab = $this->input->post('lista_hab');
        $huespedes = $this->input->post('huespedes');
        $datos = array(
            'cod_estadia' => $nro_res,
            'cod_cliente' => $cliente,
            'cod_empleado' => $empleado,
            'fecha_reserva' => $fecha_r,
            'fecha_ingreso' => $fecha_estadia,
            'estado' => 1,
        );
        $resultado1 = $this->Reservaciones_model->registrar1($datos);
        $resultado2 = $this->Reservaciones_model->registrar2($nro_res, $cliente, $fecha_estadia, $lista_hab, $huespedes);
        if(($resultado1 == true)&&($resultado2 == true)){
            echo 'Registro correcto';
        }else{
            echo 'Registro fallido';
        }
    }
    function registrar_estadia(){
        $nro_res = $this->input->post('nro_res');
        $cliente = $this->input->post('cliente');
        $nombres = $this->input->post('nombres');
        $apellido_p = $this->input->post('apellido_p');
        $apellido_m = $this->input->post('apellido_m');
        $empleado = $this->input->post('empleado');
        $fecha_r = $this->input->post('fecha_r');
        $fecha_estadia = $this->input->post('fecha_estadia');
        $fecha_salida = $this->input->post('fecha_salida');
        $lista_hab = $this->input->post('lista_hab');
        $flag = 0;
        if ($nombres != ''){
            $cliente_datos = array(
                'cod_persona' => $cliente,
                'nombres' => $nombres,
                'apellido_paterno' => $apellido_p,
                'apellido_materno' => $apellido_m,
                'estado' => '0',
            );
            if(!$this->Clientes_model->guardar($cliente_datos))
            {
                $flag++;
            }

        };
        if($flag == 0)
        {
            if ($fecha_estadia != $fecha_r){
                $datos = array(
                    'cod_estadia' => $nro_res,
                    'cod_cliente' => $cliente,
                    'cod_empleado' => $empleado,
                    'fecha_reserva' => $fecha_r,
                    'fecha_ingreso' => $fecha_estadia,
                    'fecha_salida' => $fecha_salida,
                    'estado' => 1,
                );
            }else{
                $datos = array(
                    'cod_estadia' => $nro_res,
                    'cod_cliente' => $cliente,
                    'cod_empleado' => $empleado,
                    'fecha_reserva' => $fecha_r,
                    'fecha_ingreso' => $fecha_estadia,
                    'fecha_salida' => $fecha_salida,
                    'estado' => 2,
                );
            };
            $c = 0;
            foreach($lista_hab as $fila){
                if ($fecha_estadia != $fecha_r){
                    $data_hab = array(
                        'cod_habitacion' => $fila,
                        'cod_estado_habitacion' => 1,
                    );
                }else{
                    $data_hab = array(
                        'cod_habitacion' => $fila,
                        'cod_estado_habitacion' => 2,
                    );

                };
                $this->Habitacion_model->actualizar($fila,$data_hab);
            }
            $resultado1 = $this->Reservaciones_model->registrar1($datos);

            if($resultado1 == true)/*&&($resultado2 == true)*/{
                echo 'Registro correcto';
            }else{
                echo 'Registro fallido';
            }
        }else{
            echo 'Error';
        };
    }
    function registrar_detalle_estadia(){
        $nro_res = $this->input->post('nro_res');
        if ($this->input->post('huesped') != ''){
            $huesped = $this->input->post('huesped');
        }
        if ($this->Reservaciones_model->existencia($huesped) == false){
            $data = array(
                'cod_persona' => $huesped,
                'nombres' => $this->input->post('huesped_nombre'),
                'apellido_paterno' => $this->input->post('huesped_apellido_paterno'),
                'apellido_materno' => $this->input->post('huesped_apellido_materno'),
            );
            $this->Clientes_model->guardar($data);
        }
        $fecha_estadia = $this->input->post('fecha_estadia');
        $fecha_salida = $this->input->post('fecha_salida');
        $habitacion = $this->input->post('habitacion');
        $datos = array(
            'cod_estadia' => $nro_res,
            'cod_persona' => $huesped,
            'fecha_ingreso' => $fecha_estadia,
            'fecha_salida' => $fecha_salida,
            'cod_habitacion' => $habitacion,
            'estado' => 1,
        );
        $resultado1 = $this->Reservaciones_model->registrar_detalle_estadia($datos);
      if($resultado1 == true)/*&&($resultado2 == true)*/{
            echo 'Registro correcto';
        }else{
            echo 'Registro fallido';
        }
    }
    function existencia(){
        $persona = $this->input->post('cod_persona');
        if ($this->Reservaciones_model->existencia($persona)==false){
            echo 0;
        }else{
            echo 1;
        }
    }
    function eliminar(){
        $arg = $this->input->post('cod_estadia');
        $habitaciones_reservadas = $this->Reservaciones_model->habitaciones_reservadas($arg, '2');
        // print_r($habitaciones_reservadas);
        $data = array(
            'estado' => '0'
        );
        $flag = 0;
        if(!$this->Reservaciones_model->eliminar($arg, $data)){
            $flag++;
        }
        $data1 = array('cod_estado_habitacion' => '3');
        foreach ($habitaciones_reservadas as $habitacion_reservada) {
            if(!$this->Habitacion_model->actualizar($habitacion_reservada->cod_habitacion, $data1)){
                $flag++;
            }
        };
        if($flag = 0){
            echo 1;
        }else{
            echo 0;
        }
    }
    function confirmar_estadia(){
        $estadia = $this->input->post('cod_estadia');
        $habitaciones_reservadas = $this->Reservaciones_model->habitaciones_reservadas($estadia, '1');
        $data = array('cod_estado_habitacion' => '2');
        $flag = 0;
        $data1 = array('estado' => '1');
        if(!$this->Reservaciones_model->actualizar($estadia, $data1)){
            $flag ++;
        }
        foreach ($habitaciones_reservadas as $habitacion_reservada) {
            if(!$this->Habitacion_model->actualizar($habitacion_reservada->cod_habitacion, $data))
            {
                $flag++;
            };
        };
        if ($flag == 0){
            echo 1;
        }else{
            echo 0;
        }
    }
    function registrar_cliente()
    {
        $cod_cliente = $this->input->post('cliente');
        $nombres = $this->input->post('nombres');
        $apellido_paterno = $this->input->post('apellido_p');
        $apellido_materno = $this->input->post('apellido_m');
        $detalle = array(
            'cod_persona' => $cod_cliente,
            'nombres' => $nombres,
            'apellido_paterno' => $apellido_paterno,
            'apellido_materno' => $apellido_materno
        );
        if($this->Clientes_model->guardar($detalle))
        {
            echo 0;
        }else{
            echo 1;
        }
    }
    function detalle_habitacion_estadia(){
        $cod_estadia = $this->input->get('cod_estadia');
        echo json_encode($this->Reservaciones_model->detalle_habitacion_estadia($cod_estadia));
    }
}
