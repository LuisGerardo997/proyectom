<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleados extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->load->model('Empleados_model');
  }

    public function index(){
            $driverdb = $this->db->dbdriver;
            if ($driverdb == 'mysqli'){
                $db_name = 'MySQL';
            }elseif ($driverdb == 'postgre') {
                $db_name = 'PostgreSQL';
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
            if (($this->session->userdata['cargo'] == 'Recepcionista')||($this->session->userdata['cargo'] == 'Administrador')){
                $this->load->view('home/body1');
            }
            if (($this->session->userdata['cargo'] == 'Almacenero')||($this->session->userdata['cargo'] == 'Administrador')){
                $this->load->view('home/body2');
            }
            if($this->session->userdata['cargo'] == 'Administrador'){
                $this->load->view('home/body3');
            }
        if($this->session->userdata('username')){
            $consulta = $this->Empleados_model->select();
            $consulta1 = $this->Empleados_model->select1();
            $consulta2 = $this->Empleados_model->select2();
            $datos = array(
            'ciudad' => $consulta,
            'cargo' => $consulta1,
            'area' => $consulta2,
            );
            $this->load->view('home/main',$db_data);
            $this->load->view('home/personas/empleados',$datos);
            $this->load->view('home/footer_dt');
        }

        else {
            header('Location:login');
        }
    }

    public function consultar(){
    //if ($this->input->is_ajax_request()){
        echo json_encode($this->Empleados_model->consultar());
    //}
    }


    function actualizar(){
      $selector = $this->input->post('cod_persona');
      $cod_persona = $selector;
      $nombres = $this->input->post('nombres');
      $apellido_paterno = $this->input->post('apellido_paterno');
      $apellido_materno = $this->input->post('apellido_materno');
      $area = $this->input->post('area');
      $cargo = $this->input->post('cargo');
      $ruc = $this->input->post('ruc');
      $email = $this->input->post('email');
      $genero = $this->input->post('genero');
      $tel_movil = $this->input->post('tel_movil');
      $ciudad = $this->input->post('ciudad');
      $data = array(
        'cod_persona' => $cod_persona,
        'nombres' => $nombres,
        'apellido_paterno' => $apellido_paterno,
        'apellido_materno' => $apellido_materno,
        'area' => $area,
        'cargo' => $cargo,
        'ruc' => $ruc,
        'email' => $email,
        'genero' => $genero,
        'tel_movil' => $tel_movil,
        'cod_ciudad_direccion' => $ciudad,
      );
      if($this->Empleados_model->actualizar($selector, $data) == true){
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
      if($this->Empleados_model->eliminar($idselect, $data) == true){
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
      $area = $this->input->post('area');
      $cargo = $this->input->post('cargo');
      $ruc = $this->input->post('ruc');
      $email = $this->input->post('email');
      $genero = $this->input->post('genero');
      $tel_movil = $this->input->post('tel_movil');
      $ciudad = $this->input->post('ciudad');
      $data = array(
        'cod_persona' => $cod_persona,
        'nombres' => $nombres,
        'apellido_paterno' => $apellido_paterno,
        'apellido_materno' => $apellido_materno,
        'area' => $area,
        'cargo' => $cargo,
        'ruc' => $ruc,
        'email' => $email,
        'genero' => $genero,
        'tel_movil' => $tel_movil,
        'cod_ciudad_direccion' => $ciudad,
        'estado' => '1',
      );
      if($this->Empleados_model->guardar($data) == true){
        echo '1';
      }else{
        echo '0';
      }
    }
}
