<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Ventas_model');
        $this->load->model('Productos_model');
        $this->load->model('Reservaciones_model');
        $this->load->model('Login_model');
        $this->load->model('Modulo_model');
        $this->load->model('Habitacion_model');
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
            $t_tran = $this->Ventas_model->select1();
            $oferta = $this->Ventas_model->select2();
            $tipo_producto = $this->Ventas_model->select3();
            $data1 = array(
                't_tran' => $t_tran,
                'oferta' => $oferta,
                'tp' => $tipo_producto,
            );
            $this->load->view('ventas/ventas',$data1);
            $this->load->view('home/footer_dt');

        }else{
            header('Location:login');
        }
    }
    public function consultar(){
      //if ($this->input->is_ajax_request()){
          echo json_encode($this->Ventas_model->consultar());

      //}
    }
    public function consultar_detalle_ventas(){
        $cod_venta = $this->input->post('cod_venta');
      //if ($this->input->is_ajax_request()){
          echo json_encode($this->Ventas_model->consultar_detalle_ventas($cod_venta));

      //}
    }
    function comprobar_cliente(){
        $cliente = $this->input->post('cliente');
        if($this->Ventas_model->comprobar_cliente($cliente) == true){
            echo 'Existe';
        }else{
            echo 'No existe';
        }
    }
    function productos_slct(){
        if($this->input->post('buscar')){
            $data1 = $this->input->post('buscar');
        }else{

            $data1 = "";
        }
        $consulta = $this->Ventas_model->productos_slct($data1);
        echo json_encode($consulta);
    }
    function servicios_slct(){
        $cliente = $this->input->post('cliente');
        $consultar_cliente = $this->Ventas_model->consultar_cliente_estadia($cliente);
        if ($consultar_cliente > 0){
            if($this->input->post('buscar_s')){
                $data1 = $this->input->post('buscar_s');
            }else{

                $data1 = "";
            }
            $consulta = $this->Ventas_model->servicios_slct($data1);
            echo json_encode($consulta);
        }
    }
    function estadias_slct(){
        $cliente = $this->input->post('cliente_estadia');
        $consultar_cliente = $this->Ventas_model->consultar_cliente_estadia($cliente);
        if ($consultar_cliente > 0){
            if($this->input->post('buscar_e')){
                $data1 = $this->input->post('buscar_e');
            }else{
                $data1 = "";
            }
            $consulta = $this->Ventas_model->estadias_slct($data1, $cliente);
            echo json_encode($consulta);
        }
    }
    function guardar_venta(){
        $fecha = $this->input->post('fecha');
        $nro_venta = $this->input->post('nro_venta');
        $cliente_venta = $this->input->post('cliente_venta');
        $empleado = $this->input->post('empleado');
        // $productos = $this->input->post('productos');
        $producto_precio = json_encode($this->input->post('producto_precio'));
        $cantidad_producto = $this->input->post('cantidad_producto');
        $servicio_precio = $this->input->post('servicio_precio');
        $cantidad = $this->input->post('cantidad');
        $productos_data =json_decode($producto_precio, true);
        $venta_p = array(
            'cod_venta' => $nro_venta,
            'cod_cliente' => $cliente_venta,
            'cod_empleado' => $empleado,
            'fecha_venta' => $fecha,
            'estado' => '1',
        );
        $this->Ventas_model->nueva_venta($venta_p);
        // $iteraciones_p = count($productos_data);
        $counter = 0;
        foreach ($productos_data as $producto_data){
            $detalle_p = array(
                'cod_venta' => $nro_venta,
                'cod_producto' => $producto_data['cod_producto'],
                'precio' => $producto_data['precio_producto'],
                'cantidad' => $cantidad_producto[$counter],
                'cod_parametro' => '2',
            );
            $stock_p = $this->Ventas_model->cantidad_producto($producto_data['cod_producto']);
            $stock_actual = (intval($stock_p->stock_producto) - intval($cantidad_producto[$counter]));
            $nuevo_stock = array(
                'stock_producto' => $stock_actual,
            );
            $this->Ventas_model->detalle_venta($detalle_p);
            $this->Productos_model->actualizar($producto_data['cod_producto'], $nuevo_stock);
            $counter++;
        }
        $habitacion_servicio = $this->input->post('habitacion_servicio');
        $estadias = $this->input->post('estadias');
        // $iteraciones_s = count($estadias);
        // foreach ($habitacion_servicio as $key) {
        //     $iteraciones_detalle = count($key[2]);
        //     for ($j=0;$j<$iteraciones_detalle; $j++){
        //         $detalle_s = array(
        //             'cod_habitacion' => $key[1],
        //             'cod_servicio' => $key[2][$j],
        //             'cod_estadia' => $key[0],
        //             'precio' => $key[3][$j],
        //             'cantidad' => '1',
        //             'estado' => '1',
        //         );
        //         $this->Ventas_model->detalle_servicio($detalle_s);
        //     }
        // }
            // $detalle_s = array(
            //     'cod_habitacion' => $habitaciones[$i],
            //     'cod_servicio' => $servicios[$i],
            //     'cod_estadia' => $estadias[$i],
            //     'precio' => $servicio_precio[$i],
            //     'cantidad' => '1',
            //     'estado' => '1',
            // );
            // $this->Ventas_model->detalle_servicio($detalle_s);

        echo 1;
    }
    function get_det(){
        $codigo = $this->input->post('cod');
        $resultado = $this->Ventas_model->get_det($codigo);
        echo json_encode($resultado);
    }
    function get_det_p(){
        $codigo = $this->input->post('cod_p');
        $resultado = $this->Ventas_model->get_det_p($codigo);
        echo json_encode($resultado);
    }
}
