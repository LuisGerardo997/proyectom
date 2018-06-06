<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/Lima');
class Deudas extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('Login_model');
        //$this->load->model('Deudas_model');
        $this->load->model('Deudas_model');
        $this->load->model('Modulo_model');
    }

    public function index(){
        if($this->session->userdata('username')){
            $driverdb = $this->db->dbdriver;
            if ($driverdb == 'mysqli'){
                $db_name = 'MySQL';
            }
            elseif ($driverdb == 'postgre'){
                $db_name = 'PostgreSQL';
            }
            elseif ($driverdb == 'sqlsrv') {
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
                'apellido_m' => $apellido_m,
                'email' => $email,
                'foto_p' => $foto_p,
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
                $this->load->view('home/mod_persona');
                if (in_array('6',$arr)){
                    $this->load->view('home/mod_habitacion');
                }
                if (in_array('7',$arr)){
                    $this->load->view('home/mod_ubigeo');
                }
                if (in_array('8',$arr)){
                    $this->load->view('home/mod_servicio');
                }
                if (in_array('9',$arr)){
                    $this->load->view('home/mod_ofertas');
                }
                if (in_array('10',$arr)){
                    $this->load->view('home/mod_area');
                }
                if (in_array('11',$arr)){
                    $this->load->view('home/mod_cargo');
                }
                if (in_array('12',$arr)){
                    $this->load->view('home/mod_proveedor');
                }
                if (in_array('13',$arr)){
                    $this->load->view('home/mod_producto');
                }
                if (in_array('14',$arr)){
                    $this->load->view('home/mod_tipo_pago');
                }
                if (in_array('15',$arr)){
                    $this->load->view('home/mod_tipo_movimiento');
                }
                if (in_array('16',$arr)){
                    $this->load->view('home/mod_tipo_documento');
                }
                if (in_array('17',$arr)){
                    $this->load->view('home/mod_caja');
                }
                if (in_array('18',$arr)){
                    $this->load->view('home/mod_tipo_transaccion');
                }
                if (in_array('19',$arr)){
                    $this->load->view('home/mod_parametro');
                }
                if (in_array('20',$arr)){
                    $this->load->view('home/mod_seguridad');
                }
                $this->load->view('home/mod_mantenimiento_fin');
            }
            if (in_array('2',$arr)){
                $this->load->view('home/mod_reservacion');
                $this->load->view('home/mod_ventas');
            }
            if (in_array('3',$arr)){
                $this->load->view('home/mod_almacen');
            }
            if  (in_array('4',$arr)){
                //$this->load->view('home/mod_pago');
                $this->load->view('home/mod_deuda');
                $this->load->view('home/mod_reportes');
            }

            $data1 = $this->Deudas_model->select1();
            $data2 = $this->Deudas_model->select2();
            $data3 = $this->Deudas_model->select3();
            $data4 = $this->Deudas_model->select4();
            $resulta = array(
                'tipo_transaccion' => $data1,
                'forma_pago' => $data2,
                'tipo_documento' => $data3,
                'concepto_movimiento' => $data4,
            );
            $this->load->view('home/main',$db_data);
            $this->load->view('deudas/deudas',$resulta);
            $this->load->view('home/footer_dt');
        }
        else{
            header('Location:login');
        }
    }

    public function consultar_tarjeta(){
        $cliente = $this->input->post('cliente');
        echo json_encode($this->Deudas_model->consultar_tarjeta($cliente));
    }

    public function consultar_proveedor(){
        echo json_encode($this->Deudas_model->consultar_proveedor());
    }

    public function consultar_amortizacion(){
        $cod_cron = $this->input->post('cod_cron');
        echo json_encode($this->Deudas_model->consultar_amortizacion($cod_cron));
    }

    public function consultar_fecha_caja(){
        $empleado = $this->input->post('empleado');
        echo json_encode($this->Deudas_model->consultar_fecha_caja($empleado));
    }

    public function consultar_deudas(){
        echo json_encode($this->Deudas_model->consultar_deudas());
    }

    public function consultar_proveedor_compra(){
        $proveedor = $this->input->post('proveedor');
        echo json_encode($this->Deudas_model->consultar_proveedor_compra($proveedor));
    }

    public function consultar_cliente_estadia(){
        $cliente = $this->input->post('cliente');
        echo json_encode($this->Deudas_model->consultar_cliente_estadia($cliente));
    }

    public function detalle_proveedor_producto(){
        $cod_compra = $this->input->post('cod_compra');
        echo json_encode($this->Deudas_model->detalle_proveedor_producto($cod_compra));
    }

    public function detalle_cliente_producto(){
        $cliente = $this->input->post('cod_cliente');
        $venta = $this->input->post('cod_venta');
        echo json_encode($this->Deudas_model->detalle_cliente_producto($cliente, $venta));
    }
    // public function procesar_deuda(){
    //     $tipo_t = $this->input->post('tipo_t');
    //     $proveedor_deuda = $this->input->post('proveedor_deuda');
    //     $compras = $this->input->post('compras');
    //     $forma_pago = $this->input->post('forma_pago');
    //     $tipo_documento = $this->input->post('tipo_documento');
    //     $serie = $this->input->post('serie');
    //     $correlativo = $this->input->post('correlativo');
    //     $periodo = $this->input->post('periodo');
    //     $cuota = $this->input->post('cuota');
    //     $monto_inicial = $this->input->post('monto_inicial');
    //     $monto_contado = $this->input->post('monto_contado');
    //     $fecha_contado = $this->input->post('fecha_contado');
    //     $fecha_credito = $this->input->post('fecha_credito');
    //     $concepto_movimiento = $this->input->post('concepto_movimiento');
    //     if ($tipo_t == '1'){
    //         $interaciones = sizeof($compras);
    //         for ($a=0; $a<$iteraciones, $a++){
    //             $cod_cronograma = $this->Deudas_model->num_cron();
    //             $datos_c = array(
    //                 'cod_cronograma_compras' => $cod_cronograma,
    //                 'cod_compra' => $compras[$a],
    //                 'fecha_vencimiento' => $fecha_contado,
    //                 'nro_cuota' => '1',
    //                 'monto' =>
    //             )
    //         }
    //     }
    //     if ($tipo_t == '2'){
    //         foreach($compras as $elemento){
    //             $num_cron = $this->Deudas_model->num_cron();
    //             $datos1 = array(
    //                 'cod_cronograma_compras' => ($num_cron+1),
    //                 'cod_compra' => $elemento,
    //                 'fecha_vencimiento' => $fecha_contado,
    //                 'nro_cuota' => '1',
    //                 'monto' => 'asdsa',
    //                 'estado' => '0',
    //             );
    //
    //         }
    //     }
    //     //echo json_encode($this->Deudas_model->detalle_cliente_producto($cliente, $venta));
    // }

    function guardar_pago(){
        $empleado= $this->input->post('empleado');
        $caja= $this->input->post('caja');
        $fecha_inicio= $this->input->post('fecha_inicio');
        $forma_pago= $this->input->post('forma_pago');
        $tipo_documento= $this->input->post('tipo_documento');
        $concepto_movimiento= $this->input->post('concepto_movimiento');
        $monto_cronograma= $this->input->post('monto_cronograma');
        $serie= $this->input->post('serie');
        $correlativo= $this->input->post('correlativo');
        $compras= $this->input->post('compras');
        $monto= $this->input->post('monto');
        $monto_cronogramas= $this->input->post('monto_cronogramas');
        $cod_mov = $this->Deudas_model->num_mov();
        $hora = date('G:i');
        $data0 = array(
            'cod_movimiento' => $cod_mov,
            'cod_persona' => $empleado,
            'cod_caja' => $caja,
            'fecha_inicio' => $fecha_inicio,
            'cod_forma_pago' => $forma_pago,
            'cod_tipo_documento' => $tipo_documento,
            'cod_concepto_movimiento' => $concepto_movimiento,
            'monto_movimiento' => $monto_cronograma,
            'nro_serie' => $serie,
            'nro_correlativo' => $correlativo,
            'hora' => $hora,
            'estado' => '1',
        );
        $this->Deudas_model->guardar_movimiento($data0);
        $iteraciones = sizeof($compras);
        for ($j = 0; $j < $iteraciones; $j++){
            if ($monto[$j] == $monto_cronogramas[$j]){
                $data2 = array(
                    'estado' => '0',
                );
                $this->Deudas_model->actualizar_cronograma($compras[$j], $data2);
            }
            $data = array(
                'cod_movimiento' => $cod_mov,
                'cod_cronograma_compras' => $compras[$j],
                'monto' => $monto[$j],
            );
            $this->Deudas_model->guardar_amortizacion($data);
        }
        echo '1';
    }


    function guardar_tipo_transaccion(){
        $cod_tipo_transaccion= $this->input->post('cod_tipo_transaccion');
        $data = array(
            'cod_tipo_transaccion' => $cod_tipo_transaccion,
        );
        if($this->Deudas_model->guardar_tipo_transaccion($cod_tipo_transaccion, $data) == true){
            echo '1';
        }else{
            echo '0';
        }
    }
}
