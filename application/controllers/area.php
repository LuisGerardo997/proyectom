<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Area extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->load->model('Area_model');
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
            $consulta = $this->Area_model->consultar();
            $datos = array(
            'query' => $consulta,
            );
            $this->load->view('home/main',$db_data);
            $this->load->view('home/area/area',$datos);
            $this->load->view('home/footer_dt');
        }

        else {
            header('Location:login');
        }
    }

    public function consultar(){
    //if ($this->input->is_ajax_request()){
        echo json_encode($this->Area_model->consultar());
    //}
    }


    function actualizar(){
      $selector = $this->input->post('cod_area');
      $cod_area = $selector;
      $area= $this->input->post('area');
      $descripcion= $this->input->post('descripcion');
      $data = array(
        'cod_area' => $cod_area,
        'area' => $area,
        'descripcion' => $descripcion,
      );
      if($this->Area_model->actualizar($selector,$data) == true){
        echo '1';
      }else{
        echo '0';
      }
   }

    function eliminar(){
      $idselect = $this->input->post('cod_area');
      $data = array(
        'estado' => null,
      );
      if($this->Area_model->eliminar($idselect, $data) == true){
        echo '1';
      }else{
        echo '0';
      }
    }
    function guardar(){
      $cod_area = $this->input->post('cod_area');
      $area = $this->input->post('area');
      $descripcion = $this->input->post('descripcion');
      $data = array(
        'cod_area' => $cod_area,
        'area' => $area,
        'descripcion' => $descripcion,
        'estado' => '0',
        );
      if($this->Area_model->guardar($data) == true){
        echo '1';
      }else{
        echo '0';
      }
   }
}
