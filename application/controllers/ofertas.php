<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ofertas extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->load->model('Ofertas_model');
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
            $consulta = $this->Ofertas_model->consultar();
            $datos = array(
            'query' => $consulta,
            );
            $this->load->view('home/main',$db_data);
            $this->load->view('home/ofertas/ofertas',$datos);
            $this->load->view('home/footer_dt');
        }

        else {
            header('Location:login');
        }
    }

    public function consultar(){
    //if ($this->input->is_ajax_request()){
        echo json_encode($this->Ofertas_model->consultar());
    //}
    }
    function actualizar(){
        $selector = $this->input->post('cod_oferta');
        $cod_oferta = $selector;
        $oferta = $this->input->post('oferta');
        $descuento = $this->input->post('descuento');
        $fecha_inicio = $this->input->post('fecha_inicio');
        $fecha_fin = $this->input->post('fecha_fin');
        $data = array(
            'cod_oferta' => $cod_oferta,
            'oferta' => $oferta,
            'descuento' => $descuento,
            'fecha_inicio' => $fecha_inicio,
            'fecha_fin' => $fecha_fin,
        );

        if($this->Ofertas_model->actualizar($selector, $data) == true){
            echo '1';
        }
        else {
            echo '0';
        }
    }
    function eliminar(){
        $idselect = $this->input->post('cod_oferta');
        $data = array(
            'estado' => '0',
        );

        if($this->Ofertas_model->eliminar($idselect, $data) == true){
            echo '1';
        }

        else {
            echo '0';
        }
    }

    function guardar(){
        $cod_oferta = $this->input->post('cod_oferta_c');
        $oferta = $this->input->post('oferta_c');
        $descuento = $this->input->post('descuento_c');
        $fecha_inicio = $this->input->post('fecha_inicio_c');
        $fecha_fin = $this->input->post('fecha_fin_c');
        $data = array(
            'cod_oferta' => $cod_oferta,
            'oferta' => $oferta,
            'descuento' => $descuento,
            'fecha_inicio' => $fecha_inicio,
            'fecha_fin' => $fecha_fin,
            'estado' => '1',
        );

        if($this->Ofertas_model->guardar($data) == true){
            echo '1';
        }

        else {
            echo '0';
        }
    }
}
