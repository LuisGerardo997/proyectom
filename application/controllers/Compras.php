<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compras extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Compras_model');
        $this->load->model('Productos_model');
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
    function comprobar_proveedor(){
        $proveedor = $this->input->post('proveedor');
        if($this->Compras_model->comprobar_proveedor($proveedor) == true){
            echo 'Existe';
        }else{
            echo 'No existe';
        }
    }
    function productos_compra(){
        if($this->input->post('buscar')){
            $data1 = $this->input->post('buscar');
        }else{

            $data1 = "";
        }
        $consulta = $this->Compras_model->productos_compra($data1);
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
    function guardar_compra(){
        $cod_compra = $this->input->post('cod_compra');
        $empleado = $this->input->post('empleado');
        $cod_proveedor = $this->input->post('cod_proveedor');
        $fecha_c = $this->input->post('fecha_c');
        $producto_cod = $this->input->post('producto_cod');
        $cantidad = $this->input->post('stock_productox');
        $precio_unitario = $this->input->post('precio_unitario');
        $descuento = $this->input->post('descuentox');
        $cantidad_actual = $this->input->post('cantidad_actual');
        $compra_p = array(
            'cod_compra' => $cod_compra,
            'cod_empleado' => $empleado,
            'cod_proveedor' => $cod_proveedor,
            'fecha_compra' => $fecha_c,
            'estado' => '1',
        );
        $res1 = $this->Compras_model->guardar_compra($compra_p);
        $detalle_compra = array(
            'cod_compra' => $cod_compra,
            'cod_producto' => $producto_cod,
            'precio' => $precio_unitario,
            'descuento' => $descuento,
            'cantidad' => $cantidad,
        );
        $stock_actual = ($cantidad_actual + $cantidad);
        $nuevo_stock = array(
            'stock_producto' => $stock_actual,
        );
        $res2 = $this->Compras_model->guardar_detalle_compras($detalle_compra);
        $this->Productos_model->actualizar($producto_cod, $nuevo_stock);
        //

        if (($res1 == true)&&($res2 == true)){
            echo 1;
        }else{
            echo 0;
        }
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
