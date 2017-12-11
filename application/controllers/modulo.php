<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modulo extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->load->model('Modulo_model');
    $this->load->model('Login_model');
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
            $modulos = $this->Modulo_model->consultar_padres();
            $data = array(
                'nombre' => $nombre,
                'apellido_p' => $apellido_p,
                'email' => $email,
                'modulos' => $modulos,
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
            $this->load->view('home/main',$db_data);
            $data1 = $this->Modulo_model->select1();
            $resulta = array(
              'modulo' => $data1,
            );
            $this->load->view('home/seguridad/modulo', $resulta);
            $this->load->view('home/footer_dt');
        }

        else {
            header('Location:login');
        }
    }

    public function consultar(){
    //if ($this->input->is_ajax_request()){
        echo json_encode($this->Modulo_model->consultar());
    //}
    }
    public function consultar_padres(){
    //if ($this->input->is_ajax_request()){
        echo json_encode($this->Modulo_model->consultar_padres());
    //}
    }
    public function consultar_submodulos(){
    //if ($this->input->is_ajax_request()){
        $cod_modulo = $this->input->post('cod_modulo');
        echo json_encode($this->Modulo_model->consultar_submodulos($cod_modulo));
    //}
    }

        function eliminar(){
            $idselect = $this->input->post('cod_modulo');
            $data = array(
                'estado' => '0',
            );

            if($this->Modulo_model->eliminar($idselect, $idselect1, $data) == true){
                echo '1';
            }

            else {
                echo '0';
            }
        }

        function guardar(){
            $cod_modulo = $this->input->post('cod_modulo_c');
            if ($this->input->post('pmodulo_c') != ''){
              $pmodulo = $this->input->post('pmodulo_c');
              if ($this->input->post('submodulo_c') != ''){
                $pmodulo = $this->input->post('submodulo_c');
              }
            }else{
              $pmodulo = null;
            }
            $modulo = $this->input->post('modulo_c');
            $data = array(
                'cod_modulo' => $cod_modulo,
                'parent_cod_modulo' => $pmodulo,
                'modulo' => $modulo,
                'estado' => '1',
            );

            if($this->Modulo_model->guardar($data) == true){
                echo '1';
            }

            else {
                echo '0';
            }
        }
        function actualizar(){
            $selector = $this->input->post('cod_modulo');
            $cod_modulo = $selector;
            $pmodulo = $this->input->post('pmodulo');;
            $modulo = $this->input->post('modulo');
            $data = array(
              'cod_modulo' => $cod_modulo,
              'parent_cod_modulo' => $pmodulo,
              'modulo' => $modulo
            );
            if($this->Modulo_model->actualizar($selector, $data) == true){
              echo '1';
            }else{
              echo '0';
            }
        }
}
