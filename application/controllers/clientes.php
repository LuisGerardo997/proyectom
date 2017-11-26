<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->load->model('Clientes_model');
    $this->load->model('Login_model');
  }

  public function index(){
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
      $data1 = $this->Clientes_model->select1();
      $data2 = $this->Clientes_model->select2();
      $data3 = $this->Clientes_model->select3();
      $resulta = array(
        'ciudad' => $data1,
        'ec' => $data2,
        'tp' => $data3,
      );
      $this->load->view('home/personas/clientes',$resulta);
      $this->load->view('home/footer_dt');

    }else{
      header('Location:login');
    }
  }
  public function consultar(){
        echo json_encode($this->Clientes_model->consultar());
  }
    
  function actualizar(){
      $selector = $this->input->post('cod_persona');
      $cod_persona = $selector;
      $nombres = $this->input->post('nombres');
      $apellido_paterno = $this->input->post('apellido_paterno');
      $apellido_materno = $this->input->post('apellido_materno');
      $ruc = $this->input->post('ruc');
      $email = $this->input->post('email');
      $genero = $this->input->post('genero');
      $tel_movil = $this->input->post('tel_movil');
      $direccion = $this->input->post('direccion');
      $bancaria= $this->input->post('bancaria');
      $banco = $this->input->post('banco');
      $telefono_domicilio = $this->input->post('telefono_domicilio');
      $operador = $this->input->post('operador');
      $nacimiento = $this->input->post('nacimiento');
      $profesion = $this->input->post('profesion');
      $hijos = $this->input->post('hijos');
      $estatura = $this->input->post('estatura');
      $peso = $this->input->post('peso');
      $sangre = $this->input->post('sangre');
      $hobby = $this->input->post('hobby');
      $deporte = $this->input->post('deporte');
      if ($this->input->post('ciudad') != ''){
        $ciudad = $this->input->post('ciudad');
      }else{
        $ciudad = null;
      }
      if ($this->input->post('ciudad1') != ''){
        $ciudad1 = $this->input->post('ciudad1');
      }else{
        $ciudad1 = null;
      }
      if ($this->input->post('civil') != ''){
        $civil = $this->input->post('civil');
      }else{
        $civil = null;
      }
      if ($this->input->post('persona') != ''){
        $persona = $this->input->post('persona');
      }else{
        $persona = null;
      }
      $data = array(
        'cod_persona' => $cod_persona,
        'nombres' => $nombres,
        'apellido_paterno' => $apellido_paterno,
        'apellido_materno' => $apellido_materno,
        'ruc' => $ruc,
        'email' => $email,
        'genero' => $genero,
        'tel_movil' => $tel_movil,
        'cod_ciudad_nacimiento' => $ciudad,
        'cod_ciudad_direccion' => $ciudad1,
        'nro_cuenta_bancaria' => $bancaria,
        'nombre_banco' => $banco,
        'tel_domicilio' => $telefono_domicilio,
        'tel_movil' => $tel_movil,
        'direccion' => $direccion,
        'operador_movil' => $operador,
        'fecha_nacimiento' => $nacimiento,
        'profesion' => $profesion,
        'num_hijos' => $hijos,
        'estatura_cm' => $estatura,
        'peso_kg' => $peso,
        'tipo_sangre' => $sangre,
        'hobby' => $hobby,
        'deporte_favorito' => $deporte,
        'cod_estado_civil' => $civil,
        'cod_tipo_persona' => $persona,
      );
      if($this->Clientes_model->actualizar($selector, $data) == true){
        echo '1';
      }else{
        echo '0';
      }
  }
  function eliminar(){
      $idselect = $this->input->post('cod_persona');
      $data = array(
        'estado' => null,
      );
      if($this->Clientes_model->eliminar($idselect, $data) == true){
        echo '1';
      }else{
        echo '0';
      }
    }
    function guardar(){
      $cod_persona = $this->input->post('cod_persona');
      $nombres = $this->input->post('nombres');
      $apellido_paterno = $this->input->post('apellido_paterno');
      $apellido_materno = $this->input->post('apellido_materno');
      $ruc = $this->input->post('ruc');
      $email = $this->input->post('email');
      $genero = $this->input->post('genero');
      $tel_movil = $this->input->post('tel_movil');
      if ($this->input->post('ciudad') != ''){
        $ciudad = $this->input->post('ciudad');
      }else{
        $ciudad = null;
      }
      $data = array(
        'cod_persona' => $cod_persona,
        'nombres' => $nombres,
        'apellido_paterno' => $apellido_paterno,
        'apellido_materno' => $apellido_materno,
        'ruc' => $ruc,
        'email' => $email,
        'genero' => $genero,
        'tel_movil' => $tel_movil,
        'cod_ciudad_direccion' => $ciudad,
        'estado' => '0',
      );
      if($this->Clientes_model->guardar($data) == true){
        echo '1';
      }else{
        echo '0';
      }
    }
    function almacenar(){
      $cod_persona = $this->input->post('cod_persona');
      $nombres = $this->input->post('nombres');
      $apellido_paterno = $this->input->post('apellido_paterno');
      $apellido_materno = $this->input->post('apellido_materno');
      $ruc = $this->input->post('ruc');
      $email = $this->input->post('email');
      $genero = $this->input->post('genero');
      $tel_movil = $this->input->post('tel_movil');
      $direccion = $this->input->post('direccion');
      $bancaria = $this->input->post('bancaria');
      $banco = $this->input->post('banco');
      $telefono_domicilio = $this->input->post('telefono_domicilio');
      $operador = $this->input->post('operador');
      $nacimiento = $this->input->post('nacimiento');
      $profesion = $this->input->post('profesion');
      $hijos = $this->input->post('hijos');
      $estatura = $this->input->post('estatura');
      $peso = $this->input->post('peso');
      $sangre = $this->input->post('sangre');
      $hobby = $this->input->post('hobby');
      $deporte = $this->input->post('deporte');
      if ($this->input->post('ciudad') != ''){
        $ciudad = $this->input->post('ciudad');
      }else{
        $ciudad = null;
      }
      if ($this->input->post('ciudad1') != ''){
        $ciudad1 = $this->input->post('ciudad1');
      }else{
        $ciudad1 = null;
      }
      if ($this->input->post('civil') != ''){
        $civil = $this->input->post('civil');
      }else{
        $civil = null;
      }
      if ($this->input->post('persona') != ''){
        $persona = $this->input->post('persona');
      }else{
        $persona = null;
      }

      $data = array(
        'cod_persona' => $cod_persona,
        'nombres' => $nombres,
        'apellido_paterno' => $apellido_paterno,
        'apellido_materno' => $apellido_materno,
        'ruc' => $ruc,
        'email' => $email,
        'genero' => $genero,
        'tel_movil' => $tel_movil,
        'direccion' => $direccion,
        'nro_cuenta_bancaria' => $bancaria,
        'nombre_banco' => $banco,
        'tel_domicilio' => $telefono_domicilio,
        'operador_movil' => $operador,
        'fecha_nacimiento' => $nacimiento,
        'profesion' => $profesion,
        'num_hijos' => $hijos,
        'estatura_cm' => $estatura,
        'peso_kg' => $peso,
        'tipo_sangre' => $sangre,
        'hobby' => $hobby,
        'deporte_favorito' => $deporte,
        'cod_ciudad_nacimiento' => $ciudad,
        'cod_ciudad_direccion' =>  $ciudad1,
        'cod_estado_civil' => $civil,
        'cod_tipo_persona' => $persona,
        'estado' => '0',
      );
      if($this->Clientes_model->guardar($data) == true){
        echo '1';
      }else{
        echo '0';
      }
    }
  }