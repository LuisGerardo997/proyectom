<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/Lima');
class Pagos extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('Login_model');
        $this->load->model('Pagos_model');
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
                $this->load->view('home/mod_pago');
                $this->load->view('home/mod_deuda');
                $this->load->view('home/mod_reportes');
            }

            $data1 = $this->Pagos_model->select1();
            $data2 = $this->Pagos_model->select2();
            $data3 = $this->Pagos_model->select3();
            $data4 = $this->Pagos_model->select4();
            $resulta = array(
                'tipo_transaccion' => $data1,
                'forma_pago' => $data2,
                'tipo_documento' => $data3,
                'concepto_movimiento' => $data4,
            );
            $this->load->view('home/main',$db_data);
            $this->load->view('home/pagos/pagos',$resulta);
            $this->load->view('home/footer_dt');

        }
        else{
            header('Location:login');
        }
    }

    public function consultar_fecha_caja(){
        $empleado = $this->input->post('empleado');
        echo json_encode($this->Pagos_model->consultar_fecha_caja($empleado));
    }

    public function consultar_tarjeta(){
        $cliente = $this->input->post('cliente');
        echo json_encode($this->Pagos_model->consultar_tarjeta($cliente));
    }

    public function consultar_cliente_producto(){
        $cliente = $this->input->post('cliente');
        echo json_encode($this->Pagos_model->consultar_cliente_producto($cliente));
    }

    public function consultar_cliente_estadia(){
        $cliente = $this->input->post('cliente');
        echo json_encode($this->Pagos_model->consultar_cliente_estadia($cliente));
    }

    public function detalle_cliente_producto(){
        $cliente = $this->input->post('cod_cliente');
        $venta = $this->input->post('cod_venta');
        echo json_encode($this->Pagos_model->detalle_cliente_producto($cliente, $venta));
    }

    public function detalle_cliente_estadia(){
        $estadia = $this->input->post('cod_estadia');
        echo json_encode($this->Pagos_model->detalle_cliente_estadia($estadia));
    }

    public function cronograma_ventas(){
        echo json_encode($this->Pagos_model->cronograma_ventas());
    }

    public function consultar_amortizacion_venta(){
        $cod_cron = $this->input->post('cod_cron');
        echo json_encode($this->Pagos_model->consultar_amortizacion_venta($cod_cron));
    }

    function guardar_cobro(){
        $cod_persona= $this->input->post('cod_persona');
        $cod_caja= $this->input->post('cod_caja');
        $fecha_inicio= $this->input->post('fecha_inicio');
        $forma_pago_cronograma= $this->input->post('forma_pago_cronograma');
        $tipo_documento_cronograma= $this->input->post('tipo_documento_cronograma');
        $concepto_movimiento_cronograma= $this->input->post('concepto_movimiento_cronograma');
        $monto_cronograma= $this->input->post('monto_cronograma');
        $ventas= $this->input->post('ventas');
        $monto= $this->input->post('monto');
        $monto_cronogramas= $this->input->post('monto_cronogramas');
        $cod_mov= $this->Pagos_model->num_mov();
        $nro_serie = $this->Pagos_model->nro_serie($tipo_documento_cronograma);
        $nro_correlativo = $this->Pagos_model->nro_correlativo($tipo_documento_cronograma);
        $hora = date('G:i');
        $data0 = array(
            'cod_movimiento' => $cod_mov,
            'cod_persona' => $cod_persona,
            'cod_caja' => $cod_caja,
            'fecha_inicio' => $fecha_inicio,
            'cod_forma_pago' => $forma_pago_cronograma,
            'cod_tipo_documento' => $tipo_documento_cronograma,
            'cod_concepto_movimiento' => $concepto_movimiento_cronograma,
            'monto_movimiento' => $monto_cronograma,
            'nro_serie' => $nro_serie->nro_serie,
            'nro_correlativo' => $nro_correlativo->nro_correlativo,
            'hora' => $hora,
            'estado' => '1',
        );
        $this->Pagos_model->guardar_movimiento($data0);
        $iteraciones = sizeof($ventas);
        for ($j = 0; $j < $iteraciones; $j++){
            if ($monto[$j] == $monto_cronogramas[$j]){
                $data2 = array(
                    'estado' => '0',
                );
                $this->Pagos_model->actualizar_cronograma($ventas[$j], $data2);
            }
            $data = array(
                'cod_movimiento' => $cod_mov,
                'cod_cronograma_ventas' => $ventas[$j],
                'monto' => $monto[$j],
            );
            $this->Pagos_model->guardar_amortizacion($data);
        }
        echo '1';
    }
/*
    public function procesar_pago(){
        $compras = $this->input->post('compras');
        $tipo_t = $this->input->post('tipo_t');
        $monto_contado = $this->input->post('monto_contado');
        $dni_cliente = $this->input->post('dni_cliente');
        if ($tipo_t == '1'){
            $tipo_documento = $this->input->post('tipo_documento');
            $ruc = $this->input->post('ruc');
            if($ruc != ''){
                $actualizar_ruc = array(
                    'ruc' => $ruc,
                );
                $this->Cliente_model->actualizar($dni_cliente, $actualizar_ruc)

            }
            $forma_pago = $this->input->post('forma_pago');
            //$tarjeta = $this->input->post('tarjeta');
            $fecha_contado = $this->input->post('fecha_contado');
            $concepto_movimiento = $this->input->post('concepto_movimiento');
            foreach($compras as $fila){
                $nro_cronograma = $this->Pagos_model->num_cron();
                $registrar_contado = array(
                    'cod_cronograma_venta' => $nro_cronograma,
                    'cod_venta' => $fila,
                    'fecha_vencimiento' => $fecha_contado,
                    'monto' => $monto_contado,
                    'nro_cuota' => '1',
                );
                $this->Pagos_model->guardar($registrar_contado);
            }
        }elseif($registrar_contado == '2'){

        }
        $estadias = $this->input->post('estadias');
        $forma_pago = $this->input->post('forma_pago');
        $tipo_documento = $this->input->post('tipo_documento');
        $tarjeta = $this->input->post('tarjeta');
        $ruc = $this->input->post('ruc');
        $periodo = $this->input->post('periodo');
        $cuota = $this->input->post('cuota');
        $inicial = $this->input->post('inicial');
        $fecha_contado = $this->input->post('fecha_contado');
        $fecha_credito = $this->input->post('fecha_credito');
        $concepto_movimiento = $this->input->post('concepto_movimiento');
        echo json_encode($this->Pagos_model->procesar_pago($estadia));
    }
    */
}
