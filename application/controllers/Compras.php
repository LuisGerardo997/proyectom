<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compras extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Compras_model');
        $this->load->model('Login_model');
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
            $t_tran = $this->Compras_model->select1();
            $oferta = $this->Compras_model->select2();
            $tipo_producto = $this->Compras_model->select3();
            $data1 = array(
                't_tran' => $t_tran,
                'oferta' => $oferta,
                'tp' => $tipo_producto,
            );
            $this->load->view('compras/compras',$data1);
            $this->load->view('home/footer_dt');

        }else{
            header('Location:login');
        }
    }
    public function consultar(){
      //if ($this->input->is_ajax_request()){
          echo json_encode($this->Compras_model->consultar());

      //}
    }
    function comprobar_cliente(){
        $cliente = $this->input->post('cliente');
        if($this->Compras_model->comprobar_cliente($cliente) == true){
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
        $consulta = $this->Compras_model->productos_slct($data1);
        echo json_encode($consulta);
    }
    function servicios_slct(){
        $cliente = $this->input->post('cliente');
        $consultar_cliente = $this->Compras_model->consultar_cliente_estadia($cliente);
        if ($consultar_cliente > 0){
            if($this->input->post('buscar_s')){
                $data1 = $this->input->post('buscar_s');
            }else{

                $data1 = "";
            }
            $consulta = $this->Compras_model->servicios_slct($data1);
            echo json_encode($consulta);
        }
    }
    function estadias_slct(){
        $cliente = $this->input->post('cliente_estadia');
        $consultar_cliente = $this->Compras_model->consultar_cliente_estadia($cliente);
        if ($consultar_cliente > 0){
            if($this->input->post('buscar_e')){
                $data1 = $this->input->post('buscar_e');
            }else{
                $data1 = "";
            }
            $consulta = $this->Compras_model->estadias_slct($data1, $cliente);
            echo json_encode($consulta);
        }
    }
    function guardar_venta(){
        $fecha = $this->input->post('fecha');
        $nro_venta = $this->input->post('nro_venta');
        $cliente_venta = $this->input->post('cliente_venta');
        $empleado = $this->input->post('empleado');
        $productos = $this->input->post('productos');
        $producto_precio = $this->input->post('producto_precio');
        $servicio_precio = $this->input->post('servicio_precio');
        $cantidad = $this->input->post('cantidad');
        $venta_p = array(
            'cod_venta' => $nro_venta,
            'cod_cliente' => $cliente_venta,
            'cod_empleado' => $empleado,
            'fecha_venta' => $fecha,
            'estado' => '1',
        );
        $this->Compras_model->nueva_venta($venta_p);
        $iteraciones_p = count($productos);
        for ($i = 0; $i < $iteraciones_p; $i++){
            $detalle_p = array(
                'cod_venta' => $nro_venta,
                'cod_producto' => $productos[$i],
                'precio' => $producto_precio[$i],
                'cantidad' => $cantidad[$i],
            );
            $stock_p = $this->Compras_model->cantidad_producto();
            $stock_actual = ($stock_p - $cantidad[$i]);
            $nuevo_stock = array(
                'stock_producto' => $stock_actual,
            );
            $this->Compras_model->detalle_venta($detalle_p);
            $this->Productos_model->actualizar($productos[$i], $detalle_p);
        }
        $servicios = $this->input->post('servicios');
        $habitaciones = $this->input->post('habitaciones');
        $estadias = $this->input->post('estadias');
        $iteraciones_s = count($servicios);
        for ($i = 0; $i < $iteraciones_s; $i++){
            $detalle_s = array(
                'cod_habitacion' => $habitaciones[$i],
                'cod_servicio' => $servicios[$i],
                'cod_estadia' => $estadias[$i],
                'precio' => $servicio_precio[$i],
                'cantidad' => '1',
                'estado' => '1',
            );
            $this->Compras_model->detalle_servicio($detalle_s);
        }
        echo 1;
    }
    function get_det(){
        $codigo = $this->input->post('cod');
        $resultado = $this->Compras_model->get_det($codigo);
        echo json_encode($resultado);
    }
    function get_det_p(){
        $codigo = $this->input->post('cod_p');
        $resultado = $this->Compras_model->get_det_p($codigo);
        echo json_encode($resultado);
    }
}
